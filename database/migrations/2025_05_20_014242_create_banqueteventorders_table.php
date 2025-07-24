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
            $table->string('note_housekeeping')->nullable();
            $table->string('note_engineer')->nullable();
            $table->string('note_accounting')->nullable();
            $table->string('note_kitchen')->nullable();
            $table->string('note_sport')->nullable();
            $table->string('note_fnb')->nullable();
            $table->string('note_lalassa')->nullable();
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
