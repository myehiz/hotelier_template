<?php

use Faker\Generator as Faker;
use App\Models\State;

$factory->define(State::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
