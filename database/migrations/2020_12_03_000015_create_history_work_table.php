<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryWorkTable extends Migration
{
    public $tableName = 'history_work';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id');
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('position')->nullable()->comment('должность');
            $table->string('place')->nullable()->comment('место работы');
            $table->unsignedBigInteger('doctor_id');
            $table->timestamps();


            $table->index(["doctor_id"], 'fk_doctors_doctor1_idx');


            $table->foreign('doctor_id', 'fk_doctors_doctor1_idx')
                ->references('id')->on('doctors')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
