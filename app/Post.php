<?php

namespace App;

use App\Like;
use App\User;
use App\Comment;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // protected $appends = ['status'];
    
    /**
    * Relationship between user and post.
    * @method user
    * @return user
    */
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    /**
    * Relationship between post and comment.
    * @method user
    * @return user
    */
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    /**
     * Relation between likes and post
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    /**
     * follow status of user 1 for follow and o for unfollow
     * @method follower
     * @retun json
     */
    public function follower()
    {
        return $this->hasMany(Follower::class, 'follows_id', 'user_id')->where('user_id', Auth::user()->id);
    }

    // public function getStatusAttribute()
    // {
    //     return "true";
    // }
    /**
    * Determine whether a post has been marked as favorite by a user.
    *
    * @return boolean
    */
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())->where('post_id', $this->id)->first();
    }
    
}
