<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceCategoriesTable extends Migration
{
    public $tableName = 'pricecategories';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricedirection_id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();

            $table->index(["pricedirection_id"], 'fk_price_categories_price_direction1_idx');


            $table->foreign('pricedirection_id', 'fk_price_categories_price_direction1_idx')
                ->references('id')->on('pricedirections')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
