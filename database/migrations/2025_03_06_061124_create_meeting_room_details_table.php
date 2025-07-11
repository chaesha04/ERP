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
        Schema::create('meeting_room_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meetinroom_name')->constrained(
                table:'product_meeting_rooms');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('meetingroom_type'); #nanti bikin relasi
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
        Schema::dropIfExists('meeting_room_details');
    }
};
