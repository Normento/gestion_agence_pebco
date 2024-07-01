<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraisClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code_agence');
            $table->string('frais_dossier_credits');
            $table->string('commissions_tontine');
            $table->string('frais_tenu_compte');
            $table->string('penalite_pret');
            $table->string('autres_commission_recu');
            $table->string('autre_produits_exploitation');
            $table->string('marge_brute_cout_risque');
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
        Schema::dropIfExists('frais_clients');
    }
}
