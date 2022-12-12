<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->integer( 'material_id');
            $table->integer( 'number');
            $table->date( 'recive_date');
            $table->date( 'cut_date');
            $table->double( 'length_before');
            $table->double( 'width_before');
            $table->double( 'height_before');
            $table->double( 'width_after');
            $table->double( 'height_after');
            $table->string( 'status');
            $table->string( 'position');
            $table->integer( 'machine_id');
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
        Schema::dropIfExists('blocks');
    }
}
