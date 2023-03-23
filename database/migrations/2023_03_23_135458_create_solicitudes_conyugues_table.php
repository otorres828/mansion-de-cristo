<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('solicitudes_conyugues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manda');
            $table->unsignedBigInteger('recibe');

            $table->foreign('manda')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recibe')->references('id')->on('users')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes_conyugues');
    }
};
