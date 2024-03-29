<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table -> increments("id");
            $table -> string('email')->unique();
            $table ->string('name');
            $table ->string('last_name');
            $table ->string('password',60);
            $table-> integer('provider_id');
            $table-> integer('company_id');
            $table-> integer('role_id');
            $table->string('remember_token')->nullable();

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
        Schema::drop('users');
    }

}
