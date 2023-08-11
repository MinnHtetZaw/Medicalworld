<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_masters', function (Blueprint $table) {
            $table->id();
            $table->date('financial_year_from');
            $table->date('financial_year_to');
            $table->unsignedInteger('showroom_sales_account_id')->nullable();
            $table->unsignedInteger('b2b_sales_account_id')->nullable();
            $table->unsignedInteger('purchase_account_id')->nullable();
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
        Schema::dropIfExists('financial_masters');
    }
}
