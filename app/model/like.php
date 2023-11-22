<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table='tweety_likes';
    protected $fillable=['user_id','tweet_id','liked','updated_at','created_at'];
}
