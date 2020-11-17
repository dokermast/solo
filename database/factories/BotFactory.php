<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bot;
use Faker\Generator as Faker;

$factory->define(Bot::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'user_id' => rand(1,2),
        'description' => $this->faker->text(30)
    ];
});
