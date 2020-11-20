<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name')->nullable()->default('NULL');
            $table->text('menu');
            $table->string('area')->nullable()->default('NULL');
            $table->string('lang')->default('en');
            $table->string('store_id')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}