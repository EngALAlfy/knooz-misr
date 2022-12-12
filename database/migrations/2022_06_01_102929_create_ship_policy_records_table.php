<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipPolicyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_policy_records', function (Blueprint $table) {
            $table->id();
            $table->string('finish_type');
            $table->integer('count');
            $table->double('length');
            $table->double('width');
            $table->double('thickness');
            $table->integer('material_id');
            $table->integer('ship_policy_id');
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
        Schema::dropIfExists('ship_policy_records');
    }
}
