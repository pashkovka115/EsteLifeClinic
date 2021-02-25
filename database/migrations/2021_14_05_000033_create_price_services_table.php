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
//            $table->unsignedBigInteger('pricedirection_id');
            $table->unsignedInteger('type')->default(2);
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedBigInteger('pricedirection_id');
            $table->string('slug');
            $table->string('name');
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('code')->nullable();
            $table->enum('show_code', ['1', '0']);
            $table->timestamps();

            /*$table->index(["pricedirection_id"], 'fk_price_services_pricedirection1_idx');


            $table->foreign('pricedirection_id', 'fk_price_services_pricedirection1_idx')
                ->references('id')->on('pricedirections')
                ->onDelete('no action')
                ->onUpdate('no action');*/
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
