<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' =>$faker->word,
        'slogan' => $faker->word,
        'description' =>$faker->word,
        'banner' => 'img/cosbis/header.png',
        'logo'=> 'img/election/party/default.png',
    ];
});
