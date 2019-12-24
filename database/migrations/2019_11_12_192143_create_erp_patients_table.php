<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateErpPatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('erp_patients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('patient_id', 191)->nullable();
			$table->string('title', 191)->nullable();
			$table->string('first_name', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->string('sur_name', 191)->nullable();
			$table->string('full_name', 191)->nullable();
			$table->string('nhs_no', 191)->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('mobile', 191)->nullable();
			$table->string('post_code', 191)->nullable();
			$table->date('date_of_death')->nullable();
			$table->text('address', 65535)->nullable();
			$table->text('gp_details', 65535)->nullable();
			$table->string('next_of_kin', 191)->nullable();
			$table->string('support_plan', 191)->nullable();
			$table->text('behaviour', 65535)->nullable();
			$table->string('communication', 1000)->nullable();
			$table->string('daily_living_skills', 1000)->nullable();
			$table->string('education', 1000)->nullable();
			$table->string('position', 191)->nullable();
			$table->string('signature', 191)->nullable();
			$table->date('behabiour_date')->nullable();
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
		Schema::drop('erp_patients');
	}

}
