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
            $table->string('product_id');

            $table->string('name_new')->nullable();
            $table->string('description_new')->nullable();
            $table->text('body_new')->nullable();
            $table->decimal('price_new', 10, 2)->nullable();
            $table->string('slug_new')->nullable();

            $table->string('name_old')->nullable();
            $table->string('description_old')->nullable();
            $table->text('body_old')->nullable();
            $table->decimal('price_old', 10, 2)->nullable();
            $table->string('slug_old')->nullable();

            $table->string('action');
            $table->string('user_name');
            $table->string('user_id');

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
        Schema::dropIfExists('product_log');
    }
}
