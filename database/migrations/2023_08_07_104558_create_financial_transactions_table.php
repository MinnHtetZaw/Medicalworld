<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->integer('amount');
            $table->date('date');
            $table->string('remark');
            $table->integer('type')->default(0)->comment('1-debit, 2 - credit');
            $table->unsignedBigInteger('purchase_id')->nullable();
            $table->unsignedBigInteger('related_transaction_id')->nullable();
            $table->integer('type_flag');
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
        Schema::dropIfExists('financial_transactions');
    }
}
