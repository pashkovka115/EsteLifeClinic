<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    public $tableName = 'services';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('cat_service_id');
//            $table->unsignedBigInteger('action_id')->nullable();
//            $table->enum('type', ['medicine', 'cosmetology'])->comment('тип услуги медицина или косметология');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();

            $table->string('ico1')->nullable();
            $table->text('service1')->nullable();
            $table->string('ico2')->nullable();
            $table->text('service2')->nullable();
            $table->string('ico3')->nullable();
            $table->text('service3')->nullable();
            $table->string('ico4')->nullable();
            $table->text('service4')->nullable();

            $table->string('price')->nullable();
            $table->string('img')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('title')->nullable();

            $table->timestamps();

            $table->index(["cat_service_id"], 'fk_services_cat_services_idx');
//            $table->index(["action_id"], 'fk_actions_action_idx');


            $table->foreign('cat_service_id', 'fk_services_cat_services_idx')
                ->references('id')->on('cat_services')
                ->onDelete('no action')
                ->onUpdate('no action');

            /*$table->foreign('action_id', 'fk_actions_action_idx')
                ->references('id')->on('actions')
                ->onDelete('no action')
                ->onUpdate('no action');*/
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
