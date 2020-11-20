<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration
{
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->string('name');
			$table->string('delivery_days');
			$table->string('statue')->nullable()->default('NULL');
			$table->string('cost');
			$table->string('lang')->default('en');
			$table->string('store_id')->nullable()->default('NULL');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping');
    }
}