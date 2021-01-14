<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatServicesTable extends Migration
{
    public $tableName = 'cat_services';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['medicine', 'cosmetology'])->comment('тип услуги медицина или косметология');
            $table->enum('before_after', ['0', '1'])->comment('выводить в меню до после');
            $table->text('description')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();
            $table->string('img')->nullable();

            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('cat_services');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
