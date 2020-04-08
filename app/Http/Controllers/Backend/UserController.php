<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\User\UserStoreRequest;
use App\Http\Requests\Backend\User\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected  $user;


    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index(){
        $users = $this->user->orderBy('created_at','desc')->get();

        return view('backend.user.index')->withUsers($users);
    }
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->except('_token','image');

        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;


        if($this->user->create($data)){


            return redirect()->to('/users')->with('success','users created successfully');
        }
        return redirect()->back()->with('errors','users cannot created Successfully');
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


        $users = $this->user->where('slug', $slug)->first();
        return view('backend.user.edit')->withusers($users );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $users = $this->user->find($id);

        if($this->user->update( $users->id,$data)){


            return redirect()->to('/users')->with('success','users updated successfully');
        }
        return redirect()->back()->with('errors','users cannot updated Successfully');
    }
    public function destroy($id)
    {
        $users = $this->user->find($id);

        if($this->user->destroy($users->id)){

            $message = 'users delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'users cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $users = $this->user->find($request->get('id'));
        if ($users->is_active == 0) {
            $status = '1';
            $message = 'users with name "' . $users->name . '" is published.';
        } else {
            $status = '0';
            $message = 'users with name "' . $users->name . '" is unpublished.';
        }

        $this->user->changeStatus($users->id, $status);
        $this->user->update($users->id, array('is_active' => $status));
        $updated = $this->user->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'user' => $updated], 200);
    }
}
