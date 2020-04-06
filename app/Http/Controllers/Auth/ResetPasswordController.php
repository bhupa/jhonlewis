<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordResetRequest;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;
    public function __construct(UserRepository $user)
    {

        $this->user = $user;
    }

    public function showResetForm($token){

        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        if(!empty($tokenData)){
            return view('auth.reset')->withTokenData($tokenData);
        }
        return redirect()->to('password/reset')->with('flash_error','token is experied');


    }

    public function reset(ForgetPasswordResetRequest $request){

        $data= $request->except('_token','confirm');
        $user = $this->user->where('email',$request->email)->first();
        $data['password'] =Hash::make($request->password);
        $tokenData = DB::table('password_resets')
            ->where('email', $user->email)->delete();
        if($this->user->update($user->id,$data)){
            return redirect()->to('/login')->with('success','Password is reset please get login');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors(array('email' => 'credintials do not matches.'));

//        return redirect()->to('password/reset')->with('errors','token is experied');
    }
}
