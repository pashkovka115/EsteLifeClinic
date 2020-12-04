<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsHasProfessionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'doctors_has_professions';

    /**
     * Run the migrations.
     * @table doctors_has_professions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('doctor_id');
            $table->unsignedInteger('profession_id');

            $table->index(["profession_id"], 'fk_doctors_has_professions_professions1_idx');

            $table->index(["doctor_id"], 'fk_doctors_has_professions_doctors1_idx');


            $table->foreign('doctor_id', 'fk_doctors_has_professions_doctors1_idx')
                ->references('id')->on('doctors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('profession_id', 'fk_doctors_has_professions_professions1_idx')
                ->references('id')->on('professions')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
