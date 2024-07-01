<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteretRealisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interet_realisers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code_agence');
            $table->foreignId('interet_id');
            $table->string('interet_recu_operation_client_realiser');
            $table->string('interet_recus_operation_tiers_realiser');
            $table->string('interet_verse_operation_client_realiser');
            $table->string('interet_verse_operation_tiers_realiser');
            $table->string('cout_risque_net_realiser');
            $table->string('marge_interet_cout_risque_realiser');
            $table->string('mois');
            $table->string('annee');
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
        Schema::dropIfExists('interet_realisers');
    }
}
