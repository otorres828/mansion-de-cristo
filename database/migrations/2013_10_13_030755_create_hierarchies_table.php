<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHierarchiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hierarchies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nivel');
            $table->unsignedBigInteger('temple_id');
            $table->foreign('temple_id')->references('id')->on('temples')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hierarchies');
    }
}
