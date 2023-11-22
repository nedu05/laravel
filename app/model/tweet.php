<?php

namespace App\model;

use App\Likeable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    use Likeable;


    protected $table='tweety_tweets';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
