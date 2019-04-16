<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'explanation'=> $faker->sentence,
        'name'=>$faker->title,
        'picture_path'=>'default.png',

    ];
});
