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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groupbooking_id');
            $table->string('document_type'); // e.g. offering_letter, confirmation_letter, etc
            $table->string('file_path'); // simpan nama file / path-nya
            $table->timestamps();

            $table->foreign('groupbooking_id')->references('id')->on('groupbooking_orders')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document');
    }
};
