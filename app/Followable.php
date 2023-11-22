<?php

namespace App;

use App\model\tweet;
use App\User;

trait Followable
{

    public function follow(User $user)
    {

        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {

        $this->follows()->toggle($user);
    }

    public function following(User $user)
    {


        return $this->follows()
   ->where('following_user_id',$user->id)->exists();


//    if($this->follows()
//    ->where('following_user_id',$user->id)->where('request',1)){
//     return "following";
//    }
//    else if($this->follows()
//    ->where('following_user_id',$user->id)->where('request',0)){
//     return "request";
//    }
//    else{
//     return "foolow";
//    }
    }


    public function followers()
    {
        return $this->belongsToMany(User::class,'tweety_follows','user_id','following_user_id')->where('request',1);
    }

    public function request()
    {
        return $this->belongsToMany(User::class,'tweety_follows','following_user_id')->where('request',0);

    }



    public function follows()
    {
        return $this->belongsToMany(User::class,'tweety_follows','user_id','following_user_id');


    }







}


