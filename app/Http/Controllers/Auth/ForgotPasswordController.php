<?php

namespace App\Http\Controllers\Auth;

use Mail;
use Session;
use App\User;
use Carbon\Carbon;
use App\PasswordReset;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    /**
    * Create token password reset
    * @param  [string] email
    * @return [string] message
    */
    
    public function sendResetLinkEmail(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email'
        ], trans('validation'));
        $user = User::where('email', $request->email)->first(); 
        
    if (!$user)
    return response()->json([
        'message' => "We can't find a user with that e-mail address."
    ], 404);
    $passwordReset = PasswordReset::updateOrCreate(
        ['email' => $user->email],
        [
            'email' => $user->email,
            'token' => str_random(60)
            ]
        );
        Mail::to($user->email)->send(new ResetPassword( $user, $passwordReset->token ));
        
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
            ]);
        }
            
            
    /**
    * Form to display the reset form
    * 
    * @param str $token
    * @return view
    */
    public function customResetPasswordForm($token) {
        return view('auth.passwords.reset', ['token' => $token]);
    }
            
    /**
    * Function to used the update user passowrd
    * 
    * @param Request $request
    * @return obj
    */
    public function customResetPassword(Request $request) {
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        
        ]);       
        $tokenData = PasswordReset::where('email', $request->email)->first();
        // Check email is exist or not
        if(empty($tokenData)) {
            Session::flash('error', "We can't find a user with that e-mail address.");
            return redirect()->back();
        }
        
        $checKTokenEmailExist = PasswordReset::where('token', $request->token)
        ->where('email', $request->email)->first();
        // Check token and email is valid or not
        if(empty($checKTokenEmailExist)) {
            Session::flash('error', "This password reset token is invalid.");
            return redirect()->back();
        }
        // Update the password if email or token is valid
        $user = User::where('email', $checKTokenEmailExist->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        $checKTokenEmailExist->delete();
        $user->notify(new PasswordResetSuccess($checKTokenEmailExist));
        Session::flash('message', "Your password has been changed succefully.");
        return redirect()->back();   
        }
}
            
            
            
