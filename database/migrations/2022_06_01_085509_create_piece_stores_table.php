<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_stores', function (Blueprint $table) {
            $table->id();
            //$table->integer('block_id');
            $table->string('finish_type');
            $table->integer('count');
            $table->double('length');
            $table->double('width');
            $table->double('thickness');
            $table->integer('material_id');
            $table->string( 'position')->default('current');
            $table->date('ship_date')->nullable();
            $table->string( 'status');
            $table->integer('create_user_id')->nullable();
            $table->integer('update_user_id')->nullable();
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
        Schema::dropIfExists('piece_stores');
    }
}
