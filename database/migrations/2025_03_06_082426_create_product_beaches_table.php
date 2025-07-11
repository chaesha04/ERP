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
            Schema::create('product_beaches', function (Blueprint $table) {
                $table->id();
                $table->string('beach_name');
                $table->string('location');
                $table->string('hotline');
                $table->string('web_avail');
                $table->string('price');
                $table->string('note');
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
            Schema::dropIfExists('product_beaches');
        }
    };
