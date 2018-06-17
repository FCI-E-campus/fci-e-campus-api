<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'announcement';

    /**
     * Run the migrations.
     * @table announcement
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ANNOUNCEMENTID');
            $table->string('ADMINUSERNAME', 50);
            $table->string('ANNOUNCEMENTTITLE', 200);
            $table->text('ANNOUNCEMENTBODY');
            $table->dateTime('DATEPUBLISHED');

            $table->foreign('ADMINUSERNAME')
                ->references('ADMINUSERNAME')->on('admin')
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
