<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTacourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tacourse';

    /**
     * Run the migrations.
     * @table tacourse
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('TACOURSEID');
            $table->string('TAUSERNAME', 50);
            $table->string('COURSECODE', 50);

            $table->foreign('TAUSERNAME')
                ->references('TAUSERNAME')->on('ta')
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
