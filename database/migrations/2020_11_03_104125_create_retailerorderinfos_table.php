<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailerorderinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailerorderinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('retailerorders_id')->nullable();
            $table->foreign('retailerorders_id')->references('id')->on('retailerorders')->onDelete('cascade');

            $table->unsignedBigInteger('rproduct_id')->nullable();
            $table->foreign('rproduct_id')->references('id')->on('r_products')->onDelete('cascade');

            $table->string('rproduct_pirce')->nullable();
            $table->string('rproduct_qty')->nullable();

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
        Schema::dropIfExists('retailerorderinfos');
    }
}
