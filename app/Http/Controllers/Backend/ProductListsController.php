<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductList\ProductListStoreRequest;
use App\Http\Requests\Backend\ProductList\ProductListUpdateRequest;
use App\Repositories\BrandRepository;
use App\Repositories\ProductListRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProductListsController extends Controller
{
    protected $productlists, $brand;

    public function __construct(ProductListRepository $productlists,BrandRepository $brand)
    {
        $this->productlists = $productlists;
        $this->brand = $brand;
        $this->upload_path = DIRECTORY_SEPARATOR.'product-lists'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
        $productlists = $this->productlists->orderBy('created_at','desc')->paginate('10000');
        return view('backend.productlist.index')->withProductlists($productlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brand->where('is_active','1')->orderBy('name')->get();
        return view('backend.productlist.create')->withBrands($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductListStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'product-lists/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->productlists->create($data)){


            return redirect()->to('/product-lists')->with('success','product-lists created successfully');
        }
        return redirect()->back()->with('errors','product-lists cannot created Successfully');
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
        $brands = $this->brand->where('is_active','1')->orderBy('name')->get();


        $productlists = $this->productlists->where('slug', $slug)->first();
        return view('backend.productlist.edit')->withProductlists($productlists )->withBrands($brands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductListUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $productlists = $this->productlists->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'product-lists/'.$fileName;
            Storage::disk('public')->delete($productlists->image);

        }
        if($this->productlists->update( $productlists->id,$data)){


            return redirect()->to('/product-lists')->with('success','product-lists updated successfully');
        }
        return redirect()->back()->with('errors','product-lists cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productlists = $this->productlists->find($id);

        if($this->productlists->destroy($productlists->id)){

            $message = 'Product Lists delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Product Lists cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $productlists = $this->productlists->find($request->get('id'));
        if ($productlists->is_active == 0) {
            $status = '1';
            $message = 'product-lists with title "' . $productlists->name . '" is published.';
        } else {
            $status = '0';
            $message = 'product-lists with title "' . $productlists->name . '" is unpublished.';
        }

        $this->productlists->changeStatus($productlists->id, $status);
        $this->productlists->update($productlists->id, array('is_active' => $status));
        $updated = $this->productlists->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'blog' => $updated], 200);
    }
}
