<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\User;
use App\Comment;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function privateProfile(){
        // return User::withCount('followers')->get();
        $loginUserid = Auth::user()->id; 
        return Post::withCount('likes','comments')->where('user_id', $loginUserid)->paginate(5);
    }
    /**
    * function to use for Private profile
    * @response json
    */
    
    public function profile() {
        $data = array();
        $loginUserid = Auth::user()->id;
        $data['total_likes']        = Like::where('user_id', $loginUserid)->get()->count();
        $data['total_comments']     = Comment::where('user_id', $loginUserid)->get()->count();
        $data['toal_secrets']       = Post::where('user_id', $loginUserid)->get()->count();
        $data['total_favorite']     = Favorite::where('user_id', $loginUserid)->get()->count();
        $data['is_show']            = Auth::user()->show_me;
        
        return $data;
        
    }
    
    /**
    * function to use for show and hide profile
    * @response json
    */
    public function showMe() {
        $user = User::find(Auth::user()->id);
        $user->show_me = $user->show_me == 1 ? 0 : 1;
        $user->save();
        return response([
            'status'=>'Success',
            'message'=>trans('messages.profileSuccess')
            ]);
        }
        
        /**
        * Show list of post likes by user
        * @method listPostUserLikes 
        * @return json
        */
        
        public function listPostUserLikes(){
            
            $user = Auth::user()->id;
            $posts = Like::where('user_id', $user)->pluck('post_id')->toArray();
            if($posts){
                return Post::whereIn('id', $posts)->withCount('comments','likes')->get();
            }else{
                return response([
                    'status'=>'error',
                    'message'=>trans('messages.listPostUserError')
                    ]);
                }
            }
            
            /**
            * show list of post comments by user.
            * @method listPostUserComment
            * @return json
            */
            
            public function listPostUserComment(){
                
                $posts =
                DB::table('comments')
                ->select('users.username', 'comments.post_id','posts.post_text','comments.id','comments.comment','comments.created_at')
                ->join('posts', 'comments.post_id', '=', 'posts.id')
                ->join('users','posts.user_id','=','users.id')
                ->where('comments.user_id', Auth::user()->id)
                ->get();
                
                if($posts){
                    return $posts;
                }else{
                    return response([
                        'status'=>'error',
                        'message'=>trans('messages.listCommentUserError')
                        ]);
                    }
                    
                }
                
                /**
                * Show Saved Secrets by user
                * @method savedPostByUser
                * @return json
                */
                public function savedPostByUser(){
                    
                    $userId = Auth::user()->id;
                    $posts = Favorite::where('user_id',$userId)->pluck('post_id')->toArray();
                    if($posts){
                        return Post::whereIn('id',$posts)->withCount('likes','comments')->get();
                    }else{
                        return response([
                            'status'=>'error',
                            'message'=>trans('messages.listSavedUserError')
                            ]);
                        }
                    }
                    
                }
                
                
                
                
                
                
                
