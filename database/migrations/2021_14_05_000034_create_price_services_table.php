<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceServicesTable extends Migration
{
    public function up()
    {
        Schema::create('price_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price_category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();

            $table->index(["price_category_id"], 'fk_price_services_price_category1_idx');


            $table->foreign('price_category_id', 'fk_price_services_price_category1_idx')
                ->references('id')->on('price_categories')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('price_services');
    }
}
