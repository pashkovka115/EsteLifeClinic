<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('top_slider')->nullable();
            $table->unsignedBigInteger('two_slider')->nullable();
            $table->unsignedBigInteger('action_slider')->nullable();
            $table->unsignedBigInteger('medical_center_slider')->nullable();
            $table->unsignedTinyInteger('count_doctors_list')->nullable();
            $table->unsignedTinyInteger('count_news')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('home');
    }
}
