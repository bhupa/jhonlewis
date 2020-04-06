<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordResetRequest;
use App\Http\Requests\Frontend\ForgetPasswordEmailResquest;
use App\Mail\Contact\AdminContactReplyMail;
use App\Mail\ForgetPasswordLink;
use App\Repositories\SettingRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user,$setting;
    public function __construct(UserRepository $user,SettingRepository $setting)
    {
//        $this->middleware('guest');
        $this->user = $user;
        $this->setting = $setting;
    }
    public function showLinkRequestForm(){

        return view('auth.email');
    }

    public function sendResetLinkEmail(ForgetPasswordEmailResquest $request){
        $user  = $this->user->where('email', $request->email)->first();
        if(!empty($user)){
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => str_random(60), //change 60 to any length you want
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();

            $token = $tokenData->token;
            $email = $request->email;

            $adminEmail = $this->setting->where('slug','for-admin')->first();
            $companyName = $this->setting->where('slug','compant-name')->first();
            $fromEmail = $this->setting->where('slug','reply-email')->first();
            $company = [
                'name'=>$companyName['value'],
                'email'=> $fromEmail['value'],
                'compnay_email'=> $adminEmail['value']
            ];


            Mail::to($user->email)->send(new ForgetPasswordLink($tokenData,$company));
            return redirect()->back()->with('success','Please chek your email ');
        }
        return back()
            ->withInput()
            ->with('flash_error', 'Invalid Email address not found.');
    }
}
