<?php

use App\Models\VisitaPendiente;
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
        Schema::create('visita_pendientes', function (Blueprint $table) {
            $table->id();
            $table->text('observaciones')->nullable();
            $table->dateTime('fecha');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('celula_id');
            $table->enum('estatus',[VisitaPendiente::NOVISITADO,VisitaPendiente::VISITADO])->default(VisitaPendiente::NOVISITADO);

            $table->foreign('celula_id')->references('id')->on('celulas_evangelisticas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita_pendientes');
    }
};
