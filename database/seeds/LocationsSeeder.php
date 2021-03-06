<?php

use Illuminate\Database\Seeder;

use App\Location;
class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Location::class, 20)
        ->create();
        factory(App\User::class, 40)->create();
        factory(App\History::class, 450)->create();

    }
}
