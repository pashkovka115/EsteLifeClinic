<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePriceserviceTable extends Migration
{
    public $tableName = 'service_priceservice';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('priceservice_id');

            $table->index(["service_id"], 'fk_service_priceservice_service1_idx');
            $table->index(["priceservice_id"], 'fk_service_priceservice_priceservice1_idx');

            $table->foreign('service_id', 'fk_service_priceservice_service1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('priceservice_id', 'fk_service_priceservice_priceservice1_idx')
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
