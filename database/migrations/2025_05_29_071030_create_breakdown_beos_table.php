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
        Schema::create('breakdown_beos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('product');
            $table->integer('price');
            $table->integer('unit');
            $table->integer('night');
            $table->bigInteger('total_price');
            $table->integer('gb_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakdown_beos');
    }
};
