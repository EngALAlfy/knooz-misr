<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strips', function (Blueprint $table) {
            $table->id();
            $table->integer( 'block_id');
            $table->string( 'finish_type');
            $table->integer( 'count');
            $table->double( 'length');
            $table->double( 'width');
            $table->double( 'thickness');
            $table->string( 'status');
            //$table->integer( 'machine_id');
            $table->date( 'cut_date');
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
        Schema::dropIfExists('strips');
    }
}
