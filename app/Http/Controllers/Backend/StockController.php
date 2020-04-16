<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Stock\StockStoreRequest;
use App\Http\Requests\Backend\Stock\StockUpdateRequest;
use App\Http\Requests\Backend\Sunglasses\SunglassesStoreRepository;
use App\Repositories\ColorRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public  $stock,$product,$colors,$order;

    public  function __construct(StockRepository $stock,ProductRepository $product,ColorRepository $colors,OrderRepository $order)
    {
        $this->stock=$stock;
        $this->product = $product;

        $this->colors = $colors;
        $this->upload_path = DIRECTORY_SEPARATOR.'stock'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function index($slug){
        $product = $this->product->where('slug',$slug)->first();
        $stocks = $this->stock->where('is_active','1')->orderBy('title')->paginate('10');
        return view('backend.stock.index')->withProduct($product)->withStocks($stocks);
    }
    public function create($slug)
    {

        $product = $this->product->where('slug',$slug)->first();
        $colors = $this->colors->orderBy('name')->get();
        $stocks = $this->stock->where('product_id',$product->id)->orderBy('title')->paginate('100');
        return view('backend.stock.create')->withProduct($product)->withColors( $colors)->withStocks($stocks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockStoreRequest $request)
    {
        $data = $request->except('_token','image');
        $colors = $this->colors->firstOrCreate(['name'=>$request->color]);
        $product = $this->product->find($request->id);

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'stock/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['color_id']=$colors->id;
        $data['product_id']= $product->id;

        if($this->stock->create($data)){


            return redirect()->to('/stocks/'.$product->slug.'/create')->with('success','stock created successfully');
        }
        return redirect()->back()->with('errors','stock cannot created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $stock = $this->stock->where('slug',$slug)->first();

        return view('backend.stock.edit')->withstock($stock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockUpdateRequest $request, $id)
    {

        $data = $request->except('_token','image');
        $stock = $this->stock->find($id);
        $colors = $this->colors->firstOrCreate(['name'=>$request->color]);
        $product = $this->product->find($stock->product_id);

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'stock/'.$fileName;
            Storage::disk('public')->delete($stock->image);

        }
        //    $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['color_id']=$colors->id;
        $data['product_id']= $product->id;

        if($this->stock->update( $stock->id,$data)){


            return redirect()->to('/stocks/'.$product->slug.'/create')->with('success','stock updated successfully');
        }
        return redirect()->back()->with('errors','stock cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $stock = $this->stock->find($request->id);


        if($this->stock->destroy($stock->id)){

            $message = 'Stock delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'stock cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {

        $stock = $this->stock->find($request->get('id'));

        if ($stock->is_active == 0) {
            $status = '1';
            $message = 'stock with title "' . $stock->title . '" is published.';
        } else {
            $status = '0';
            $message = 'stock with title "' . $stock->title . '" is unpublished.';
        }

        $this->stock->changeStatus($stock->id, $status);
        $this->stock->update($stock->id, ['is_active' => $status]);
        $updated = $this->stock->find($stock->id);

        return response()->json(['status' => 'ok', 'message' => $message, 'stocks' => $updated], 200);
    }


}
