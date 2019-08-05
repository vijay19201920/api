<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::all()->where('type','!=','admin');
        return view('admin.pages.users.users-list')->with('users',$users);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $userName =  User::where('id',$id)->first();
        $posts = Post::where("user_id",$id)->withCount('likes','comments')->paginate(5);
        return view('admin.pages.users.user-details',compact('posts','userName'));
    }
    
    
    /**
    * Update the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update($id)
    {
        
        $user =  User::where(['id'=>$id,'status'=>1])->orwhere('status',0)->first();
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
        
        return redirect()->back()->with('success','Record has been successfully updated');
    }
}
