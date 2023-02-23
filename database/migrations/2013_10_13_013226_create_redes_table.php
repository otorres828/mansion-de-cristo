<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedesTable extends Migration
{

    public function up()
    {
        Schema::create('redes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('temple_id');

            $table->foreign('temple_id')->references('id')->on('temples')->onDelete('SET NULL');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redes');
    }
}
