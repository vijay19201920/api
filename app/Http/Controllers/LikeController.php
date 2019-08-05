<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\NewLikePost;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    
    /**
    * likedPost a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function likedPost(Request $request,$post_id)
    {
        
        $likecheck = Like::where(['user_id'=>Auth::id(),'post_id'=>$post_id])->first();
        if ($likecheck) {
            Like::where(['user_id'=>Auth::id(),'post_id'=>$post_id])->delete();
            return response([
                'status' =>'success',
                'message'=>trans('messages.unliked')
                ]);
            }else{
                $likedPost = new Like;
                $likedPost->post_id = $post_id;
                $likedPost->user_id = Auth::user()->id;
                $likedPost->like = 1;
                $likedPost->save();
                $post = Post::find($request->post_id);
                $user = User::find($post->user_id); 
                $user->notify(new NewLikePost($likedPost));
                return response([
                    'status'=> 'success',
                    'message'=>trans('messages.liked')
                ], 200);
            }
            
        }
        public function likedPostCount($post_id) {
            
            $likedPostCount = Like:: where(['post_id'=>$post_id])->count();
            return response([
                'Total Like'=> $likedPostCount
                ]);
            }
            
        }
        
