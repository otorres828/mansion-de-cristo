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
        Schema::create('crecimientos', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->default(auth()->user()->id);
            $table->string('name');
            $table->enum('status', ['inactivo', 'activo'])->default('inactivo');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }


    public function down()
    {
        Schema::dropIfExists('crecimientos');
    }
};
