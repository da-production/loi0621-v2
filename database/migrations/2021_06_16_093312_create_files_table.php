<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug');
            $table->string('url'); // the path: folder name with code employeur exemple(subvention/13654789542/*.pdf)
            $table->string('file_type'); // from employeur: formation => fe-x || subvention => se-x | to employeur: formation => ft-x || subvention => st-x
            $table->string('code_file', 10);
            $table->boolean('etat')->nullable(); // to review
            $table->string('code_employeur', 10);
            $table->string('code_demande');
            // $table->foreign('code_employeur')->references('code_employeur')->on('users');
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
        Schema::dropIfExists('files');
    }
}
