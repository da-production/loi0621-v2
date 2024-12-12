<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDisabledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_disableds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrateur_id')->constrained('administrateurs')->nullable();
            $table->string('code_employeur',10)->nullable();
            $table->foreign('code_employeur')->references('code_employeur')->on('users');
            $table->text('motif');
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
        Schema::dropIfExists('user_disableds');
    }
}
