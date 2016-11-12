<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patch', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patchwork_id');
            $table->integer('x');
            $table->integer('y');
            $table->unsignedInteger('fabric_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patch');
    }
}
