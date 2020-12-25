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
            $table->enum('type', ['medicine', 'cosmetology'])->comment('тип услуги медицина или косметология');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('img')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();

            $table->timestamps();

            $table->index(["cat_service_id"], 'fk_services_cat_services_idx');


            $table->foreign('cat_service_id', 'fk_services_cat_services_idx')
                ->references('id')->on('cat_services')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
