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
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Location::class, function () {
    $faker = Faker\Factory::create('de_DE'); // create a german faker
    $resOrCaf = ['Restaurant ','Café ' , 'Bar ', 'La petite ' , 'Glück im ', 'Zum '];

    $addRand = ['Kamp ','Rathausplatz ', 'Königstrasse ', 'Marienplatz ', 'Am Bogen ', 'Westernwall ', 'Grube ', 'Heierstrasse ' , 'Bachstrsse '];
    $closed_on = rand(0,6);

    return [
        'name' => $faker->randomElement($resOrCaf) . $faker->unique()->Lastname,
        'address' => $faker->randomElement($addRand) . $faker->unique()->numberBetween($min = 1, $max = 70),
        'is_used' => 0,
        'used_places' => 0,
        'max_places' => 5,
        'url' => $faker->url,
        'slogan' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'email' => $faker->unique()->email,
        'phonenumber' => '05251 ' . $faker->unique()->numberBetween($min = 1050600, $max = 999999) ,
        'closed_on' => $closed_on,
        'open_from' => '17:00',
        'open_till' => '23:00',
        'long' => $faker->latitude($min = -90, $max = 90),
        'lat' => $faker->longitude($min = -180, $max = 180),
        'googlemaps_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9887.16228387257!2d8.749571683020005!3d51.71857395970138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ba4c95fe3c2f3f%3A0xdb18e1de2f3cff41!2sKamp+23%2C+33098+Paderborn%2C+Deutschland!5e0!3m2!1sde!2sus!4v1502447676968" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'


    ];
});
