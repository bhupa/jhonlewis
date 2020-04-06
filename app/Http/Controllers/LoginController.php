<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Login\LoginRequest;
use App\Http\Requests\Frontend\Profile\LoginStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Cache;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    protected  $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function showForm(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){

        if (Auth::attempt(['email' => $request->email,'password' => $request->password,])) {

            if (!empty(Auth::user()->admin)) {
                return redirect()->to('/dashboard')->with('success-login', 'Successfully login');
            }
            if(!empty($request->url)){
                $url=$request->url;

                return Redirect::to($url);

            }else{
                return redirect()->to('/profile')->with('success-login','Successfully login');
            }

        }

        return redirect()->to('/login')
            ->withInput()
            ->withErrors(['email'=>'Credentials do not match the records.']);
    }
    public function logout(Request $request){
        Session::flush();
        $request->session()->regenerate();
        Session::flash('succ_message', 'Logged out Successfully');
        Cache::flush();

        return redirect('/')->with('success','Logout Successfully');
    }

    public function store(LoginStoreRequest $request){

        $user = Auth::user();
        if(Auth::attempt(['email'=>$user->email,'password'=>$request->old_password]))
        {
            $data['password']= Hash::make($request->new_password);

            $this->user->update($user->id,$data);
            $this->logout($request);
            return redirect()->to('/login');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors(array('old_password' => 'Old Password didnot matches.'));



    }

}
