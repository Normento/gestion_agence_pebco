<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code_agence');
            $table->string('interet_recu_operation_client');
            $table->string('interet_recus_operation_tiers');
            $table->string('interet_verse_operation_client');
            $table->string('interet_verse_operation_tiers');
            $table->string('cout_risque_net');
            $table->string('marge_interet_cout_risque');
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
        Schema::dropIfExists('interets');
    }
}
