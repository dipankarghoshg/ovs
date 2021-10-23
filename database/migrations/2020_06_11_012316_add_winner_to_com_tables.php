<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWinnerToComTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('com_models', function (Blueprint $table) {
             $table->string('WinnerCS')->nullable();
             $table->string('WinnerACS')->nullable();
             $table->string('WinnerAGS')->nullable();
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
