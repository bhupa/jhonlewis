<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Brand\BrandStoreRequest;
use App\Http\Requests\Backend\BrandBanner\BrandBannerStoreRequest;
use App\Http\Requests\Backend\BrandBanner\BrandBannerUpdateRequest;
use App\Repositories\BrandBannerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class BrandBannerController extends Controller
{
    protected $banners;

    public function __construct(BrandBannerRepository $banners)
    {
        $this->banners = $banners;
        $this->upload_path = DIRECTORY_SEPARATOR.'brand-banners'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
        $banners = $this->banners->orderBy('created_at','desc')->paginate('10000');
        return view('backend.brand-banner.view')->withBanners($banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand-banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandBannerStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'brand-banners/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['create_by'] = Auth::user()->id;

        if($this->banners->create($data)){


            return redirect()->to('/brand-banners')->with('success','Brand Banners created successfully');
        }
        return redirect()->back()->with('errors','Brand Banners cannot created Successfully');
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


        $banners = $this->banners->where('slug', $slug)->first();
        return view('backend.brand-banner.edit')->withBanners($banners );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandBannerUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $banners = $this->banners->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'brand-banners/'.$fileName;
            Storage::disk('public')->delete($banners->image);

        }
        if($this->banners->update( $banners->id,$data)){


            return redirect()->to('/brand-banners')->with('success','Brand-Banners updated successfully');
        }
        return redirect()->back()->with('errors','Brand-Banners cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banners = $this->banners->find($id);

        if($this->banners->destroy($banners->id)){

            $message = 'Brand-banners delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'brand-banners cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $banners = $this->banners->find($request->get('id'));
        if ($banners->is_active == 0) {
            $status = '1';
            $message = 'brand-banners with title "' . $banners->name . '" is published.';
        } else {
            $status = '0';
            $message = 'brand-banners with title "' . $banners->name . '" is unpublished.';
        }

        $this->banners->changeStatus($banners->id, $status);
        $this->banners->update($banners->id, array('is_active' => $status));
        $updated = $this->banners->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'banner' => $updated], 200);
    }
}
