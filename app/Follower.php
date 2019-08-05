<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'follows_id',
    ];
    public function user() {
        
        return $this->belongsTo(User::class);
    }
}
