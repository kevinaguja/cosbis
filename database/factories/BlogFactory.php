<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'author_id'=>$faker->randomElement(App\User::pluck('id')->toArray()),
        'title'=>$faker->sentence,
        'blog'=>$faker->paragraph,
        'img'=>'default.png',
    ];
});
