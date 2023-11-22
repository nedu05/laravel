<?php

namespace App;

use App\model\tweet;
use App\Followable;
use App\model\like;
use App\Likeable;
use App\model\Chat;
use App\model\request;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable,Followable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // getAvatarAttribute

    public function getAvatarAttribute($value)
    {
        return asset($value   ?  "storage/$value" : "images/db.png") ;

    }



    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }


    public function timeline()
    {
        $friends=$this->follows()->pluck('id');


        return tweet::whereIn('user_id',$friends)
                    ->orWhere('user_id',$this->id)
                    ->withLikes()
                    ->latest()
                    ->paginate(50);


    }

    public function tweets()
    {
        return $this->hasMany(tweet::class)->latest();
    }



    public function path($append='')
    {
        $path = route('profile',$this->username);
        return $append ? " {$path}/{$append} ":$path;
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function likes()
    {

        return $this->hasMany(like::class);
    }

    public function messages()
    {
          return DB::table('tweety_chats')
        ->where('person_id_1',auth()->user()->id)
        ->where('person_id_2',$this->id)
        ->get();

    }


}
