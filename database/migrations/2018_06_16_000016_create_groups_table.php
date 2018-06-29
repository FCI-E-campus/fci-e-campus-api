<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'groups';

    /**
     * Run the migrations.
     * @table groups
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('GROUPID');
            $table->string('COURSECODE', 50);
            $table->integer('GROUPNUM')->nullable();
            $table->string('TAUSERNAME',150);
            /*
            $table->foreign('TAUSERNAME')->references('TAUSERNAME')->on('ta');
            $table->foreign('COURSECODE')->references('COURSECODE')->on('course');            
            */
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
