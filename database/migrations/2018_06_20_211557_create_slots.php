<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $set_schema_table = 'slots';
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('SLOTID');
            $table->string('DAY',15);
            $table->time('STARTTIME');
            $table->integer('DURATION');
            $table->unsignedInteger('GROUPID');
            $table->string('SLOTTYPE', 3);
            $table->text('PLACE');
            $table->string('COURSECODE',50);
            $table->foreign('GROUPID')->references('GROUPID')->on('groups');
          /*  $table->foreign('COURSECODE')->references('COURSECODE')->on('course'); */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
