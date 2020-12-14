<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentHistoryTable extends Migration
{
    public $tableName = 'treatment_history';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('cat_service_id');
            $table->string('name');
            $table->longText('before_images')->nullable();
            $table->longText('after_images')->nullable();
            $table->text('description')->nullable();
            $table->date('done')->nullable();

            $table->index(["doctor_id"], 'fk_doctors_doctor1_idx');

            $table->index(["cat_service_id"], 'fk_cat_service_cat_service1_idx');


            $table->foreign('doctor_id', 'fk_doctors_doctor1_idx')
                ->references('id')->on('doctors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cat_service_id', 'fk_cat_service_cat_service1_idx')
                ->references('id')->on('cat_services')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
