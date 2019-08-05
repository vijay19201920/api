<?php

namespace App;

use App\Post;
use App\Comment;
use App\Follower;
use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'username','phone', 'email', 'password','longitude','latitude',
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * The relationship between post and user.
    * @method posts
    * @return post
    */
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function getPostsCountAttribute(){
        return $this->posts()->count();
    }
    /**
    * The relationship between comments and user.
    * @method comment
    * @return response
    */
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    /**
    * The relationship between follow and user.
    * @method follows
    * @return response
    */
    
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
        ->withTimestamps();
    }
    
    // returns everyone the user is following.
    
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
        ->withTimestamps();
    }
    
    //  to allow the user to follow another user.
    
    public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }
    
    // to allow the user to unfollow another user.
    
    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }
    
    // to check whether a user isFollowing a specific user.
    
    public function isFollowing($userId)
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first(["users.id"]);
    }
    
    /**
    * Get all of favorite posts for the user.
    */
    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimeStamps();
    }
    
    /**
    * The create user .
    * @method createUser
    */
    
    static public function createUser($request) {
        
        $user = new User([
            'username' => Self::generateUserName(1, 6),
            'phone'    => $request->phone,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'latitude' => $request->latitude,
            'longitude'=> $request->longitude
            
            ]);
            
            $user->save();
            if($user){
                return $user->id;
            }else {
                return false;
            }
        }
        
        /**
        * The function genrate unique username randomly.
        * @ method generateUserName
        * @uniqueStrings array
        */
        
        public static function generateUserName($count, $length = 6)
        {
            $uniqueStrings = [];
            while (count($uniqueStrings) < $count) {
                do {
                    $uniqueString = strtoupper(str_random($length));
                } while (in_array($uniqueString, $uniqueStrings));
                $uniqueStrings[] = $uniqueString;
            }
            
            $existing = User::whereIn('username', $uniqueStrings)->count();
            if ($existing > 0) {
                $uniqueStrings += Self::generateUserName($existing, $length);
            }
            
            return (count($uniqueStrings) == 1) ? $uniqueStrings[0] : $uniqueStrings;
        }
        
        
        
        
        
    }
    
