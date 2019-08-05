<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /** 
    * show login form.
    * @method loginForm.
    * @return form
    */
    public function loginForm() {
        
        return view('admin.login');
    }
    /** 
    * Authenticate login.
    * @method login
    * @return dashboard
    */
    
    public function login(Request $request)
    {
        $email    =  $request->email;
        $password =  $request->password;
        // check is admin
        if (Auth::attempt(['email' => $email, 'password' =>$password,'type'=>'admin'], $request->remember))
        {
            Session::put('adminSession',$email);
            return redirect('admin/dashboard');
        }
        else if (Auth::attempt(['username' => $email, 'password' =>$password,'type'=>'admin'], $request->remember))
        {
            Session::put('adminSession',$email);
            return redirect('admin/dashboard');
        }
        else
        {
            return redirect('admin')->with('error','Invalid Email or Password !');
        }
    }
    
    /**
    * The dashboard 
    * @method dashboard
    */
    
    public function dashboard(){
        
        $newuserDate = Carbon::today();
        $users = User::all()->count();
        $secrets = Post::all()->count();
        $newusers = User::whereDate('created_at', $newuserDate)->count();
        
        // greetings
        $time = date("H");
        if ($time < "12") {
            $greetings = "Good Morning";
        } else
        if ($time >= "12" && $time < "17") {
            $greetings = "Good Afternoon";
        } else
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else
        if ($time >= "19") {
            $greetings = "Good Night";
        }
        
        return view('admin/dashboard',compact('users','newusers','secrets','greetings'));
    }
    
    /** 
    * The logout admin. 
    * @method logout.
    * @return form
    */
    
    public function logout()
    {
        Session::flush();
        return redirect('admin')->with('success','Successfully Logout !');
    }
    
    /**
    * show change passwrod form
    * @method changePasswordForm
    * @param null
    * @return null
    */
    
    public function changePasswordForm(){
        
        $page_title = "Change Password";
        return view('admin.change-password',compact('page_title'));
    }
    
    /**
    * Chnage password.
    * @method changePassword
    * @param $request
    * @return null
    */
    
    public function changePassword(Request $request){
        
        $validatedData = $request->validate([
            'oldpass' => 'required',
            'password' =>'required',
            'confirm_password' =>'required|same:password'
            
            ]);
            
            $current_password = Auth::User()->password;
            // check has password           
            if(Hash::check($request->input('oldpass'), $current_password))
            {                   
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request->input('password'));
                $obj_user->save(); 
                return redirect()->back()->with('success', 'Password has been successfully updated');
            }else{
                return redirect()->back()->with('error', 'Please check current password is wrong!');
            }
            
        }
        
        
        
    }
