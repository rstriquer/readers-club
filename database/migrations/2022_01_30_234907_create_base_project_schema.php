<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseProjectSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedSmallInteger('pageCount')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('isbn')->nullable()->index();
            $table->string('id_api')->index();
            $table->date('published')->nullable();
            $table->foreignId('publisher_id')->nullable()->constrained();
        });
        Schema::create('author_books', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->unique(['author_id', 'book_id']);
        });
        Schema::create('user_books', function (Blueprint $table) {
            $table->id();
            $table->date('reading_from')->useCurrent();
            $table->date('reading_to')->nullable()->comment('Can be null for user could be starting the reading');
            $table->tinyInteger('rating')->comment('User perception of ranking book quality');
            $table->text('review');
            $table->foreignId('book_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('user_books');
        Schema::dropIfExists('author_books');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('user_books');
        Schema::dropIfExists('books');
        Schema::dropIfExists('publishers');
    }
}
