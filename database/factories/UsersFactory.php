<?php

use Faker\Generator as Faker;

$factory->define(App\Userlistings::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name(5),
        'surname' => $faker->name(5),
        'email' => $faker->email(20),
        'position' => $faker->text(10)
    ];
});
