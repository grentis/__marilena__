<?php

class Create_Payments_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function($table) {
    	$table->increments('id');
    	$table->timestamps();
    	$table->integer('year');
    	$table->integer('month');
    	$table->float('value')->default(0);
    	$table->boolean('paid')->default(FALSE);
    	$table->text('note')->nullable();

    	$table->integer('invoice_id')->unsigned();
    	$table->foreign('invoice_id')->references('id')->on('invoices');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments');
	}

}