<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorcourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'professorcourse';

    /**
     * Run the migrations.
     * @table professorcourse
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('professorcourseID');
            $table->string('COURSECODE',50);
            $table->string('PROFUSERNAME', 50);

            $table->foreign('COURSECODE')
                ->references('COURSECODE')->on('course')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('PROFUSERNAME')
                ->references('PROFUSERNAME')->on('professor')
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
