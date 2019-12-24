<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_documents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('doc_type', 20)->nullable();
			$table->integer('patient_id')->nullable();
			$table->string('document_type_code', 20)->nullable();
			$table->string('document_name', 100)->nullable();
			$table->string('upload_document', 100)->nullable();
			$table->string('owner', 100)->nullable();
			$table->string('acl', 50)->nullable();
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
		Schema::drop('patient_documents');
	}

}
