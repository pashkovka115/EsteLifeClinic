<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    public $tableName = 'doctors';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name')->nullable();
            $table->text('education')->nullable()->comment('образование');
            $table->text('add_education')->nullable()->comment('доп образование');
            $table->enum('level', ['0', '1'])->comment('высшая категория');
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}