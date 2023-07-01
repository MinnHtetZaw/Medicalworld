<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricCostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_costings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('design_id');
            $table->unsignedInteger('fabric_id');
            $table->unsignedInteger('size_id');
            $table->unsignedInteger('color_id');
            $table->float('yards');
            $table->float('pricing');
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
        Schema::dropIfExists('fabric_costings');
    }
}
