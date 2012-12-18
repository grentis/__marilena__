<?php

class Create_Invoices_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function($table) {
    	$table->increments('id');
    	$table->timestamps();
    	$table->string('number');
    	$table->date('date');
    	$table->float('total')->default(0);
    	$table->text('note')->nullable();

    	$table->integer('client_id')->unsigned();
    	$table->foreign('client_id')->references('id')->on('clients');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}