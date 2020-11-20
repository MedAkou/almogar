<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {

		$table->bigIncrements('id');
		$table->string('image')->nullable()->default('NULL');
		$table->string('link',400)->nullable()->default('NULL');
		$table->string('lang')->default('en');
        $table->integer('store_id')->nullable();
        $table->timestamps();
        $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('slider');
    }
}