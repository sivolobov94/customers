<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buyer_id');
            $table->string('sale_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_quantity');
            $table->string('sale');
            $table->string('sum');
            $table->string('cashback');
            $table->integer('status')->default(1); // 1 = disagree, 2 = waiting, 3 = agree.
            $table->string('referal_reward');
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
        Schema::dropIfExists('orders');
    }
}
