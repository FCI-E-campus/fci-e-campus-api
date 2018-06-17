<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'course';

    /**
     * Run the migrations.
     * @table course
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('COURSECODE',50)->primary();
            $table->unsignedInteger('DEPTID');
            $table->string('COURSETITLE', 100);
            $table->text('DESCRIPTION')->nullable()->default(null);
            $table->dateTime('STARTDATE');
            $table->dateTime('ENDDATE');
            $table->string('PASSCODE', 10)->nullable()->default(null);
            $table->foreign('DEPTID')
                ->references('DEPTID')->on('department')
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
