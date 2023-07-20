<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->integer('tournamentId')->nullable();
            $table->string('typeMatch');
            $table->integer('matchId');
            $table->string('rowNo')->nullable();
            $table->string('week')->nullable();
            $table->string('typeName')->nullable();
            $table->string('matchDate')->nullable();
            $table->string('matchTime')->nullable();
            $table->string('matchResult')->nullable();
            $table->string('recPercent')->nullable();
            $table->string('betRate')->nullable();
            $table->string('homeTeam')->nullable();
            $table->string('visitTeam')->nullable();
            $table->string('homeTeamNo')->nullable(); 
            $table->string('visitTeamNo')->nullable();
            $table->string('homeLogo')->nullable();
            $table->string('visitLogo')->nullable();
            $table->string('result1')->nullable();
            $table->string('result2')->nullable();
            $table->tinyInteger('isOk')->default(0);
            $table->string('matchLong')->nullable();
            $table->string('isCode')->nullable();
            $table->string('matchDesc')->nullable();
            $table->string('fixedNam')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unique(['matchId', 'typeMatch']);
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
