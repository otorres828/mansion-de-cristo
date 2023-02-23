<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status',[1,2])->default(2);  //1: NO PUEDE ACCEDER 2:PUEDE ACCEDER
            $table->unsignedBigInteger('temple_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('hierarchy_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->rememberToken();

            $table->foreign('temple_id')->references('id')->on('temples')->onDelete('CASCADE');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('CASCADE');
            $table->foreign('hierarchy_id')->references('id')->on('jerarquias')->onDelete('CASCADE');
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
