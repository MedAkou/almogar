<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->string('author')->nullable()->default('NULL');
			$table->string('title')->nullable()->default('NULL');
			$table->text('content');
			$table->string('thumbnail')->nullable()->default('NULL');
			$table->integer('statue')->nullable();
			$table->integer('comments_enabled')->nullable();
			$table->integer('type')->nullable();
			$table->string('slug')->nullable()->default('NULL');
			$table->integer('categoryID')->nullable();
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}