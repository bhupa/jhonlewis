<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Sunglasses\SunglassesStoreRepository;
use App\Http\Requests\Backend\Sunglasses\SunglassesUpdateRepository;
use App\Repositories\SunglassesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SunglassesController extends Controller
{
    protected $sunglasse;

    public function __construct(SunglassesRepository $sunglasse)
    {
        $this->sunglasse = $sunglasse;

    }
    public function index()
    {

        $sunglasses = $this->sunglasse->orderBy('created_at','desc')->paginate('20');

        return view('backend.sunglasse.view')->withsunglasses($sunglasses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.sunglasse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SunglassesStoreRepository $request)
    {
        $data = $request->except('_token');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;

        if($this->sunglasse->create($data)){


            return redirect()->to('/sunglasses')->with('success','sunglasse added successfully');
        }
        return redirect()->back()->with('errors','sunglasse cannot added Successfully');
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

        $sunglasses = $this->sunglasse->where('slug', $slug)->first();
        return view('backend.sunglasse.edit')->withsunglasses($sunglasses );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SunglassesUpdateRepository $request, $id)
    {

        $sunglasse = $this->sunglasse->find($id);
        $data = $request->except('_token');


        $data['created_by'] = Auth::user()->id;
        if($this->sunglasse->update( $sunglasse->id,$data)){


            return redirect()->to('/sunglasses')->with('success','sunglasse updated successfully');
        }
        return redirect()->back()->with('errors','sunglasse cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sunglasse = $this->sunglasse->find($id);

        if($this->sunglasse->destroy($sunglasse->id)){

            $message = 'sunglasse delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'sunglasse cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $sunglasse = $this->sunglasse->find($request->get('id'));
        if ($sunglasse->is_active == 0) {
            $status = '1';
            $message = 'sunglasse with name "' . $sunglasse->name . '" is published.';
        } else {
            $status = '0';
            $message = 'sunglasse with name "' . $sunglasse->name . '" is unpublished.';
        }

        $this->sunglasse->changeStatus($sunglasse->id, $status);
        $this->sunglasse->update($sunglasse->id, array('is_active' => $status));
        $updated = $this->sunglasse->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'sunglasses' => $updated], 200);
    }
}
