<?php 
$factory->define(App\Product::class, function (Faker\Generator $faker) {
 
    return [
        'name' => $faker->word,
        'detail' => $faker->sentence,
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
 
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});