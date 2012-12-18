<?php

class Client extends MyEloquent 
{
  public static $timestamps = true;

  public function invoices()
  {
    return $this->has_many('Invoices');
  }
}