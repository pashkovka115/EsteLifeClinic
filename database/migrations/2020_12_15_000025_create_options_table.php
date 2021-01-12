<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('val')->nullable();
            $table->string('val2')->nullable()->comment('дополнительное значение');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('options');
    }
}
