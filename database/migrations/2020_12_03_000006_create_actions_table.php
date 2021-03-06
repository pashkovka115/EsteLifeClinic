<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    public $tableName = 'actions';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->enum('show_home', ['0', '1']);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->nullable()->comment('тип акции');
            $table->string('slogan')->nullable();
            $table->string('discount')->nullable();
            $table->string('big_img')->nullable();
            $table->string('banner_img')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('conditions')->nullable();
            $table->date('start')->nullable();
            $table->date('finish')->nullable();

            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
