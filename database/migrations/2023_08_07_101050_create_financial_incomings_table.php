<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialIncomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_incomings', function (Blueprint $table) {
            $table->id();
            $table->integer('initial_currency_id');
            $table->integer('final_currency_id');
            $table->bigInteger('initial_amount');
            $table->bigInteger('final_amount');
            $table->string('date')->nullable();
            $table->string('remark');
            $table->integer('amount');
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
        Schema::dropIfExists('financial_incomings');
    }
}
