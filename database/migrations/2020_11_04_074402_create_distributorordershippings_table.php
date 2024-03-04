<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorordershippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributorordershippings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('country');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('zip_code')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email');

            $table->unsignedBigInteger('distributororders_id')->nullable();
            $table->foreign('distributororders_id')->references('id')->on('distributororders')->onDelete('cascade');

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
        Schema::dropIfExists('distributorordershippings');
    }
}
