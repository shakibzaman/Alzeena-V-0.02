<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuuplierAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suuplier_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sup_id');
            $table->integer('amount');
            $table->integer('pay');
            $table->integer('due');
            $table->string('entry_date')->nullable();
            $table->string('entry_month')->nullable();
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
        Schema::dropIfExists('suuplier_accounts');
    }
}
