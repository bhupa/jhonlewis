<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Package\PackageStoreRequest;
use App\Http\Requests\Backend\Package\PackageUpdateRequest;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    protected $packages, $category;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
        $this->upload_path = DIRECTORY_SEPARATOR.'packages'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
        $packages = $this->packages->orderBy('created_at','desc')->paginate('10000');
        return view('backend.package.view')->withpackages($packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(packageStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'packages/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['create_by'] = Auth::user()->id;

        if($this->packages->create($data)){


            return redirect()->to('/packages')->with('success','packages created successfully');
        }
        return redirect()->back()->with('errors','packages cannot created Successfully');
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


        $packages = $this->packages->where('slug', $slug)->first();
        return view('backend.package.edit')->withpackages($packages );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(packageUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $packages = $this->packages->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'packages/'.$fileName;
            Storage::disk('public')->delete($packages->image);

        }
        if($this->packages->update( $packages->id,$data)){


            return redirect()->to('/packages')->with('success','packages updated successfully');
        }
        return redirect()->back()->with('errors','packages cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packages = $this->packages->find($id);

        if($this->packages->destroy($packages->id)){

            $message = 'packages delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'packages cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $packages = $this->packages->find($request->get('id'));
        if ($packages->is_active == 0) {
            $status = '1';
            $message = 'packages with title "' . $packages->name . '" is published.';
        } else {
            $status = '0';
            $message = 'packages with title "' . $packages->name . '" is unpublished.';
        }

        $this->packages->changeStatus($packages->id, $status);
        $this->packages->update($packages->id, array('is_active' => $status));
        $updated = $this->packages->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'package' => $updated], 200);
    }
}
