<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()	
	{
	
	    Schema::create('users', function(Blueprint $table)
		{
		    $table->engine = "InnoDB";
			$table->increments('id')->unsigned();
			$table->string('account_name')->unique();
			$table->string('password');
			$table->string('email');
			$table->string('remember_token');
            $table->timestamps();			
            $table->index('account_name');
			$table->index('email');
		});
		
		Schema::create('departments', function(Blueprint $table)
		{
		    $table->engine = "InnoDB";
			$table->increments('id')->unsigned();
			$table->string('department_name')->unique();
            $table->timestamps();			
            $table->index('id');
		});
		
		Schema::create('employees', function(Blueprint $table)
		{
		    $table->engine = "InnoDB";
			$table->increments('id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('department_id')->unsigned();
			$table->string('primary_phone_number');
			$table->string('alt_phone_number');
			$table->string('email');
            $table->timestamps();			
            $table->index('id');
			$table->index(array('first_name', 'last_name'));
			$table->foreign('department_id')->references('id')->on('departments');
		});
		

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
		Schema::drop('departments');
		Schema::drop('users');
	}

}
