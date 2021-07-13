<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class like extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['post_id', 'user_id', 'id'];

    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function post(){
        return $this->belongsTo('App\Model\Post');
    }
}
