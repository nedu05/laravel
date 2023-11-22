<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chat extends Model
{

    protected $table="tweety_chats";
    protected $guarded=[];


    // public function users()
    // {
    //         return $this->BelongsToMany(User::class);
    // }

    public function messages()
    {
          return $this->hasMany(User::class);

    }
}
