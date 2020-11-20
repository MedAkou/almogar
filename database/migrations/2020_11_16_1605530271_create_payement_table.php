<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayementTable extends Migration
{
    public function up()
    {
        Schema::create('payement', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('order_id')->nullable();
            $table->string('method')->nullable()->default('NULL');
            $table->string('transactionID')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('payement');
    }
}