<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargadosTable extends Migration
{

    public function up()
    {
        Schema::create('encargados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('red_id');
            $table->unsignedBigInteger('temple_id');
            
            $table->foreign('temple_id')->references('id')->on('temples')->onDelete('CASCADE');
            $table->foreign('red_id')->references('id')->on('redes')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('encargados');
    }
}
