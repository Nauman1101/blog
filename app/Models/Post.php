<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'body',
    ];
    
    function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
    function likes(){
        return $this->HasMany(like::class);
    }
}
