<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {

        Schema::create('crecimiento_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crecimiento_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('crecimiento_id')->references('id')->on('crecimientos')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('crecimiento_user');
    }
};
