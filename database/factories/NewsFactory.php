<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'author_id'=>$faker->randomElement(App\User::pluck('id')->toArray()),
        'title'=>$faker->sentence,
        'news'=>$faker->paragraph,
        'img'=>'default.png',
    ];
});
