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
            $table->boolean('is_used')->default(0);
            $table->string('name')->nullable();
            $table->string('address')->nullable();

            $table->string('phonenumber')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email',100)->nullable();
            $table->string('password')->nullable();
            $table->Integer('used_places')->unsigned()->nullable();
            $table->Integer('max_places')->unsigned()->default(4);

            $table->integer('closed_on')->nullable();
            $table->time('open_from')->nullable();
            $table->time('open_till')->nullable();

            $table->string('logo_path')->nullable();
            $table->string('slogan')->nullable();
            $table->string('url')->nullable();
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
