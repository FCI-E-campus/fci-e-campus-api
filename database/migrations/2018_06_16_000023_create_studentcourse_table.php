<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentcourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'studentcourse';

    /**
     * Run the migrations.
     * @table studentcourse
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('studentCourseID');
            $table->unsignedInteger('GROUPID');
            $table->string('STUDUSERNAME', 50);
            $table->string('COURSECODE', 50);
            $table->float('TOTALGRADE')->nullable()->default(null);

//            $table->foreign('COURSECODE')
//                ->references('COURSECODE')->on('course')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');

            $table->foreign('STUDUSERNAME')
                ->references('STUDUSERNAME')->on('student')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('GROUPID')
                ->references('GROUPID')->on('groups')
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
