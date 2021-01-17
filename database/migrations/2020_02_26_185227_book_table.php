<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('books', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->string('book_name',100)->unique();
              $table->string('author',200);
              $table->bigInteger('cost');
              $table->string('img',200)->nullable();
              $table->timestamps();
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
