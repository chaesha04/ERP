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
        Schema::create('groupbooking_orders', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->date('check_in');
            $table->date('check_out');
            $table->string('event_type');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('product_accomodations')->onDelete('cascade');   
            $table->integer('qty_room'); 
            $table->integer('extrabed'); 
            $table->integer('adult'); 
            $table->integer('child'); 
            $table->integer('baby'); 
            $table->integer('night'); 
            $table->string('rate_desc'); 
            $table->string('package'); 
            $table->integer('single_room'); 
            $table->integer('twin_room'); 
            $table->integer('triple_room'); 
            $table->integer('child_room'); 
            $table->integer('singleroom_price'); 
            $table->integer('twinroom_price'); 
            $table->integer('tripleroom_price'); 
            $table->integer('childroom_price'); 
            $table->integer('grand_total'); 
            $table->integer('deposit'); 
            $table->string('sales_id'); //FK 
            $table->string('group_id'); //FK
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
        Schema::dropIfExists('groupbooking_orders');
    }


};
