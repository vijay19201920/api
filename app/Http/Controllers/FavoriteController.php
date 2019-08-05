<?php

namespace App\Http\Controllers;

use App\Post;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function myfavoritePost()
    {
        $loginUserid = Auth::user()->id;
        
        return Favorite::where('user_id', $loginUserid)->paginate(5);
        
    }
    
    /**
    * favorite a particular post
    *
    * @param  Post $post
    * @return Response
    */
    
    public function favoritePost(Post $post_id)
    {   
        
        $favoritecheck = Favorite::where('user_id', Auth::id())
        ->where('post_id', $post_id->id)->first();
        if ($favoritecheck) {
            $favoritecheck = Favorite::where('user_id', Auth::id())->delete();
            return response([
                'status'=> 'success',
                'message'=>trans('messages.favoriteRemove')
            ], 200);
        }
        else {
            
            $favoritePost          = new Favorite;
            $favoritePost->post_id = $post_id->id;
            $favoritePost->user_id = Auth::user()->id;
            $favoritePost->save();
            
            return response([
                'status'=> 'success',
                'message'=>trans('messages.favoriteAdd')
            ], 200);
        }
        
    }
    
    /**
    * Unfavorite a particular post
    *
    * @param  Post $post
    * @return Response
    */
    public function unFavoritePost(Post $post)
    {
        Auth::user()->favorites()->detach($post->id);
        
        return response([
            'status'  =>'success',
            'meassage'=> trans('messages.favoriteRemove')
            ]);
        }
        
        
    }
    
    
