<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->nullable();
            $table->string('title', 255);
            $table->string('poster', 255);
            $table->text('extract');
            $table->string('slug', 255)->unique();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('author_id')->references('id')->on('authors')
                  ->onDelete('set null');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
