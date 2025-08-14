<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->enum('role', ['Super Admin', 'Sales Admin', 'Inventory Admin', 'Front Office']);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('users');
    }
};
