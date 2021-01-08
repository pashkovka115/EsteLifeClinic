<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public $tableName = 'posts';


    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('cat_post_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('read_time')->nullable();
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('img')->nullable();
            $table->string('bg_img')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();

            $table->index(["cat_post_id"], 'fk_posts_cat_posts1_idx');


            $table->foreign('cat_post_id', 'fk_posts_cat_posts1_idx')
                ->references('id')->on('cat_posts')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }


     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
