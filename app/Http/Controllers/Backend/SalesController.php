<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\SalesResportRepository;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    protected $sales,$stock;

    public function __construct(SalesResportRepository $sales,StockRepository $stock)
    {
        $this->sales = $sales;
        $this->stock = $stock;
    }

    public function changeStatus(Request $request)
    {

        $sales = $this->sales->find($request->get('id'));

        $stock = $this->stock->find($sales->stock_id);

        if ($sales->dispatch == 0) {
            $status = '1';
            $data['piece'] =  $stock->piece - $sales->piece;
            if($stock->piece >= 0){
                $this->stock->update($stock->id,$data);
            }
            $message = 'sales with serial number "' . $sales->serial_number . '" is dispatch.';
        } else {
            $status = '0';
            $message = 'sales with serial number "' . $sales->serial_number . '" is not dispatch.';
        }

        $this->sales->changeStatus( $sales->id, $status);
        $this->sales->update($sales->id, array('dispatch' => $status));

        $updated = $this->sales->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'sales' => $updated], 200);
    }
    public function getReturn(Request $request)
    {

        $sales = $this->sales->find($request->get('id'));
        $stock = $this->stock->find($sales->stock_id);

        if ($sales->return == 0) {
            $status = '1';
            $data['piece'] =  $stock->piece + $sales->piece;
            if($stock->piece >= 0){
                $this->stock->update($stock->id,$data);
            }
            $message = 'sales with serial number "' . $sales->serial_number . '" is return.';
        } else {
            $status = '0';
            $message = 'sales with serial number "' . $sales->serial_number . '" is not retutn.';
        }

        $this->sales->changeStatus( $sales->id, $status);
        $this->sales->update($sales->id, array('return' => $status));


        $updated = $this->sales->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'sales' => $updated], 200);
    }
    public function destroy($id)
    {
        $sales = $this->sales->find($id);

        if($this->sales->destroy($sales->id)){

            $message = 'Sales item delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'products cannot be delete'],422);
    }
}
