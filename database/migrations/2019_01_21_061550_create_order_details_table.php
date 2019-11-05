<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->references('id')->on('ord_orders')->onDelete('cascade');
            $table->integer('product_id')->references('id')->on('ord_products');
            $table->integer('uom_id')->references('id')->on('ord_uoms');
            $table->double('qty', 8, 2);
            $table->double('price', 8, 2);
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
        Schema::dropIfExists('ord_order_details');
    }
}
