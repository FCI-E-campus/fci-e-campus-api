<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTacoursegroupTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tacoursegroup';

    /**
     * Run the migrations.
     * @table tacoursegroup
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('TACOURSEID');
            $table->unsignedInteger('GROUPID');


            $table->foreign('TACOURSEID')
                ->references('TACOURSEID')->on('tacourse')
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
