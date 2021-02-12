<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceServicesTable extends Migration
{
    public $tableName = 'priceservices';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricecategory_id');
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();

            $table->index(["pricecategory_id"], 'fk_price_services_price_category1_idx');


            $table->foreign('pricecategory_id', 'fk_price_services_price_category1_idx')
                ->references('id')->on('pricecategories')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
