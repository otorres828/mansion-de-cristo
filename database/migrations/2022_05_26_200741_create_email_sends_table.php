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
        Schema::create('email_sends', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status',[1,2])->default(1);  //1: borrador 2:publicado
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_sends');
    }
};
