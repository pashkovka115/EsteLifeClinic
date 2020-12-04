<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'doctors';

    /**
     * Run the migrations.
     * @table doctors
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('education')->nullable()->comment('образование');
            $table->text('add_education')->nullable()->comment('доп образование');
            $table->string('level')->nullable()->comment('уровень образования');
            $table->string('img')->nullable();
            $table->unsignedInteger('history_work_id');

            $table->index(["history_work_id"], 'fk_doctors_history_work1_idx');


            $table->foreign('history_work_id', 'fk_doctors_history_work1_idx')
                ->references('id')->on('history_work')
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
