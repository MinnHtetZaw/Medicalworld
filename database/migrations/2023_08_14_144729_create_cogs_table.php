<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cogs', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_product_id');
            $table->integer('fabric_cost');
            $table->integer('labor_cost');
            $table->integer('transportation_cost');
            $table->integer('other_overhead_cost');
            $table->integer('quantity');
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
        Schema::dropIfExists('cogs');
    }
}
