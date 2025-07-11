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
        Schema::create('visitor_details', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('group_name');
            $table->string('company_number');
            $table->string('phone_number');
            $table->string('country');
            $table->string('email');
            $table->string('group_address');
            $table->string('sex');
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
        Schema::dropIfExists('visitor_details');
    }
};
