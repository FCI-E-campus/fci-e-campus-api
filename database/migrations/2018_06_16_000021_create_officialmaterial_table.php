<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficialmaterialTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'officialmaterial';

    /**
     * Run the migrations.
     * @table officialmaterial
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('MATERIALID');
            $table->string('COURSECODE', 50);
            $table->unsignedInteger('TASKID')->nullable()->default(null);
            $table->unsignedInteger('UPLOADERID');
            $table->string('MATERIALNAME', 100);
            $table->text('MATERIALDESCRIPTION')->nullable()->default(null);
            $table->string('MATERIALFILEPATH');
            $table->dateTime('DATEADDED')->nullable()->default(null);
            $table->string('MATERIALTYPE', 10)->nullable()->default(null);



//            $table->foreign('COURSECODE')
//                ->references('COURSECODE')->on('course')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');

            $table->foreign('TASKID')
                ->references('TASKID')->on('task')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('UPLOADERID')
                ->references('UPLOADERID')->on('officialmaterialuploader')
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
