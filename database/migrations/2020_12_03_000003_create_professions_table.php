<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionsTable extends Migration
{
    public $tableName = 'professions';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
