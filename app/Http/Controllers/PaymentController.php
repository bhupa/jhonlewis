<?php

namespace App\Http\Controllers;

use App\Mail\Contact\AdminContactReplyMail;
use App\Mail\Order\OrderMail;
use App\Models\Cart;
use App\Repositories\OrderRepository;
use App\Repositories\SalesResportRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ShippingRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use URL;
use Session;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Http\Request;
use PayPal\Api\Invoice;
use PayPal\Api\InvoiceAddress;
use PayPal\Api\InvoiceItem;
use PayPal\Api\PaymentExecution;


class PaymentController extends Controller
{
    private $_api_context,$sales,$transaction,$shipping, $order,$setting;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
                                OrderRepository $order,SalesResportRepository $sales,
                                TransactionRepository $transaction, ShippingRepository $shipping,
                                SettingRepository $setting
)
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->shipping = $shipping;
        $this->transaction = $transaction;
        $this->sales = $sales;
        $this->order = $order;
        $this->setting = $setting;

    }
    public function index()
    {
        return view('paywithpaypal');
    }
    public function store(Request $request)
    {
        $products = Session::get('cart');

        $shippingAddress = Session::get('address');


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
        ->setCurrency('GBP')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/



        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $request->session()->put('shipping_amount',$request->shipping);
        $request->session()->put('amount',$request->amount);
        $amount = new Amount();
        $amount->setCurrency('GBP')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
        ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
// sales report transaction of the product with shipping addres is insert from herer






        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }



    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $products = Session::get('cart');

        $shippingAddress = Session::get('address');
        $shippingAmount = Session::get('shipping_amount');
        $amount = Session::get('amount');


        $orderItem = $this->order->latestFirst();
        $transaction['paypal_id']=$payment_id;
        $transaction['order_id']= $orderItem->id;
        $this->transaction->create($transaction);

//        insert in the our data base

        $order['buyer_id'] = Auth::user()->id;
        $order['shipping_amount'] =$shippingAmount;
        $order['total_amount'] = $amount;
        $order['total_item'] = $products->totalItem;
        $order['serial_number'] = $this->batch();
        $order['received'] =(isset($request['received'])) ? 1 : 0;
        $order['return'] =(isset($request['return'])) ? 1 : 0;

        $this->order->create($order);
        $orderlatest = $this->order->latestFirst();
        $salesResport = [];
        foreach ($products->items as $product) {
            $salesResport [ ] =[
                'order_id'=> $orderlatest->id,
                'product_id'=>$product['productId'],
                'stock_id'=>$product['stockId'],
                'unit_price'=>$product['unit_price'],
                'discount'=>$product['discount'],
                'discount_amount'=>$product['discount_price'],
                'price'=>$product['price'],
                'piece'=>$product['piece'],
                'created_at'=>date('Y-m-d H:i:s'),
                'dispatch' =>(isset($request['received'])) ? 1 : 0,
                'return' =>(isset($request['return'])) ? 1 : 0,




            ];
        }

        $this->sales->insert($salesResport);

        $shipping['first_name'] =$shippingAddress['firstname'];
        $shipping['last_name'] =$shippingAddress['lastname'];
        $shipping['address'] =$shippingAddress['address'];
        $shipping['street'] =$shippingAddress['street'];
        $shipping['email'] =$shippingAddress['email'];
        $shipping['phone'] =$shippingAddress['phone'];
        $shipping['order_id']= $orderlatest->id;
        $shipping['serial_numbr']=0;

        $this->shipping->create($shipping);

        $shipping_address = $this->shipping->latestFirst();
        $email = $shipping_address->email;
        $adminEmail = $this->setting->where('slug','for-admin')->first();
        $companyName = $this->setting->where('slug','compant-name')->first();
        $fromEmail = $this->setting->where('slug','reply-email')->first();
        $company = [
            'name'=>$companyName['value'],
            'email'=> $fromEmail['value'],
            'compnay_email'=> $adminEmail['value']
        ];

        Mail::to($email)->send(new OrderMail($orderlatest,$company,$shipping_address));


        /** clear the session payment ID **/
        Session::forget('cart');
        Session::forget('address');
        Session::forget('shipping');
        Session::forget('shipping_amount');
        Session::forget('amount');
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            \Session::put('success', 'Payment success');
            return Redirect::to('/');

        }

        \Session::put('error', 'Payment failed');
        return Redirect::to('/');

    }
    public function batch(){
        $batch = $this->order->latestFirst();
        if(empty($batch->serial_number)) {
            return  '#ORDER01';
        } else {

            return  ++$batch->serial_number;
        }
    }

}
