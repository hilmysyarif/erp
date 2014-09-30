<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('product_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('week_number');
            $table->string('amount');
            $table->string('max_amount');
            $table->string('max_amount_daily');
            $table->string('min_amount');
            $table->string('price');
            $table->integer('period');
            $table->boolean('confirmed');
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
        Schema::drop('orders');
    }

}
