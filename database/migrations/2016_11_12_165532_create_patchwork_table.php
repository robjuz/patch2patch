<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatchworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patchwork', function (Blueprint $table) {
            $table->increments('id');
            $table->text('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->integer('likes')->nullable()->default(0);
            $table->string('created_by', 255);
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
        Schema::drop('patchwork');
    }
}
