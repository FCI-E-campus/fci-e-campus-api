<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'post';

    /**
     * Run the migrations.
     * @table post
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('POSTID');
            $table->unsignedInteger('FORUMID');
            $table->unsignedInteger('AUTHORID');
            $table->string('POSTTITLE', 100);
            $table->text('POSTBODY');
            $table->tinyInteger('ANSWERED');
            $table->dateTime('DATEPUBLISHED');

            $table->foreign('AUTHORID')
                ->references('AUTHORID')->on('author')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('FORUMID')
                ->references('FORUMID')->on('forum')
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
