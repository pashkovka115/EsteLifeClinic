<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasActionsTable extends Migration
{

    public $tableName = 'services_has_actions';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('action_id');


            $table->foreign('service_id', 'fk_services_has_actions_services1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('action_id', 'fk_services_has_actions_actions1_idx')
                ->references('id')->on('actions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['service_id', 'action_id'], 'services_has_actions_service_id_action_id_primary');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
