<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('order_id')->nullable()->default('NULL');
            $table->string('product_id')->nullable()->default('NULL');
            $table->string('quantity')->nullable()->default('NULL');
            $table->string('price')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}