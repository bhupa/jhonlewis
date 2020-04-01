<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Frame\FrameStoreRequest;
use App\Http\Requests\Backend\Frame\FrameUpdateRequest;
use App\Repositories\FrameCategoryRepository;
use App\Repositories\FrameRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FrameController extends Controller
{
    protected $frame,$category;

    public function __construct(FrameRepository $frame,FrameCategoryRepository $category)
    {
        $this->frame = $frame;
        $this->category = $category;

    }
    public function index()
    {

        $frames = $this->frame->orderBy('created_at','desc')->paginate('20');

        return view('backend.frame.view')->withframes($frames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.frame.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrameStoreRequest $request)
    {
        $data = $request->except('_token');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->frame->create($data)){


            return redirect()->to('/frames')->with('success','frame added successfully');
        }
        return redirect()->back()->with('errors','frame cannot added Successfully');
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

        $frames = $this->frame->where('slug', $slug)->first();
        return view('backend.frame.edit')->withframes($frames );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FrameUpdateRequest $request, $id)
    {

        $frame = $this->frame->find($id);
        $data = $request->except('_token');


        $data['created_by'] = Auth::user()->id;
        if($this->frame->update( $frame->id,$data)){


            return redirect()->to('/frames')->with('success','frame updated successfully');
        }
        return redirect()->back()->with('errors','frame cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frame = $this->frame->find($id);

        if($this->frame->destroy($frame->id)){

            $message = 'frame delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'frame cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $frame = $this->frame->find($request->get('id'));
        if ($frame->is_active == 0) {
            $status = '1';
            $message = 'frame with name "' . $frame->name . '" is published.';
        } else {
            $status = '0';
            $message = 'frame with name "' . $frame->name . '" is unpublished.';
        }

        $this->frame->changeStatus($frame->id, $status);
        $this->frame->update($frame->id, array('is_active' => $status));
        $updated = $this->frame->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'frames' => $updated], 200);
    }
    public function getCategory(Request $request){
        $frame = $this->frame->find($request->id);
        $categories = $this->category->where('frame_id', $request->id)->where('is_active','1')->get();
        return response()->json(['success'=>true,'categories'=>$categories,'frame'=>$frame],200);
    }
}
