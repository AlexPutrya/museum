<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table){
            $table->increments('id');
            $table->integer('exhibit_id')->unsigned();
            $table->foreign('exhibit_id')->references('id')->on('exhibits');
            $table->char('lang', 2);
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('texts');
    }
}
