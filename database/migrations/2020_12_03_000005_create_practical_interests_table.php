<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticalInterestsTable extends Migration
{
    public $tableName = 'practical_interests';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->text('description')->nullable();
            $table->string('ico')->nullable();

            $table->index(["doctor_id"], 'fk_doctors_doctor2_idx');


            $table->foreign('doctor_id', 'fk_doctors_doctor2_idx')
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
