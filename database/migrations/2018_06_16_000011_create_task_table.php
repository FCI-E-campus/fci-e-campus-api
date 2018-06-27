<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'task';

    /**
     * Run the migrations.
     * @table task
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('TASKID');
            $table->string('COURSECODE', 50);
            $table->unsignedInteger('CREATORID');
            $table->string('TASKNAME', 100);
            $table->text('DESCRIPTION')->nullable()->default(null);
            $table->dateTime('DUEDATE');
            $table->dateTime('DATECREATED');
            $table->decimal('WEIGHT', 10, 0)->nullable()->default(null);

            $table->foreign('CREATORID')
                ->references('CREATORID')->on('taskcreator')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('COURSECODE')
                ->references('COURSECODE')->on('course')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
