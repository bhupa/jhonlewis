<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\Backend\Package\PackageStoreRequest;
use App\Http\Requests\Backend\Product\ProductStoreRequest;
use App\Http\Requests\Backend\Product\ProductUpdateRequest;
use App\Repositories\BrandRepository;
use App\Repositories\FrameCategoryRepository;
use App\Repositories\FrameRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
class ProductController extends Controller
{
    protected $products, $category,$frame,$brand,$stock;

    public function __construct(StockRepository $stock,ProductRepository $products,FrameRepository $frame,FrameCategoryRepository $category,BrandRepository $brand)
    {
        $this->products = $products;
        $this->frame = $frame;
        $this->category = $category;
        $this->brand = $brand;
        $this->stock = $stock;
        $this->upload_path = DIRECTORY_SEPARATOR.'products'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');

    }
    public function index()
    {
        $products = $this->products->orderBy('created_at','desc')->paginate('10000');
        return view('backend.product.view')->withproducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brand->where('is_active','1')->where('selling','1')->orderBy('name')->get();
        return view('backend.product.create')->withBrands($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'products/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['shipping'] =(isset($request['shipping'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
        $data['description'] = 'this is nulll';
        $data['product_number'] = $this->batch();
        if($this->products->create($data)){


            return redirect()->to('/products')->with('success','products created successfully');
        }
        return redirect()->back()->with('errors','products cannot created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = $this->products->where('slug',$slug)->first();
        return view('backend.product.show')->withProduct($product);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {


        $products = $this->products->where('slug',$slug)->first();
        $brands = $this->brand->where('is_active','1')->where('selling','1')->orderBy('name')->get();

        return view('backend.product.edit')->withproducts($products )->withBrands($brands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $products = $this->products->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'products/'.$fileName;
            Storage::disk('public')->delete($products->image);

        }
        if($this->products->update( $products->id,$data)){


            return redirect()->to('/products')->with('success','products updated successfully');
        }
        return redirect()->back()->with('errors','products cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = $this->products->find($id);

        $this->stock->where('product_id',$products->id)->delete();

        if($this->products->destroy($products->id)){

            $message = 'products delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'products cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $products = $this->products->find($request->get('id'));
        if ($products->is_active == 0) {
            $status = '1';
            $message = 'products with title "' . $products->title . '" is published.';
        } else {
            $status = '0';
            $message = 'products with title "' . $products->title . '" is unpublished.';
        }

        $this->products->changeStatus($products->id, $status);
        $this->products->update($products->id, array('is_active' => $status));
        $updated = $this->products->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'products' => $updated], 200);
    }
    public function changeShipping(Request $request)
    {
        $products = $this->products->find($request->get('id'));
        if ($products->shipping == 0) {
            $status = '1';
            $message = 'products with title "' . $products->title . '"have shipping.';
        } else {
            $status = '0';
            $message = 'products with title "' . $products->title . '" dont have shipping.';
        }

        $this->products->changeStatus($products->id, $status);
        $this->products->update($products->id, array('shipping' => $status));
        $updated = $this->products->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'products' => $updated], 200);
    }
    public function batch(){

        $batch = $this->products->latestFirst();
        if (empty($batch->product_number)) {
            return  '#PR01';
        } else {
            return  ++$batch->product_number;
        }
    }
    public function getCategory(Request $request){
        $product= $this->products->find($request->productId);
        $option ='';
        $option  .='<option selected="selected" value="'.$product->frame_category_id.'">'.$product->category->name.'</option:selectedoption>';

        return response()->json(['success'=>true,'option'=>$option],200);
    }
}
