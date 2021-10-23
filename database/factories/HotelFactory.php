<?php

use Faker\Generator as Faker;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\City;
use App\Models\State;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rating' => '5',
        'category' => 1,
        'zip_code' => 12345,
        'address' => 'Boulevard Díaz Ordaz No. 9 Cantarranas',
        'reputation' => 1,
        'price' => 10,
        'availability' => 1,
        'country_id' => function () {
            return factory(Country::class)->create()->id;
        },
        'city_id' => function () {
            return factory(City::class)->create()->id;
        },
        'state_id' => function () {
            return factory(State::class)->create()->id;
        }

    ];
});
