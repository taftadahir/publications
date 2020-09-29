<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdDirecteurLaboToLaboratoire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laboratoires', function (Blueprint $table) {
            $table->unsignedBigInteger('directeur_labo');
            $table->foreign('directeur_labo')->references('id')->on('auteurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laboratoires', function (Blueprint $table) {
            $table->dropForeign(['directeur_labo']);
            $table->dropColumn(['directeur_labo']);
        });
    }
}
