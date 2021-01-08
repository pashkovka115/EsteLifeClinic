<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsActionsTable extends Migration
{
    public function up()
    {
        Schema::create('conditions_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_id');
            $table->string('condition');

            $table->index(["action_id"], 'fk_conditions_actions_id_action1_idx');


            $table->foreign('action_id', 'fk_conditions_actions_id_action1_idx')
                ->references('id')->on('actions')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('conditions_actions');
    }
}
