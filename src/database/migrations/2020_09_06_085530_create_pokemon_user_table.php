<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->integer('pokemon_id')->unsigned();

        });
        
        Schema::table('pokemon_user', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pokemon_id')->references('id')->on('pokemons')->onDelete('cascade');
        });

        // Schema::table('goal_objective', function (Blueprint $table) { 
        //     $table->bigInteger('job_title_id')->after('target')->unsigned()->nullable(); 
        //     $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('set null'); 
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_user');
    }
}
