<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Service\ServiceStoreRequest;
use App\Http\Requests\Backend\Service\ServiceUpdateRequest;
use App\Repositories\ServiceRespository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    protected $services, $category;

    public function __construct(ServiceRespository $services)
    {
        $this->services = $services;
        $this->upload_path = DIRECTORY_SEPARATOR.'services'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function index()
    {
//        dd($this->services->latestFirst());
        $services = $this->services->orderBy('created_at','desc')->paginate('10000');
        return view('backend.service.view')->withservices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {
        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'services/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['create_by'] = Auth::user()->id;

        if($this->services->create($data)){


            return redirect()->to('/services')->with('success','services created successfully');
        }
        return redirect()->back()->with('errors','services cannot created Successfully');
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


        $services = $this->services->where('slug', $slug)->first();
        return view('backend.service.edit')->withservices($services );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $services = $this->services->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'services/'.$fileName;
            Storage::disk('public')->delete($services->image);

        }
        if($this->services->update( $services->id,$data)){


            return redirect()->to('/services')->with('success','services updated successfully');
        }
        return redirect()->back()->with('errors','services cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = $this->services->find($id);

        if($this->services->destroy($services->id)){

            $message = 'services delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'services cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $services = $this->services->find($request->get('id'));
        if ($services->is_active == 0) {
            $status = '1';
            $message = 'services with title "' . $services->name . '" is published.';
        } else {
            $status = '0';
            $message = 'services with title "' . $services->name . '" is unpublished.';
        }

        $this->services->changeStatus($services->id, $status);
        $this->services->update($services->id, array('is_active' => $status));
        $updated = $this->services->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'service' => $updated], 200);
    }
    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->services->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
