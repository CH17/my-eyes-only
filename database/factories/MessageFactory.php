<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Crypt;

$factory->define(Message::class, function (Faker $faker) {

    return [
        'slug' => Str::random(10),
        'text' => Crypt::encryptString($faker->text()),
        'is_onetime' => $faker->boolean(),
        'expired_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '3 Days', $timezone = null)
    ];
    
});
