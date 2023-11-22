<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\model\tweet;
use Faker\Generator as Faker;

$factory->define(tweet::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'body'=>$faker->sentence
    ];
});
