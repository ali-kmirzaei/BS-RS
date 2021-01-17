<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('book_genre', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->bigInteger('book_id')->unsigned();
              $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
              $table->bigInteger('genre_id')->unsigned();
              $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
//              $table->bigInteger('next_genre_id')->unsigned();
//              $table->foreign('next_genre_id')->references('id')->on('genres')->onDelete('cascade');

              $table->unique(['book_id','genre_id']);

              Schema::enableForeignKeyConstraints();
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
