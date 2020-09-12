<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_log', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('store_id');

            $table->string('name_new');
            $table->string('description_new');
            $table->text('body_new');
            $table->decimal('price_new', 10, 2);
            $table->string('slug_new');

            $table->string('name_old');
            $table->string('description_old');
            $table->text('body_old');
            $table->decimal('price_old', 10, 2);
            $table->string('slug_old');

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
        Schema::dropIfExists('ProductLog');
    }
}
