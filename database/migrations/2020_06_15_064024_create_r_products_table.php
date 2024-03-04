<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('item_id');
            $table->string('name');
            $table->integer('price');
            $table->float('t_price');
            $table->string('price_unit'); 
            $table->integer('weight');
            $table->varchar('t_weight');
            $table->longText('desc');
            $table->string('pic');
            $table->string('featured')->nullable();
            $table->string('sales')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

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
        Schema::dropIfExists('r_products');
    }
}
