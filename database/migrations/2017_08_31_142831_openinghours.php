<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Openinghours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openinghours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('locations_id')->unsigned();
            // TODO: foreingkey to locations
            
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
        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('openinghours');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
