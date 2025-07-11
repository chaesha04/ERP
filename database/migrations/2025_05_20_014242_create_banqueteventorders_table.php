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
        Schema::create('banqueteventorders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('note_housekeeping');
            $table->string('note_engineer');
            $table->string('note_accounting');
            $table->string('note_kitchen');
            $table->string('note_sport');
            $table->string('note_fnb');
            $table->string('note_lalassa');
            $table->string('gb_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banqueteventorders');
    }

};
