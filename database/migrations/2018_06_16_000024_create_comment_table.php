<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'comment';

    /**
     * Run the migrations.
     * @table comment
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('COMMENTID');
            $table->unsignedInteger('AUTHORID');
            $table->unsignedInteger('POSTID');
            $table->text('COMMENTTEXT');
            $table->dateTime('COMMENTTIME');

            $table->foreign('POSTID')
                ->references('POSTID')->on('post')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('AUTHORID')
                ->references('AUTHORID')->on('author')
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
