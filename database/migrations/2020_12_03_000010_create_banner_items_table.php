<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerItemsTable extends Migration
{
    public $tableName = 'banner_items';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id');
            $table->enum('visibility', ['1', '0']);
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->text('description')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}