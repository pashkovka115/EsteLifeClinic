<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasBannersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'services_has_banners';

    /**
     * Run the migrations.
     * @table services_has_banners
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('service_id');
            $table->unsignedInteger('banner_id');

            $table->index(["service_id"], 'fk_services_has_banners_services1_idx');

            $table->index(["banner_id"], 'fk_services_has_banners_banners1_idx');


            $table->foreign('service_id', 'fk_services_has_banners_services1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('banner_id', 'fk_services_has_banners_banners1_idx')
                ->references('id')->on('banners')
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
