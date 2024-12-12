<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code_employeur',10);
            $table->string('objet');
            $table->text('sujet');
            $table->integer('status')->default(0);
            $table->integer('categorie_id')->default(1);
            $table->integer('type_id')->default(1);
            $table->boolean('owner')->default(true);
            $table->integer('administrateur_id')->nullable();
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
