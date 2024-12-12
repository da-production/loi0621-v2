<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('employeurs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('numero', 10)->unique();
            $table->string('cod_stat');
            $table->string('cod_branche');
            $table->date('date_debut_activite');
            $table->date('date_creation_entreprise')->nullable();
            $table->date('date_affiliation_cnas')->nullable();
            $table->string('cod_wilaya');
            $table->string('cod_poste')->nullable();
            $table->string('cod_commune')->nullable();
            $table->string('adresse');
            $table->string('adresseAr')->nullable();

            $table->string('raison_social');
            $table->string('raison_social_Ar');
            $table->string('sigle');
            $table->string('code_employeur', 10);
            $table->string('representant');
            $table->string('representantAr');
            $table->string('qualite');
            $table->string('qualiteAr')->nullable();

            $table->string('tel')->nullable();
            $table->string('mob')->nullable();
            $table->string('email_entreprise');
            $table->string('RIB', 20);
            $table->string('NIF', 15);
            $table->string('NIS', 15);
            $table->string('RC', 25);
            $table->string('nbr_travailleurs'); // a supprimer
            $table->boolean('Expired')->nullable()->default(0);
            $table->timestamp('Expired_at')->nullable();
            $table->boolean('condition_accepte');
            $table->boolean('allowed')->default(false);
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
        Schema::dropIfExists('employeurs');
    }
}
