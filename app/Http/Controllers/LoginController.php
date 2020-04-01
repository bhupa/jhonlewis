<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Session;
use Cache;

class LoginController extends Controller
{
    public function login(Request $request){

        if (Auth::attempt(['email' => $request->email,'password' => $request->password,])) {

            if (!empty(Auth::user()->admin)) {
                return redirect()->to('/dashboard')->with('success-login', 'Successfully login');
            }
            if(!empty($request->url)){
                return redirect()->to('/order');
            }else{
                return redirect()->to('/profile')->with('success-login','Successfully login');
            }

        }
        return back()
            ->withInput()
            ->with('flash_error', 'Credentials do not match the records.');
    }
    public function logout(Request $request){
        Session::flush();
        $request->session()->regenerate();
        Session::flash('succ_message', 'Logged out Successfully');
        Cache::flush();

        return redirect('/')->with('success','Logout Successfully');
    }

}
