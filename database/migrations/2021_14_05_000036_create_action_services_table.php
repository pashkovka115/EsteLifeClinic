<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionServicesTable extends Migration
{
    public function up()
    {
        Schema::create('action_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_id');
            $table->unsignedBigInteger('service_id');


            $table->index(["action_id"], 'fk_action_service_action1_idx');
            $table->index(["service_id"], 'fk_action_service_service1_idx');

            $table->foreign('action_id', 'fk_action_service_action1_idx')
                ->references('id')->on('actions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('service_id', 'fk_action_service_service1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('action_service');
    }
}
