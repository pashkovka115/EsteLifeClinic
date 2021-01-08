<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name');
//            $table->dateTime('time')->nullable()->comment('во сколько позвонить');
            $table->enum('status', ['0', '1']);
        });
    }


    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
