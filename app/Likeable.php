<?php



namespace App;

use App\User;
use App\model\like;
use Illuminate\Database\Eloquent\Builder;

trait Likeable{




    public function scopeWithLikes(Builder $query)
    {
            $query->leftJoinSub(
                'select tweet_id ,sum(liked) likes,sum(!liked) dislikes from tweety_likes group by tweet_id',
                'tweety_likes',
                'tweety_likes.tweet_id',
                'tweety_tweets.id'
            );
    }



    public function likes()
    {

        return $this->hasMany(like::class);
    }

    public function like($user = null , $liked = true){

        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),

        ],[
            'liked' =>$liked,
        ]);
    }


    public function dislike($user = null)
    {

        return $this->like($user,false);
    }


    public function isLikedBy(User $user)
    {
      return      (bool) $user->likes
                        ->where('tweet_id',$this->id)
                        ->where('liked',true)
                        ->count();
        }


    public function isDisLikedBy(User $user)

    {


      return   (bool) $user->likes
                       ->where('tweet_id',$this->id)
                       ->where('liked',false)
                       ->count();
    }





}
