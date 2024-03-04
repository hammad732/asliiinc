<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->string('unit');
            $table->string('weight');
            $table->string('image')->nullable();
            // $table->longText('size');
           
            $table->unsignedBigInteger('r_product_id')->nullable();
            $table->foreign('r_product_id')->references('id')->on('r_products')->onDelete('cascade');

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
        Schema::dropIfExists('p_variants');
    }
}
