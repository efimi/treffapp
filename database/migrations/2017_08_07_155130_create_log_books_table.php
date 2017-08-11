<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('locaitons_id')->unsigned();
            $table->string('LocationName');
            $table->time('date');
            // TODO: date type exists?
            // TODO: how often overall used?
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
      Schema::dropIfExists('log_books');
      DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
