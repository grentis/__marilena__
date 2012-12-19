<?php

class Helper {

  public static function get_date_by_index($index)
  {
    return strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "+" . $index . " month");
  }

  public static function month_as_string($month_index = 0) 
  {
    switch ($month_index) 
    {
      case '1': return "Gennaio";
      case '2': return "Febbraio";
      case '3': return "Marzo";
      case '4': return "Aprile";
      case '5': return "Maggio";
      case '6': return "Giugno";
      case '7': return "Luglio";
      case '8': return "Agosto";
      case '9': return "Settembre";
      case '10': return "Ottobre";
      case '11': return "Novembre";
      case '12': return "Dicembre";
    }
  }

  public static function write_double($value = 0) 
  {
    return number_format($value, 2, ",", ".");
  }

  public static function write_currency($value = 0) 
  {
    return Helper::write_double($value) . " €";
  }

  public static function scriptify($string) 
  {
    $string = str_replace(array("\r\n", "\r"), "\n", $string);
    $lines = explode("\n", $string);
    $new_lines = array();

    foreach ($lines as $i => $line) 
    {
      if(!empty($line))
        $new_lines[] = trim($line);
    }
    return str_replace(array("\r\n", "\r"), "", str_replace('"',"'", implode($new_lines)));
  }
}