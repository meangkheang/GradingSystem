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
        Schema::create('score_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->string('class_tag');
            $table->integer('score_id');
            $table->integer('shift_id');
            $table->string('grade')->default('null');
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
        Schema::dropIfExists('score_subjects');
    }
};
