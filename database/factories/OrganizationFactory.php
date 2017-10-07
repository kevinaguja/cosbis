<?php

use Faker\Generator as Faker;

$factory->define(App\Organization::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'description'=>$faker->sentence,
        'img'=>'/img/organizations/default.jpg'
    ];
});

