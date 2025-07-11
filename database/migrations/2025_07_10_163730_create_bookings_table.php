<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->nullable();
            $table->integer('rooms_id')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('adults')->default(1);
            $table->string('child')->default(0);

            $table->float('total_night')->default(0); // masih float karena ini bisa pecahan
            $table->bigInteger('actual_price')->default(0);
            $table->bigInteger('subtotal')->default(0);
            $table->integer('discount')->default(0);
            $table->bigInteger('total_amount')->default(0);

            $table->string('payment_method')->default(0);
            $table->string('transaction_id')->default(0);
            $table->string('payment_status')->default(0);

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('additional_request')->nullable();
            
            $table->string('code')->nullable();
            $table->string('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
