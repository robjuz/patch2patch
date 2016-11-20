<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatchworkFabricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patchwork_fabric', function(Blueprint $table){
            $table->unsignedInteger('patchwork_id')->nullable();
            $table->unsignedInteger('fabric_id')->nullable();
            $table->primary(['patchwork_id', 'fabric_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patchwork_fabric');
    }
}
