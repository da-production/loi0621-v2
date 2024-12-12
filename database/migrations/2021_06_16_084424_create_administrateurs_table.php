<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->id();
            $table->string('cod_wilaya');
            $table->foreign('cod_wilaya')->references('cod_wilaya')->on('wilayas');

            $table->string('nom');
            $table->string('prenom');
            $table->string('username');
            $table->string('fonction');
            $table->boolean('status')->default(1);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default(1);
            $table->rememberToken();
            $table->boolean('expire')->default(0);
            $table->timestamp('expire_at')->nullable();

            $table->boolean('double_auth')->default(0);
            $table->boolean('guide')->nullable()->default(0);
            
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
        Schema::dropIfExists('administrateurs');
    }
}
