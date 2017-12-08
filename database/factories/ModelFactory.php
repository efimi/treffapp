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
        'name' => $faker->unique()->name,
        'facebook_id' => $faker->numberBetween($min = 1000000000000000, $max = 1999999999999999),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\History::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'location_id' => $faker->numberBetween($min = 1, $max = 10),
        'date' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now', $timezone = null),
    ];
});

$factory->define(App\Location::class, function () {
    $faker = Faker\Factory::create('de_DE'); // create a german faker
    $resOrCaf = ['Restaurant ','Café ' , 'Bar ', 'La petite ' , 'Glück im ', 'Zum '];

    $addRand = ['Kamp ','Rathausplatz ', 'Königstrasse ', 'Marienplatz ', 'Am Bogen ', 'Westernstrasse ', 'Grube ', 'Heierstrasse ' , 'Bachstrsse '];
    $closed_on = rand(0,6);

    return [
        'name' => $faker->randomElement($resOrCaf) . $faker->unique()->Lastname,
        'address' => $faker->randomElement($addRand) . $faker->unique()->numberBetween($min = 1, $max = 70),
        'is_used' => 0,
        'max_places' => 5,
        'url' => $faker->url,
        'slogan' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'email' => $faker->unique()->email,
        'phonenumber' => '05251 ' . $faker->unique()->numberBetween($min = 1050600, $max = 999999) ,
        'closed_on' => $closed_on,
        'open_from' => '17:00',
        'open_till' => '23:00',
        'token' => str_random(20),

    ];
});
