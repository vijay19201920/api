<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\UserFollowed;
use auth;

class UsersController extends Controller
{
    // list of users 
    public function index()
    {   
        $users = User::where('id', '!=', auth()->user()->id)->where('type','!=','admin')->get();
        return $users;
    }
    
    // follow users.
    public function follow(User $user)
    {
        
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            
            return response([
                'status'=>'Error',
                'message'=>trans('messages.followSuccess')
                ]);
            }
            if(!$follower->isFollowing($user->id)) {
                $follower->follow($user->id);
                
                // sending a notification
                $user->notify(new UserFollowed($follower));
                
                return response([
                    'status'=>'Success',
                    'message'=>trans('messages.followSuccess'). " {$user->username}"
                    ]);
                }
                
                return response([
                    'status'=>'Error',
                    'message'=>trans('messages.isfollow'). " {$user->username}"
                    ]);
                }
                // unflllow ther user
                public function unfollow(User $user)
                {
                    $follower = auth()->user();
                    if($follower->isFollowing($user->id)) {
                        $follower->unfollow($user->id);
                        return response([
                            'status'=>'Success',
                            'message'=>trans('messages.unfollowSuccess')." {$user->username}"
                            ]);
                        }
                        
                        return response([
                            'status'=>'Error',
                            'message'=>trans('messages.unfollowError')." {$user->username}"
                            ]);
                        }
                        
                        // notification to follower
                        public function notifications()
                        { 
                            return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
                        }
                        
                        /**
                        * Get Notifications list
                        * @method get
                        * @return json
                        */
                        
                        public function get() {
                            $notification = Auth::user()->unreadNotifications;
                            return $notification;
                        }
                        /**
                        * Get notification on read
                        * @method read
                        * @return json
                        */
                        
                        public function read(Request $request) {
                            
                            Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
                            return 'success';
                        }
                    }
                    
