<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionPricesTable extends Migration
{
    public $tableName = 'direction_prices';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricedirection_id');
            $table->unsignedBigInteger('priceservice_id');


            $table->index(["pricedirection_id"], 'fk_direction_pricedirection1_idx');
            $table->index(["priceservice_id"], 'fk_direction_priceservice1_idx');

            $table->foreign('pricedirection_id', 'fk_direction_pricedirection1_idx')
                ->references('id')->on('pricedirections')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('priceservice_id', 'fk_direction_priceservice1_idx')
                ->references('id')->on('priceservices')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
