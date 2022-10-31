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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->integer('user_id')->default(0);
            $table->string('phone');
            $table->string('name');
            $table->string('email');
            $table->integer('major_id');
            $table->string('sex');
            $table->integer('campus_id');
            $table->integer('shift_id');
            $table->date('dob');
            $table->string('pob');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
