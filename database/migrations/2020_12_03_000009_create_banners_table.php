<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    public $tableName = 'banners';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->enum('visibility', ['1', '0']);
            $table->string('name')->nullable();
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
