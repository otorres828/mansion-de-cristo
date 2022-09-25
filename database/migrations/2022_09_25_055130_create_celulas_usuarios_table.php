<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('celulas_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('celula_id')->nullable();        
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->enum('rol',['C','A','I'])->default('I');  //C: colider A:anfitrion I:integrante     
        
            $table->foreign('celula_id')->references('id')->on('celulas')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

        });
    }

    public function down()
    {
        Schema::dropIfExists('celulas_usuarios');
    }
};
