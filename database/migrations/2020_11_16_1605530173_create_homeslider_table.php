<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesliderTable extends Migration
{
    public function up()
    {
        Schema::create('homeslider', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('image')->nullable()->default('NULL');
            $table->string('link',400)->nullable()->default('NULL');
            $table->string('lang')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('homeslider');
    }
}