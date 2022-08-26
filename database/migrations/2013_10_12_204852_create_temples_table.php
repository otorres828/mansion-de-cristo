<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplesTable extends Migration
{

    public function up()
    {
        Schema::create('temples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('temples');
    }
}
