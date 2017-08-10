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
            $table->boolean('is_used');
            $table->string('name');
            $table->string('address');

            $table->Integer('phonenumber');
            $table->Integer('mobile');
            $table->string('email',100);
            // $table->boolean('is_filled_up')->default(flase);
            $table->Integer('used_places')->unsigned();
            $table->Integer('avaliable_places')->unsigned();

            $table->string('closed_on');
            $table->time('open_from');
            $table->time('open_till');

            $table->binary('logo');
            $table->string('slogan');
            $table->string('url');
            // TODO: Add link to googlempas field to framework
            $table->string('googlemaps_frame');


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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('locations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
