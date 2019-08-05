<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    
    public function __construct(){
        
        $this->middleware('auth:api');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function getAllPost()
    {
        // return Post::with('user')->get();
        return Post::withCount('comments','likes', 'follower')->get();
    }
    public function getFollowPost(){
        $user = Auth::user();
        $userIds = $user->follows()->pluck('follows_id')->toArray();
        $posts = Post::whereIn('user_id', $userIds)->orderBy('created_at', 'DESC')->get(); 
        if($posts){
            return response($posts, 200); 
        }
    }
    /**
    * Display a listing of the post with user.
    *
    * @return \Illuminate\Http\Response
    */
    
    public function getMyPost() {
        
        $loginUserid = Auth::user()->id;
        
        return Post::withCount('likes')->where('user_id', $loginUserid)->with('user','likes')->paginate(5);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_text' => 'required',
            'post_image' =>'mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ], trans('validation'));
        if (count($validator->messages()) > 0) {
            return response()->json([
                'message' => $validator->messages()->all(),
                'status' => 'error'
            ], 401);
        }
        $newImageName = null;
        $post = new Post;
        $post->post_text = $request->post_text;
        $post->color     = $request->color;
        $post->user_id   = Auth::user()->id;
        $post->longitude = $request->longitude;
        $post->latitude  = $request->latitude;
        
        if($request->hasFile('post_image')) {
            $imageName       = time().'.'.request()->post_image->getClientOriginalExtension();
            request()->post_image->move(public_path('images'), $imageName);
            $newImageName = 'images/'.$imageName;
        }
        $post->post_image = $newImageName;
        $post->save();
        
        
        return response([
            'status'=> 'success',
            'message'=>trans('messages.postSuccess')
        ], 200);
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function show($post_id)
    {
        $post =  Post::withCount('likes','comments','follower')->where('id',$post_id)->get();
        return $post;
    }
    
    /**
    * Update the specified resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function updatePost(Request $request, $post_id = null)
    {
        $newImageName = null;
        
        $validator = Validator::make($request->all(), [
            'post_text' => 'required',
            'post_image' =>'mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ], trans('validation'));
        if (count($validator->messages()) > 0) {
            return response()->json([
                'message' => $validator->messages()->all(),
                'status' => 'error'
            ], 401);
        }
        $post = Post::find($post_id);
        $userId = Auth::user()->id;
        if($post->user_id === $userId) {
            
            $post->post_text = $request->post_text;
            $post->color     = $request->color;
            $post->user_id   = Auth::user()->id;
            $post->longitude = $request->longitude;
            $post->latitude  = $request->latitude;
            if($request->hasFile('post_image')){
                
                $imageName = time().'.'.request()->post_image->getClientOriginalExtension();
                request()->post_image->move(public_path('images'), $imageName);
                $newImageName = 'images/'.$imageName;
                
            }
            
            $post->post_image = $newImageName;
            $post->save();
            return response([
                'status'=> 'success',
                'message'=>trans('messages.postUpdate')
            ], 200);
        }else {
            return response([
                'status' =>'error',
                'message'=>trans('messages.postId')
                ]);
            }
            
        }
        
        /**
        * Remove the specified resource from storage.
        * @param  \App\Post  $post
        * @return \Illuminate\Http\Response
        */
        
        public function destroy($post_id)
        {
            
            $post = Post::find($post_id);
             $userId = Auth::user()->id;
             if($post){
            if($post->user_id === $userId) {
                $post->delete();
                return response([
                    'status' =>'success',
                    'message'=>trans('messages.postDelete')
                ],200);
            }else{
                return response([
                    'status' =>'error',
                    'message'=>trans('messages.postId')
                    ]);
                }
            }else{
                return response([
                    'status' =>'error',
                    'message'=>trans('messages.postId')
                    ]);
                }
            }
        }
        
        
