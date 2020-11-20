<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name',400);
            $table->string('post_mime_type');
            $table->string('size')->nullable()->default('NULL');
            $table->string('store_id')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
}