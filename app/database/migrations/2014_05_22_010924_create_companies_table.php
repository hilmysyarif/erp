<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table)
        {
            $table -> increments("id");
            $table -> string('rut')->unique();
            $table ->string('adress');
            $table ->string('city');
            $table ->string('location');
            $table ->string('phone_number');
            $table -> string('fancy_name');
            $table -> string('description');
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
        Schema::drop('companies');
    }

}
