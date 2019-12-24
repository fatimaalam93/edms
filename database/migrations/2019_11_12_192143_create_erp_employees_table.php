<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateErpEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('erp_employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->string('full_name', 191)->nullable();
			$table->string('mobile', 191)->nullable();
			$table->string('emergency_no', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->date('date_of_birth')->nullable();
			$table->text('permanent_address', 65535)->nullable();
			$table->text('current_address', 65535)->nullable();
			$table->integer('department_id')->nullable();
			$table->integer('designation_id')->nullable();
			$table->date('joining_date')->nullable();
			$table->string('employee_photo', 191)->nullable();
			$table->integer('gender_id')->nullable();
			$table->integer('blood_group_id')->nullable();
			$table->text('qualifications', 65535)->nullable();
			$table->text('experiences', 65535)->nullable();
			$table->boolean('active_status')->default(1);
			$table->string('created_by', 191)->nullable();
			$table->string('updated_by', 191)->nullable();
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
		Schema::drop('erp_employees');
	}

}
