<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrerequisitecourse extends Migration
{

    public $set_schema_table = 'prerequisitecourse';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('prerequisitecourseID');
            $table->string('COURSECODE',50);
            $table->string('COU_COURSECODE',50);
            $table->foreign('COURSECODE')->references('COURSECODE')->on('course');
            $table->foreign('COU_COURSECODE')->references('COURSECODE')->on('course');
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
