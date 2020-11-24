<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->string('name',250)->nullable()->default('NULL');
			$table->string('street',250)->nullable()->default('NULL');
			$table->string('description',250)->nullable()->default('NULL');
			$table->text('logo')->nullable();
			$table->string('thumbnail')->nullable()->default('NULL');
			$table->string('user_id')->nullable()->default('NULL');
			$table->string('postal_code')->nullable()->default('NULL');
			$table->string('slug')->nullable()->default('NULL');
			$table->string('latitude')->nullable()->default('NULL');
			$table->string('longitude')->nullable()->default('NULL');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
}