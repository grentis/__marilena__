<?php

class Payment extends MyEloquent
{
  public static $timestamps = true;

  public static $rules = array(
    'value' => 'required'
  );

  public function invoice()
  {
    return $this->belongs_to('Invoice');
  }

  public function expired()
  {
    return date('Y') >= $this->year && date('m') > $this->month && !$this->paid;
  }

  public static function get_by_index($index)
  {
    $date = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "+" . $index . " month");
    return Payment::with(array('invoice', 'invoice.client'))->where('year', '=', date('Y', $date))->where('month', '=', date('m', $date))->get();
  }
}