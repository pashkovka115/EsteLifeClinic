<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasPostsTable extends Migration
{
    public $tableName = 'services_has_posts';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('post_id');


            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['service_id', 'post_id'], 'services_has_posts_service_id_post_id_primary');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
