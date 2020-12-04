<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'services';

    /**
     * Run the migrations.
     * @table services
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('cat_servise_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('img')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();

            $table->index(["cat_servise_id"], 'fk_services_cat_servises_idx');


            $table->foreign('cat_servise_id', 'fk_services_cat_servises_idx')
                ->references('id')->on('cat_servises')
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
