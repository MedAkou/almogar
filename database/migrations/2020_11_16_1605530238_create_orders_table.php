<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->string('statue')->nullable()->default('NULL');
			$table->integer('user_id');
			$table->string('address_id')->nullable()->default('NULL');
			$table->string('total')->nullable()->default('NULL');
			$table->string('store_id')->nullable()->default('NULL');
			$table->string('shipping_id')->nullable()->default('NULL');
			$table->string('currency')->nullable()->default('NULL');
			$table->string('payement_id')->nullable()->default('NULL');
			$table->string('subtotal')->nullable()->default('NULL');
			$table->string('pickup')->nullable()->default('NULL');
			$table->string('serial')->nullable()->default('NULL');
			$table->string('device')->nullable()->default('NULL');
			$table->string('ip')->nullable()->default('NULL');
			$table->string('country')->nullable()->default('NULL');
			$table->string('platform')->nullable()->default('NULL');
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}