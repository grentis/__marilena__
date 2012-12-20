<?php

class Payment extends MyEloquent
{
  public static $timestamps = true;

  public static $rules = array(
    'value' => 'required'
  );

  public static $rules_messages = array(
    'value_required' => 'L\'importo è obbligatorio'
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
    return Payment::with(array('invoice', 'invoice.client'))->where_nested(function($query){
        $query->where('year', '<', date('Y'));
        $query->where_nested(function($query2) {
          $query2->where('year', '=', date('Y'));
          $query2->where('month', '<', date('m'));
        }, 'OR');
      }, 'AND')->where('paid', '=', 0)->order_by('year')->order_by('month')->get();
    //var_dump(DB::profile());
  }

  public static function get_by_index($index)
  {
    $date = Helper::get_date_by_index($index);
    return Payment::with(array('invoice', 'invoice.client'))->where('year', '=', date('Y', $date))->where('month', '=', date('m', $date))->get();
  }
}