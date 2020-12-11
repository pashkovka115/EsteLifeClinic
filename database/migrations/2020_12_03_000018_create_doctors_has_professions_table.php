<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsHasProfessionsTable extends Migration
{
    public $tableName = 'doctors_has_professions';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('profession_id');

            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('profession_id')
                ->references('id')->on('professions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['doctor_id', 'profession_id'], 'doctors_has_professions_doctor_id_profession_id_primary');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
