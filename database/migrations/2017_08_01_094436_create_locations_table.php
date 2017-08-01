<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');

            $table->tinyInteger('phonenumber')->unique();
            $table->tinyInteger('mobile')->unique();
            $table->string('email',100)->unique();
            // $table->boolean('is_filled_up')->default(flase);
            $table->tinyInteger('avaliable_places')->unsigned();



            $table->json('open_array');
            $table->string('closed_on');
            $table->time('open_from');
            $table->time('open_till');

            $table->binary('logo');
            $table->string('slogan');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
