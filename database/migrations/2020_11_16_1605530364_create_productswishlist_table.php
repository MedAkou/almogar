<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductswishlistTable extends Migration
{
    public function up()
    {
        Schema::create('productswishlist', function (Blueprint $table) {

		$table->bigIncrements('id');
		$table->integer('user_id');
		$table->string('lang')->nullable()->default('NULL');
		$table->string('store_id')->nullable()->default('NULL');
		$table->string('productID')->nullable()->default('NULL');
		$table->timestamps();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('productswishlist');
    }
}