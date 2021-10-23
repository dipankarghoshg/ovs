<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCredentialsToCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('com_models', function (Blueprint $table) {
            $table->string('Name');
            $table->string('Email')->unque();
            $table->string('CollegeName');
            $table->date('date');
            
            $table->string('Password');
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
        Schema::table('com_models', function (Blueprint $table) {
            //
        });
    }
}
