<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable
{
    use HasFactory, Notifiable;
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['email', 'first_name','status','avatar', 'password'];
    

    public function user(){
        return $this->hasMany('App\Models\Post');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }
}
