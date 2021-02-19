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
            $table->unsignedBigInteger('banner_id')->nullable();
            $table->string('code_banner')->nullable()->comment('код баннера к которому относится');
            $table->enum('visibility', ['1', '0']);
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->string('extra')->nullable()->comment('дополнительное поле');
            $table->text('description')->nullable();
            $table->text('full_description')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
