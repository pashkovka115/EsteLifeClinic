<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    public $tableName = 'appointments';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone', 36);
            $table->string('cat_servise')->nullable();
            $table->string('service')->nullable();
            $table->string('doctor')->nullable();
            $table->date('day')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
