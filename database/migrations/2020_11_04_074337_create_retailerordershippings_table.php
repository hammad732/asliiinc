<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailerordershippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailerordershippings', function (Blueprint $table) {
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

            $table->unsignedBigInteger('retailerorders_id')->nullable();
            $table->foreign('retailerorders_id')->references('id')->on('retailerorders')->onDelete('cascade');

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
        Schema::dropIfExists('retailerordershippings');
    }
}
