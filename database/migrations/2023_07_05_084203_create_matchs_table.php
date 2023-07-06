<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->string('match_id')->unique();
            $table->dateTime('match_date')->nullable();
            $table->string('row_no');
            $table->integer('tournament_id')->nullable();
            $table->string('team_home');
            $table->string('team_visit');
            $table->tinyInteger('is_ok')->default(0);
            $table->string('result1');
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
        Schema::dropIfExists('matchs');
    }
}
