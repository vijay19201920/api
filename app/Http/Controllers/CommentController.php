<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewCommentPost;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
     /**
     * show list of particular posts comments
     * @method comments
     * @param request
     * @return json
     */
    public function comments(Request $request){
        $post_id = $request->post_id;
        return $comment = Comment::Where(['post_id'=> $post_id])->orderBy('created_at', 'desc')->get();
    }
    /**
    * createComment a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function createComment(Request $request, $post_id)
    {
        
        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:10',
        ], trans('validation'));
        if (count($validator->messages()) > 0) {
            return response()->json([
                'message' => $validator->messages()->all(),
                'status' => 'error'
            ], 401);
        }
        
        $post = Post::find($request->post_id);
        
        $comment = Comment::create([
            
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'comment' => $request->comment,
            ]);
            
            
            $user = User::find($post->user_id); 
            $user->notify(new NewCommentPost($comment));
            
            
            return response([
                'status'=> 'success',
                'message'=>trans('messages.commentSuccess')
            ], 200);
        }
        
        /**
        * Display the specified resource.
        * @param  \App\Comment  $comment
        * @return \Illuminate\Http\Response
        */
        public function getTotalComment($post_id,$user_id = null)
        {
            
            if($user_id == null){
                $userId = Auth::user()->id;
                $comment = Comment::Where(['post_id'=> $post_id])->orderBy('created_at', 'desc')->get()->count();
                return response([
                    'comment count'=>$comment
                    ]);
                }
                else {
                    $userId = Auth::user()->id;
                    $comment = Comment::Where(['post_id'=> $post_id,'user_id'=>$userId])->orderBy('created_at', 'desc')->get()->count();
                    return response([
                        'comment count'=>$comment
                        ]);
                    }
                }
                
                /**
                * Update the specified resource in storage.
                *
                * @param  \Illuminate\Http\Request  $request
                * @param  \App\Comment  $comment
                * @return \Illuminate\Http\Response
                */
                public function updateComment(Request $request)
                {
                    
                    $validator = Validator::make($request->all(), [
                        'comment' => 'required|min:10',
                    ], trans('validation'));
                    if (count($validator->messages()) > 0) {
                        return response()->json([
                            'message' => $validator->messages()->all(),
                            'status' => 'error'
                        ], 401);
                    }
                    $userId = Auth::user()->id;
                    $comment = Comment::find( $request->comment_id );
                    if($comment->user_id === $userId){
                        
                        $comment->comment = $request->comment;
                        $comment->id = $request->comment_id;
                        $comment->save();
                        
                        return response([
                            'status'=> 'success',
                            'message'=>trans('messages.commentUpdate')
                            ]);
                        } 
                        else {
                            return response([
                                'status'=> 'Error',
                                // 'message'=>trans('messages.commentId')
                                'message'=>trans('messages.commentInvalid')
                                ]);
                            }
                        }
                        
                        /**
                        * Remove the specified resource from storage.
                        *
                        * @param  \App\Comment  $comment
                        * @return \Illuminate\Http\Response
                        */
                        public function destroyComment( $comment_id)
                        {
                            
                            $userId = Auth::user()->id;
                            $comment = Comment::find($comment_id);
                            if($comment->user_id === $userId) {
                                $comment->delete();
                                return response([
                                    'status' =>'success',
                                    'message'=>trans('messages.commentDelete')
                                    ]);
                                }
                                else {
                                    if($comment_id){
                                        return response([
                                        'status'  =>'Error',
                                        'message'=>trans('messages.commentInvalidStatus')
                                        ]);
                                    }
                                    
                                    }
                                }
                                    
                                
                            }
                            
                            
                            
