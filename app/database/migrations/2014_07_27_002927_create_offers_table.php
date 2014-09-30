<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table)
		{
			$table ->increments('id');       
			$table ->integer('provider_id');
			$table ->integer('order_id');   
			$table ->string('date');        
			$table ->string('amount');      
			$table ->string('price');       
			$table ->string('state');       
			$table->timestamps();           
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offers');
	}

}
