<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Answer;
use Carbon\Carbon;
use Faker\Provider\DateTime; // 追加

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'gender'        => $faker->randomElement(['1', '2']) . "\n",
        'age_id'        => $faker->randomElement(['1', '2','3','4','5','6']) . "\n",
        'email'         => $faker->email,
        'is_send_email' => $faker->randomElement(['1', '0']) . "\n",
        'feedback_text' => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'created_at'    => DateTime::dateTimeThisDecade(),
        'updated_at'    => Carbon::now()
    ];
});
