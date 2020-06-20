<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Answer;

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'gender'        => $faker->randomNumber(1),
        'age_id'        => $faker->randomNumber(1),
        'email'         => $faker->email,
        'is_send_email' => $faker->randomNumber(1),
        'feedback_text' => $faker->realText($maxNbChars = 50, $indexSize = 1)
    ];
});
