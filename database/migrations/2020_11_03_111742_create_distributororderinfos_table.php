<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributororderinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributororderinfos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('distributororders_id')->nullable();
            $table->foreign('distributororders_id')->references('id')->on('distributororders')->onDelete('cascade');

            $table->unsignedBigInteger('dproduct_id')->nullable();
            $table->foreign('dproduct_id')->references('id')->on('d_products')->onDelete('cascade');

            $table->string('dproduct_pirce')->nullable();
            $table->string('dproduct_qty')->nullable();

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
        Schema::dropIfExists('distributororderinfos');
    }
}
