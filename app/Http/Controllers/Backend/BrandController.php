<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Brand\BrandStoreRequest;
use App\Http\Requests\Backend\Brand\BrandUpdateRequest;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class BrandController extends Controller
{
    protected $brand, $category;

    public function __construct(BrandRepository $brand)
    {
        $this->brand = $brand;
        $this->upload_path = DIRECTORY_SEPARATOR.'brand'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
        $brands = $this->brand->orderBy('created_at','desc')->paginate('10000');
        return view('backend.brand.view')->withBrands($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'brand/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->brand->create($data)){


            return redirect()->to('/brand')->with('success','Brand created successfully');
        }
        return redirect()->back()->with('errors','Brand cannot created Successfully');
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


        $brand = $this->brand->where('slug', $slug)->first();
        return view('backend.brand.edit')->withBrand($brand );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $brand = $this->brand->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'brand/'.$fileName;
            Storage::disk('public')->delete($brand->image);

        }
        if($this->brand->update( $brand->id,$data)){


            return redirect()->to('/brand')->with('success','Brand updated successfully');
        }
        return redirect()->back()->with('errors','Brand cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->brand->find($id);

        if($this->brand->destroy($brand->id)){

            $message = 'Brand delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Brand cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $brand = $this->brand->find($request->get('id'));
        if ($brand->is_active == 0) {
            $status = '1';
            $message = 'Brand with title "' . $brand->name . '" is published.';
        } else {
            $status = '0';
            $message = 'Brand with title "' . $brand->name . '" is unpublished.';
        }

        $this->brand->changeStatus($brand->id, $status);
        $this->brand->update($brand->id, array('is_active' => $status));
        $updated = $this->brand->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'brand' => $updated], 200);
    }
}
