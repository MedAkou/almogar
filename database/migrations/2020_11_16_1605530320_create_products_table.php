<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->text('name');
			$table->string('thumbnail')->nullable()->default('NULL');
			$table->text('gallery');
			$table->text('price');
			$table->text('description');
			$table->string('categoryID')->nullable()->default('NULL');
			$table->string('stock')->nullable()->default('NULL');
			$table->json('slug')->nullable();
			$table->text('videos')->nullable();
			$table->string('statue')->nullable()->default('NULL');
			$table->string('lang')->nullable()->default('NULL');
			$table->string('store_id')->nullable()->default('NULL');
			$table->string('size')->nullable()->default('NULL');
			$table->string('weight')->nullable()->default('NULL');
			$table->string('quantity')->nullable()->default('NULL');
			$table->string('discount')->nullable()->default('NULL');
			$table->string('height')->nullable()->default('NULL');
			$table->string('length')->nullable()->default('NULL');
			$table->string('width')->nullable()->default('NULL');
			$table->string('sku')->nullable()->default('NULL');
			$table->integer('active')->nullable();
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}