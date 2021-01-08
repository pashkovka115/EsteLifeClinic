<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
 * Запись на приём
 */
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
            $table->unsignedBigInteger('cat_servise_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('date')->nullable();
            $table->timestamps();

            $table->index(["cat_servise_id"], 'fk_cat_services_cat_servise1_idx');
            $table->index(["service_id"], 'fk_services_service1_idx');
            $table->index(["doctor_id"], 'fk_doctors_doctor4_idx');

            $table->foreign('cat_servise_id', 'fk_cat_services_cat_servise1_idx')
                ->references('id')->on('cat_services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('service_id', 'fk_services_service1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('doctor_id', 'fk_doctors_doctor4_idx')
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
