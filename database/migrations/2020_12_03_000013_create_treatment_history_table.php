<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentHistoryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'treatment_history';

    /**
     * Run the migrations.
     * @table treatment_history
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->longText('before_images')->nullable();
            $table->longText('after_images')->nullable();
            $table->text('before_text')->nullable();
            $table->text('after_text')->nullable();
            $table->unsignedBigInteger('cat_treatment_history_id');
            $table->date('done')->nullable();

            $table->index(["cat_treatment_history_id"], 'fk_treatment_history_cat_treatment_history1_idx');


            $table->foreign('cat_treatment_history_id', 'fk_treatment_history_cat_treatment_history1_idx')
                ->references('id')->on('cat_treatment_history')
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
