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
        Schema::create('scores', function (Blueprint $table) {

            $table->id();
            $table->integer('student_id');
            $table->string('score_tag');
            $table->double('class_participation');
            $table->double('hw');
            $table->double('midterm');
            $table->double('slidehandbook');
            $table->double('major_assignment');
            $table->double('presentation');
            $table->double('final');
            $table->double('total')->default(0.0);

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
        Schema::dropIfExists('scores');
    }
};
