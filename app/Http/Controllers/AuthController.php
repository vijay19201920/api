<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Passport\Passport;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function login(Request $request){ 
        
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|',
            'password' => 'required',
        ], trans('validation'));
        
        if (count($validator->messages()) > 0) {
            return response()->json([
                'message' => $validator->messages()->all(),
                'status' => 'error'
            ], 401);
        }
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'status'=>1])){ 
            Passport::tokensExpireIn(Carbon::now()->addDays(30));
            Passport::refreshTokensExpireIn(Carbon::now()->addDays(60));
            
            $user = Auth::user();
            
            $objToken = $user->createToken('API SpainOptions');
            $strToken = $objToken->accessToken;
            
            $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now());
            
            return response()->json(["token_type" => "Bearer", "expires_in" => $expiration, "access_token" => $strToken,'user_id'=>$user->id,'username'=>$user->username]); 
        } 
        else { 
            return response()->json([
                'status' => 'error',
                'message' => 'The account has been suspended.'
            ], 401); 
        } 
    }
    
    /**
    * Create user
    *
    * @param  [string] name
    * @param  [string] email
    * @param  [string] password
    * @return [string] message
    */
    
    public function register(Request $request) { 
        
        /**
        * The method that are validation.
        * @mehod validated
        */
        
        $validator = Validator::make($request->all(), [
            'phone'     => 'required|min:10|max:12',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required',
        ], trans('validation'));
        
        if (count($validator->messages()) > 0) {
            return response()->json([
                'message' => $validator->messages()->all(),
                'status' => 'error'
            ], 401);
        }
        
        try {
            $created = User::createUser($request);
            
            if($created) {
                
                return response()->json([
                    'status'    => 'success',
                    'message'   => trans('messages.success'),
                    'UserName'    => User::generateUserName(1,6)  
                ], 201);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'Internal server error'
                ], 500);
            }
        } catch(\Exception $e){
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }
    
    /**
    * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function logout(Request $request)
    {
        
        $request->user()->token()->revoke();
        return response()->json([
            'status'  => 'success',
            'message' => trans('messages.logout')
        ], 200);
    }
    
}
