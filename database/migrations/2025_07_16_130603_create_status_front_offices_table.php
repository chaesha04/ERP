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
        Schema::create('status_front_offices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('booking_id')->constrained('bookings');
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_front_offices');
    }
};
