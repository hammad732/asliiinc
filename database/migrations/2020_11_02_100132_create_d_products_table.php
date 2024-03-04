<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('item_id');
            $table->string('name');
            $table->integer('price');
            $table->integer('weight');
            $table->longText('desc');
            $table->string('pic');
            $table->string('featured')->nullable();
            $table->string('sales')->nullable();

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
        Schema::dropIfExists('d_products');
    }
}
