<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    public $tableName = 'pages';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('h1')->nullable();
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('img')->nullable();
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
