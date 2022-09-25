<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('crecimiento_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crecimiento_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('realizado')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('crecimiento_id')->references('id')->on('crecimientos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crecimiento_usuarios');
    }
};
