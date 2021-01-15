<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTable extends Migration
{
    public $tableName = 'support';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->string('img')->nullable();
            $table->text('description');
            $table->timestamp('created_at');
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
