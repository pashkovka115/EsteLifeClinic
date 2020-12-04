<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryWorkTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'history_work';

    /**
     * Run the migrations.
     * @table history_work
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('position')->nullable()->comment('должность');
            $table->string('place')->nullable()->comment('место работы');
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
