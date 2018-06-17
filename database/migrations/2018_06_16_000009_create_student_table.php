<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'student';

    /**
     * Run the migrations.
     * @table student
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('STUDUSERNAME',50)->primary();
            $table->unsignedInteger('DEPTID')->nullable()->default(null);
            $table->unsignedInteger('DEP_DEPTID')->nullable()->default(null);
            $table->string('STUDPASSWORD', 50);
            $table->string('FIRSTNAME', 50);
            $table->string('LASTNAME', 50);
            $table->string('EMAIL', 150);
            $table->string('PHONENUMBER', 50)->nullable()->default(null);
            $table->date('DATEOFBIRTH')->nullable()->default(null);
            $table->string('FACULTYID', 15);
            $table->tinyInteger('ISMODERATOR');




            $table->foreign('DEPTID')
                ->references('DEPTID')->on('department')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('DEP_DEPTID')
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
