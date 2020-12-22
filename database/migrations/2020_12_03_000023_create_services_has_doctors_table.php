<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasDoctorsTable extends Migration
{
    public $tableName = 'services_has_doctors';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('doctor_id');


            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['doctor_id', 'service_id'], 'services_has_doctors_doctor_id_service_id_primary');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
