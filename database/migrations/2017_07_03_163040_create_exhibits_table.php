<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitsTable extends Migration
{
    const VISIBILITY_ON = 1;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibits',function (Blueprint $table){
            $table->increments('id');
            $table->string('img_path')->nullable();
            $table->string('link_3dmodel')->nullable();
            $table->string('panorama_path')->nullable();
            $table->boolean('visibility')->default(self::VISIBILITY_ON);
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exhibits');
        //
    }
}
