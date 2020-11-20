<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqscategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('faqscategories', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('faqscategories');
    }
}