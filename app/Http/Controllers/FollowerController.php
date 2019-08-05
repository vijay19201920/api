<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {   
        // return User::all();
        // $users =  User::where('id', '!=', Auth::id())->get();
        // return $users;
        
    }
    public function followersCount()
    {   
        
        $followerCount = Follower:: where(['user_id'=>Auth::user()->id])->count();
        return response([
            'status' => 'success',
            'Follower'=> $followerCount
            ]);
        }
        public function followingCount()
        {   
            
            $followerCount = Follower:: where(['follows_id'=>Auth::user()->id])->count();
            return response([
                'status' => 'success',
                'Following'=> $followerCount
                ]);
            }
            /**
            * Follow user.
            * @return Response
            */
            
            public function follow(User $user)
            {
                $follower = auth()->user();
                
                if ($follower->id == $user->id) {
                    
                    return response([
                        'status' =>'Error',
                        'message'=>'You can not follow yourself'
                        ]);
                    }
                    
                    if (!$follower->isFollowing($user->id)) {
                        
                        // Create a new follow instance for the authenticated user
                        
                        $follower->follows()->create([
                            
                            'follows_id' => $user->id,
                            ]);
                            // $user->notify(new UserFollowed($follower));
                            
                            return response([
                                
                                'status' =>'success',
                                'message'=>'You are now friends with '. $user->username
                                ]);
                                
                            } else {
                                
                                return response([
                                    
                                    'status'  =>'Error',
                                    'message' =>'You are already following this person'
                                    ]);
                                }
                            }
                            
                            /**
                            * Unfollow user .
                            * @return Response
                            */
                            
                            public function unfollow(User $user)
                            {
                                $follower = Auth::user();
                                
                                if ($follower->isFollowing($user->id)) {
                                    
                                    $follow = $follower->follows()->where('follows_id', $user->id)->first();
                                    $follow->delete();
                                    
                                    return response([
                                        
                                        'status' =>'success',
                                        'message'=>'You are no longer friends with'. $user->username
                                        ]);
                                    }
                                    else {
                                        
                                        return response([
                                            
                                            'status' =>'Error',
                                            'message'=>'You are not following this person'
                                            ]);
                                        }
                                    }
                                    
                                    /**
                                    * Store a newly created resource in storage.
                                    *
                                    * @param  \Illuminate\Http\Request  $request
                                    * @return \Illuminate\Http\Response
                                    */
                                    // public function follow(Request $request)
                                    // {
                                        //     return $request;
                                        // }
                                        
                                        
                                        
                                        
                                    }
                                    
