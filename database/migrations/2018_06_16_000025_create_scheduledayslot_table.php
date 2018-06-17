<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledayslotTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'scheduledayslot';

    /**
     * Run the migrations.
     * @table scheduledayslot
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('SLOTID');
            $table->date('DAYDATE');
            $table->time('STARTTIME');
            $table->integer('DURATION');
            $table->string('SLOTTYPE', 3);
            $table->text('PLACE');
            $table->foreign('DAYDATE')
                ->references('DAYDATE')->on('scheduleday')
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
