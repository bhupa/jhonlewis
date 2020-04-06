<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Register\RegisterStoreRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    public function index(){

        return view('auth.register');
    }
    public function store(RegisterStoreRequest $request){
        $data = $request->except('__token');
        $data['password']= Hash::make($request->password);
        if($this->user->create($data)){

            return redirect()->to('/login');

        }
        return redirect()->back()
            ->withInput()
            ->withErrors(array('name' => 'Please insert the valid information.'));
    }
}
