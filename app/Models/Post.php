<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PostController;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['body', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function likes(){ 
        return $this->hasMany(Like::class); 
    }

}
