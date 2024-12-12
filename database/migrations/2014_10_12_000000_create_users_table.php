<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cod_wilaya');
            $table->foreign('cod_wilaya')->references('cod_wilaya')->on('wilayas');

            $table->string('nom');
            $table->string('prenom');
            $table->string('code_employeur',10)->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default(3);
            $table->rememberToken();
            $table->boolean('Expired')->nullable();
            $table->timestamp('Expired_at')->nullable();
            $table->boolean('guide')->default(0);
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
        Schema::dropIfExists('users');
    }
}
