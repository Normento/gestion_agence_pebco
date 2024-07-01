<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code_agence');
            $table->string('carburants');
            $table->string('eau_electricite');
            $table->string('depenses_informatiques');
            $table->string('imprime_fourniture_prod_entretient');
            $table->string('compte61');
            $table->string('frais_personnel');
            $table->string('frais_formation');
            $table->string('prestation_service_exploitation_commerciale');
            $table->string('assurances_personnel');
            $table->string('locations_immeubles');
            $table->string('assurances_biens');
            $table->string('frais_maintenance_materiels_immeubles');
            $table->string('missions_reception');
            $table->string('telecom');
            $table->string('publicite_promotions');
            $table->string('charges_reunions');
            $table->string('prestataires_exterieurs');
            $table->string('autres_charges_externes');
            $table->string('fond_garantie_uemoa');
            $table->string('taxes_impot');
            $table->string('frais_personnel_cdi');
            $table->string('excedent_brute_avant_amortissement');
            $table->string('dotation_amortissements');
            $table->string('resultat_courant_avant_impot_taxe');
            $table->string('autre_charge_excep');
            $table->string('autre_produits_excep');
            $table->string('impot_sur_benefice');
            $table->string('resultat_net');
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
        Schema::dropIfExists('depenses');
    }
}
