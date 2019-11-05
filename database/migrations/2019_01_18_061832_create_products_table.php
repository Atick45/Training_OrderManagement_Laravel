<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->text('description');
            $table->string('picture', 300);
            $table->integer('uom_id')->reference('id')->on('ord_uoms');
            $table->integer('producttype_id')->reference('id')->on('ord_producttypes');
            $table->integer('user_id');
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
        Schema::dropIfExists('ord_products');
    }
}
