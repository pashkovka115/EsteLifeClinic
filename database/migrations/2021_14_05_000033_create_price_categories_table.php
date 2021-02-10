<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('price_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price_direction_id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();

            $table->index(["price_direction_id"], 'fk_price_categories_price_direction1_idx');


            $table->foreign('price_direction_id', 'fk_price_categories_price_direction1_idx')
                ->references('id')->on('price_directions')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('price_categories');
    }
}
