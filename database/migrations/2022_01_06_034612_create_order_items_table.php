<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer( 'order_id');
            $table->integer( 'material_id');
            $table->string( 'finish_type');
            $table->double( 'length');
            $table->double( 'width');
            $table->double( 'thickness');
            $table->integer( 'count');
            $table->integer( 'done_count');
            $table->integer( 'shipped_count');
            $table->integer('create_user_id');
            $table->integer('update_user_id');
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
        Schema::dropIfExists('order_items');
    }
}
