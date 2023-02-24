<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('celulas_evangelisticas', function (Blueprint $table) {
            $table->id();
            $table->string('anfitrion');
            $table->text('ubicacion');
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

  
    public function down()
    {
        Schema::dropIfExists('celulas_evangelisticas');
    }
};
