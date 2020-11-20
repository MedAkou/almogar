<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->string('statue')->nullable()->default('NULL');
			$table->string('name',250)->nullable()->default('NULL');
			$table->string('url',250)->nullable()->default('NULL');
			$table->string('image',250)->nullable()->default('NULL');
			$table->text('htmlcode');
			$table->string('area')->nullable()->default('NULL');
			$table->string('date_start')->nullable()->default('NULL');
			$table->string('date_end')->nullable()->default('NULL');
			$table->string('store_id')->nullable()->default('NULL');
			$table->string('lang')->default('en');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
}