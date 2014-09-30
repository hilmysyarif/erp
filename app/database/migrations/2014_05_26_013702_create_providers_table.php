<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('providers', function(Blueprint $table) {
            $table -> increments("id");
            $table -> string('rut')->unique();
            $table ->string('adress');
            $table ->string('city');
            $table ->string('location');
            $table ->string('phone_number');
            $table ->string('cellphone_number');
            $table ->string('supply_region');
            $table -> string('fancy_name');
            $table -> text('description');
            $table->boolean('pyme');
            $table->integer('payment_term');
            $table ->string('payment_currency');
            $table ->string('bank_name');
            $table ->string('bank_account_number');

            $table -> timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('providers');
	}

}
