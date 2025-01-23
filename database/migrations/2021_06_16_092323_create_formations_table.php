<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('cod_demande')->unique();
            $table->string('code_employeur', 10);
            $table->string('nbr_travailleurs'); // saisi par le chargé_dos selon les doc
            $table->date('date_exercice');//date de la demande pour le benifice de la formation
            $table->date('date_demande');//date de la demande
            $table->string('intervenant'); //chargé_dos champ recupéré automatiquement selon le login a l'espace admin
            $table->boolean('reception_dos')->nullable();
            $table->date('date_reception_dos')->nullable();
            $table->string('ref_reception')->nullable(); //numero sequentiel ref libelleagence/numerosequentiel/année
            $table->string('nature_depot_dos')->nullable(); //physique_mixte_manuel
            $table->string('numero_enrg_registre')->nullable(); //saisi par le chargé_dos
            $table->date('date_enrg_registre')->nullable(); //saisi par le chargé_dos
            $table->boolean('traitement_dos')->nullable();
            $table->date('date_traitement_dos')->nullable(); // date_enrg_registre + 1
            $table->boolean('decision_dos')->nullable();
            $table->integer('cod_rejet')->nullable();
            $table->date('date_decision')->nullable();
            $table->string('description_rejet')->nullable(); //si cod_rejet=autre
            $table->boolean('recours')->nullable();
            $table->date('date_recours')->nullable(); //
            $table->boolean('Expired')->nullable()->default(0);
            $table->timestamp('Expired_at')->nullable();
            $table->boolean('annuler')->nullable();
            $table->date('annuler_at')->nullable(); 
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
        Schema::dropIfExists('formations');
    }
}
