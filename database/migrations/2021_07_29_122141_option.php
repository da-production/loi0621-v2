<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Option extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('the name of the option'); 
            $table->text('value')->comment('the value of the option');
            $table->string('instance')->comment('on which instance will it be applied');
            $table->string('widget')->comment('widget to display')->default('text');
            $table->string('widget_default_values')->nullable()->comment('widget values or choices');
            $table->string('type')->comment('[input,select,radio,checkbox,textarea] type')->default('input');
            $table->boolean('autoload')->default(true);
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
        //
    }
}
