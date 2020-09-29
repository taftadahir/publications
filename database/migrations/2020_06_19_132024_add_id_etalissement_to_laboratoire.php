<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEtalissementToLaboratoire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laboratoires', function (Blueprint $table) {
            $table->foreignId('etablissement_id')->constrained()->after('id');
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
            $table->dropForeign(['etablissement_id']);
            $table->dropColumn(['etablissement_id']);
        });
    }
}
