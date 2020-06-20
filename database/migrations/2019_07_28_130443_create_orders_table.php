<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone');
            $table->string('qty')->nullable();
            $table->string('sub_total')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('delevary_charge')->nullable();
            $table->string('delevary_company')->nullable();
            $table->string('order_note')->nullable();
            $table->string('total')->nullable();
            $table->string('pay')->nullable();
            $table->string('due')->nullable();
            $table->string('payby')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('order_by')->nullable();
            $table->integer('order_status')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
