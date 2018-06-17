<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtramaterialsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'extramaterials';

    /**
     * Run the migrations.
     * @table extramaterials
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('EXTRAMATERIALID');
            $table->string('STUDUSERNAME', 50);
            $table->string('COURSECODE', 50);
            $table->string('MATERIALNAME', 100);
            $table->text('MATERIALDESCRIPTION')->nullable()->default(null);
            $table->string('MATERIALFILEPATH');
            $table->dateTime('DATEADDED')->nullable()->default(null);




            $table->foreign('STUDUSERNAME')
                ->references('STUDUSERNAME')->on('student')
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
