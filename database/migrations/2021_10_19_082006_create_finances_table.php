<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('reference')->nullable();
            $table->string('method_pay');
            $table->string('type_finance');
            $table->date('date');
            $table->enum('status',[1,2])->default(1);  //1: borrador 2:publicado
            $table->unsignedBigInteger('temple_id');

            $table->unsignedBigInteger('financeable_id');
            $table->string('financeable_type');
           
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
        Schema::dropIfExists('finances');
    }
}
