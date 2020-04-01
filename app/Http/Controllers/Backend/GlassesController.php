<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\Backend\Glass\GlassStoreRequest;
use App\Http\Requests\Backend\Glass\GlassUpdateRequest;
use App\Repositories\GlassesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class GlassesController extends Controller
{
    protected $glasse;

    public function __construct(GlassesRepository $glasse)
    {
        $this->glasse = $glasse;

    }
    public function index()
    {

        $glasses = $this->glasse->orderBy('created_at','desc')->paginate('20');

        return view('backend.glasse.view')->withglasses($glasses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.glasse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GlassStoreRequest $request)
    {
        $data = $request->except('_token');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->glasse->create($data)){


            return redirect()->to('/glasses')->with('success','glasse added successfully');
        }
        return redirect()->back()->with('errors','glasse cannot added Successfully');
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

        $glasses = $this->glasse->where('slug', $slug)->first();
        return view('backend.glasse.edit')->withglasses($glasses );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GlassUpdateRequest $request, $id)
    {

        $glasse = $this->glasse->find($id);
        $data = $request->except('_token');


        $data['created_by'] = Auth::user()->id;
        if($this->glasse->update( $glasse->id,$data)){


            return redirect()->to('/glasses')->with('success','glasse updated successfully');
        }
        return redirect()->back()->with('errors','glasse cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $glasse = $this->glasse->find($id);

        if($this->glasse->destroy($glasse->id)){

            $message = 'glasse delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'glasse cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $glasse = $this->glasse->find($request->get('id'));
        if ($glasse->is_active == 0) {
            $status = '1';
            $message = 'glasse with name "' . $glasse->name . '" is published.';
        } else {
            $status = '0';
            $message = 'glasse with name "' . $glasse->name . '" is unpublished.';
        }

        $this->glasse->changeStatus($glasse->id, $status);
        $this->glasse->update($glasse->id, array('is_active' => $status));
        $updated = $this->glasse->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'glasses' => $updated], 200);
    }

}
