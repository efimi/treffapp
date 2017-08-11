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
            $table->boolean('is_used')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();

            $table->string('phonenumber')->nullable();
            $table->Integer('mobile')->nullable();
            $table->string('email',100)->nullable();
            // $table->boolean('is_filled_up')->default(flase)->nullable();
            $table->Integer('used_places')->unsigned()->nullable();
            $table->Integer('max_places')->unsigned()->nullable();

            $table->integer('closed_on')->nullable();
            $table->time('open_from')->nullable();
            $table->time('open_till')->nullable();

            $table->binary('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->string('url')->nullable();
            // TODO: Add link to googlempas field to framework
            $table->text('googlemaps_frame')->nullable();
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);


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
