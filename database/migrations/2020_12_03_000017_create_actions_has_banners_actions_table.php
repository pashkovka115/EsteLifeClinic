<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsHasBannersActionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'actions_has_banners_actions';

    /**
     * Run the migrations.
     * @table actions_has_banners_actions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('action_id');
            $table->unsignedInteger('banner_action_id');

            $table->index(["banner_action_id"], 'fk_actions_has_banners_actions_banners_actions1_idx');

            $table->index(["action_id"], 'fk_actions_has_banners_actions_actions1_idx');


            $table->foreign('action_id', 'fk_actions_has_banners_actions_actions1_idx')
                ->references('id')->on('actions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('banner_action_id', 'fk_actions_has_banners_actions_banners_actions1_idx')
                ->references('id')->on('banners_actions')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
