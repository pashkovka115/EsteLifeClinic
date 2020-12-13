<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatServicesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cat_services';

    /**
     * Run the migrations.
     * @table cat_servises
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->string('name', 45)->nullable();
            $table->text('description')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();
            $table->string('img')->nullable();

            $table->foreign('parent_id')->references('id')->on('cat_services');
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
