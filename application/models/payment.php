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

  public function get_number() {
    $payments = $this->invoice->payments;
    foreach ($payments as $key => $payment) {
      if ($payment->id == $this->id) {
        return (object) array('num' => $key + 1, 'tot' => count($payments));
      }
    }
    return (object) array('num' => 1, 'tot' => 1);
  }

  public static function get_expired() {
    return Payment::with(array('invoice', 'invoice.client'))->where('year', '<=', date('Y'))->where('month', '<', date('m'))->where('paid', '=', FALSE)->order_by('year')->order_by('month')->get();
  }

  public static function get_by_index($index)
  {
    $date = Helper::get_date_by_index($index);
    return Payment::with(array('invoice', 'invoice.client'))->where('year', '=', date('Y', $date))->where('month', '=', date('m', $date))->get();
  }
}