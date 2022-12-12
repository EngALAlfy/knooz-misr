<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_policies', function (Blueprint $table) {
            $table->id();
            $table->integer('create_user_id')->nullable();
            $table->integer('update_user_id')->nullable();
            $table->integer('order_id');
            $table->string('car_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->date('ship_date')->default(now());
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
        Schema::dropIfExists('ship_policies');
    }
}
