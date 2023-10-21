<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

$factory->define(App\Models\Staginfo::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'university' => $faker->sentence(2),
        'major' => $faker->jobTitle,
        'picture_path' => null,
        'report_path' => null,
    ];
});
