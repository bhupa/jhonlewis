<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Lenses\LensesStoreRequest;
use App\Http\Requests\Backend\Lenses\LensesUpdateRequest;
use App\Repositories\LensesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LensesController extends Controller
{
    protected $lense;

    public function __construct(LensesRepository $lense)
    {
        $this->lense = $lense;

    }
    public function index()
    {

        $lenses = $this->lense->orderBy('created_at','desc')->paginate('20');

        return view('backend.lense.view')->withlenses($lenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.lense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LensesStoreRequest $request)
    {
        $data = $request->except('_token');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->lense->create($data)){


            return redirect()->to('/lenses')->with('success','lense added successfully');
        }
        return redirect()->back()->with('errors','lense cannot added Successfully');
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

        $lenses = $this->lense->where('slug', $slug)->first();
        return view('backend.lense.edit')->withlenses($lenses );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LensesUpdateRequest $request, $id)
    {

        $lense = $this->lense->find($id);
        $data = $request->except('_token');


        $data['created_by'] = Auth::user()->id;
        if($this->lense->update( $lense->id,$data)){


            return redirect()->to('/lenses')->with('success','lense updated successfully');
        }
        return redirect()->back()->with('errors','lense cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lense = $this->lense->find($id);

        if($this->lense->destroy($lense->id)){

            $message = 'lense delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'lense cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $lense = $this->lense->find($request->get('id'));
        if ($lense->is_active == 0) {
            $status = '1';
            $message = 'lense with name "' . $lense->name . '" is published.';
        } else {
            $status = '0';
            $message = 'lense with name "' . $lense->name . '" is unpublished.';
        }

        $this->lense->changeStatus($lense->id, $status);
        $this->lense->update($lense->id, array('is_active' => $status));
        $updated = $this->lense->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'lenses' => $updated], 200);
    }
}
