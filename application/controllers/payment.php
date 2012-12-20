<?php

class Payment_Controller extends Base_Controller 
{

  public function action_new($index)
  {
    $d = Helper::get_date_by_index($index);
    $payment = new Payment(array(
      'month' => date('m', $d),
      'year' => date('Y', $d)
    ));
    return View::make('partials.payment.form', array('payment' => $payment));
  }

  public function action_create()
  {
    $input_payment = Input::get('payment');
    $payment = new Payment($input_payment);
    if ($payment->save()) {
      echo "salvato";
    } else {
      return View::make('payment.reload_form', array('payment' => $payment));
    }
  }

}