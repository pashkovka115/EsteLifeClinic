<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsHasPracticalInterestsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'doctors_has_practical_interests';

    /**
     * Run the migrations.
     * @table doctors_has_practical_interests
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('doctor_id');
            $table->unsignedInteger('practical_interest_id');

            $table->index(["practical_interest_id"], 'fk_doctors_has_practical_interests_practical_interests1_idx');

            $table->index(["doctor_id"], 'fk_doctors_has_practical_interests_doctors1_idx');


            $table->foreign('doctor_id', 'fk_doctors_has_practical_interests_doctors1_idx')
                ->references('id')->on('doctors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('practical_interest_id', 'fk_doctors_has_practical_interests_practical_interests1_idx')
                ->references('id')->on('practical_interests')
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
