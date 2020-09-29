<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteurEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteur_equipe', function (Blueprint $table) {
            $table->foreignId('auteur_id')->constrained();
            $table->foreignId('equipe_id')->constrained();
            $table->primary(['auteur_id','equipe_id'], $name ='id');
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
        Schema::dropIfExists('auteur_equipe');
    }
}
