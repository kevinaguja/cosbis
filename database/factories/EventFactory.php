<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    $data = rand(strtotime(now()->addWeeks(2)), strtotime(now()->subWeeks(2)));

    return [
        'user_id'=> $faker->randomElement(App\User::pluck('id')->toArray()),
        'title'=>$faker->sentence,
        'description'=>$faker->paragraph,
        'time'=>$faker->time('H:i:s'),
        'date'=> date('Y-m-d H:i:s', $data),
        'location'=>$faker->country,
        'status'=>$faker->randomElement(['new', 'approved','rejected']),
        'type'=>$faker->word,
        'theme'=>$faker->word,
        'img'=>'/img/events/default.jpg',
        //'is_announcement'=> $faker->boolean(0),
    ];
});
