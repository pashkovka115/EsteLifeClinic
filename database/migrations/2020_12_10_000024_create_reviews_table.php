<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_service_id');
            $table->enum('visibility', ['0', '1']);
            $table->string('name');
            $table->text('content');
            $table->timestamps();

            $table->index(["cat_service_id"], 'fk_cat_services_id_cat_service1_idx');


            $table->foreign('cat_service_id', 'fk_cat_services_id_cat_service1_idx')
                ->references('id')->on('cat_services')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
