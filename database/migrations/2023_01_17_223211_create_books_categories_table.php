<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('books_id')->unsigned();
            $table->unsignedBiginteger('categories_id')->unsigned();

            $table->foreign("books_id")->references('id')->on("books")->onDelete('cascade');
            $table->foreign("categories_id")->references('id')->on("categories")->onDelete('cascade');
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
        Schema::dropIfExists('books_categories');
    }
}
