<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributororders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grand_total')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('order_status')->default('Pending');
            $table->string('payment_type')->nullable();
            $table->string('payment_code')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('distributororders');
    }
}
