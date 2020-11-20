<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasepagesTable extends Migration
{
    public function up()
    {
        Schema::create('basepages', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('title')->nullable()->default('NULL');
            $table->text('content');
            $table->string('slug')->nullable()->default('NULL');
            $table->string('lang')->default('en');
            $table->string('store_id')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('basepages');
    }
}