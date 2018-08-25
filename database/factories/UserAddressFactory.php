<?php

use Faker\Generator as Faker;

$factory->define(App\UserAddress::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'company' => $faker->company,
        'city' => $faker->city,
        'address' => $faker->address
    ];
});
