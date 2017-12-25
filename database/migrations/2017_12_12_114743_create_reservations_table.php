<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->time('date')->nullable;
            $table->integer('location_id')->nullable()->unsigned();
            $table->integer('max_places')->default(5);
            $table->integer('used_places')->defaul(0);
            $table->boolean('was_canceld')->default(false);
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
        Schema::dropIfExists('reservations');
         DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
