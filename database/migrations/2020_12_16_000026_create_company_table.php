<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    public $tableName = 'company';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('top_slider')->nullable();
            $table->unsignedBigInteger('middle_slider')->nullable();
            $table->unsignedBigInteger('bottom_slider')->nullable();
            $table->string('h3')->nullable();
            $table->string('practice')->nullable();
            $table->string('cnt')->nullable()->comment('количество процедур');
            $table->text('description');
            $table->string('ico1');
            $table->text('service1');
            $table->string('ico2');
            $table->text('service2');
            $table->string('ico3');
            $table->text('service3');
            $table->string('ico4');
            $table->text('service4');

            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->text('meta_description')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
