<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->string('given_name')->nullable()->default('NULL');
			$table->string('country_code')->nullable()->default('NULL');
			$table->string('street')->nullable()->default('NULL');
			$table->string('housenumber')->nullable()->default('NULL');
			$table->string('state')->nullable()->default('NULL');
			$table->string('city')->nullable()->default('NULL');
			$table->string('postal_code')->nullable()->default('NULL');
			$table->string('latitude')->nullable()->default('NULL');
			$table->string('longitude')->nullable()->default('NULL');
			$table->string('phone')->nullable()->default('NULL');
			$table->integer('user_id')->nullable();
			$table->tinyInteger('is_primary')->nullable();
			$table->tinyInteger('is_billing')->nullable();
			$table->tinyInteger('is_shipping')->nullable();
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}