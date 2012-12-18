<?php

class Invoice extends MyEloquent 
{
  public static $timestamps = true;

  public function client()
  {
    return $this->belongs_to('Client');
  }

  public function payments()
  {
    return $this->has_many('Payments');
  }
}