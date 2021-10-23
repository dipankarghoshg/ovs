<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_models', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('CollegeId')->unique();
            $table->string('Stream');
            $table->string('Semno');
            $table->string('Remarks')->nullable();
            $table->string('Image');
            $table->integer('Status')->default('0');
           
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
        Schema::dropIfExists('candidate_models');
    }
}
