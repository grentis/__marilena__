<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public $layout = 'layout.common';


	public function action_index()
	{
		$expired = Payment::get_expired();
		$this->layout->nest('content', 'home.index', array('all_expired' => $expired));
	}

	public function action_dati() {
		/*$clients = array('stefano', 'silvia', 'tommaso');
		foreach ($clients as $client) {
			$c = new Client();
			$c->name = $client;
			$c->save();
		}*/

		$invoice = new Invoice();
		$invoice->number = '2/a';
		$invoice->date = date('Y-m-d');
		$invoice->note = 'da pagare in 50 giorni';
		$invoice->client_id = 1;
		$invoice->save();

		$payment = new Payment();
		$payment->value = 125;
		$payment->month = 10;
		$payment->year = 2012;
		$payment->invoice_id = 2;
		$payment->paid = FALSE;
		$payment->save();
		return "ok";
	}

}