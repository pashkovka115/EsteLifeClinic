<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasPostsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'services_has_posts';

    /**
     * Run the migrations.
     * @table services_has_posts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('service_id');
            $table->unsignedInteger('post_id');

            $table->index(["post_id"], 'fk_services_has_posts_posts1_idx');

            $table->index(["service_id"], 'fk_services_has_posts_services1_idx');


            $table->foreign('service_id', 'fk_services_has_posts_services1_idx')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('post_id', 'fk_services_has_posts_posts1_idx')
                ->references('id')->on('posts')
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
