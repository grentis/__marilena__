<?php

class Month_Controller extends Base_Controller 
{

  public function action_load($index)
  {
    $payments = Payment::get_by_index($index);
    return View::make('partials.month.payments')->with('payments', $payments);
  }

}