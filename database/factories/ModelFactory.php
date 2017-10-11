<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'userName' => $faker->word,
        'dob' => Carbon\Carbon::parse('2016-01-23'),
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Articles::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
        'live' => $faker->boolean(),
        'post_on' => Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2016-01-23 11:53:20'),
    ];
});
$factory->define(App\Items::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'item_name' => $faker->name,
        'item_amount' => $faker->numberBetween(0,10),
        'item_short_code' => $faker->unique()->numberBetween(0,10),
    ];
});
$factory->define(App\Sales::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
        'user_id' => App\User::all()->random()->id,
        'item_id' => App\Items::all()->random()->id,
        'customer_id' => $faker->unique()->numberBetween(199,2000),
       // 'sale_date' => Carbon\Carbon::parse('1 week'),
    ];
});

