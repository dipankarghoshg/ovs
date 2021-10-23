<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_model', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Name');
            $table->string('Email')->unque();
            $table->string('CollegeId')->unique();
            $table->string('Stream');
            $table->string('Password');
            $table->string('RetypePassword');
            $table->string('Image')->nullable();
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
        Schema::dropIfExists('User_model');
    }
}
