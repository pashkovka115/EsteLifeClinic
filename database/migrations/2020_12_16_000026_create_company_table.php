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

            $table->string('ico1')->nullable();
            $table->text('service1')->nullable();
            $table->string('ico2')->nullable();
            $table->text('service2')->nullable();
            $table->string('ico3')->nullable();
            $table->text('service3')->nullable();
            $table->string('ico4')->nullable();
            $table->text('service4')->nullable();

            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
