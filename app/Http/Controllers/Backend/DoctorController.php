<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Doctor\DoctorStoreRequest;
use App\Http\Requests\Backend\Doctor\DoctorUpdateRequest;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    protected $doctors, $category;

    public function __construct(DoctorRepository $doctors)
    {
        $this->doctors = $doctors;
        $this->upload_path = DIRECTORY_SEPARATOR.'doctors'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
        $doctors = $this->doctors->orderBy('created_at','desc')->paginate('10000');
        return view('backend.doctor.view')->withdoctors($doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'doctors/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->doctors->create($data)){


            return redirect()->to('/doctors')->with('success','doctors created successfully');
        }
        return redirect()->back()->with('errors','doctors cannot created Successfully');
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
    public function edit($id)
    {


        $doctors = $this->doctors->find($id);
        return view('backend.doctor.edit')->withdoctors($doctors );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $doctors = $this->doctors->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'doctors/'.$fileName;
            Storage::disk('public')->delete($doctors->image);

        }
        if($this->doctors->update( $doctors->id,$data)){


            return redirect()->to('/doctors')->with('success','doctors updated successfully');
        }
        return redirect()->back()->with('errors','doctors cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctors = $this->doctors->find($id);

        if($this->doctors->destroy($doctors->id)){

            $message = 'doctors delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'doctors cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $doctors = $this->doctors->find($request->get('id'));
        if ($doctors->is_active == 0) {
            $status = '1';
            $message = 'doctors with title "' . $doctors->name . '" is published.';
        } else {
            $status = '0';
            $message = 'doctors with title "' . $doctors->name . '" is unpublished.';
        }

        $this->doctors->changeStatus($doctors->id, $status);
        $this->doctors->update($doctors->id, array('is_active' => $status));
        $updated = $this->doctors->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'doctor' => $updated], 200);
    }
}
