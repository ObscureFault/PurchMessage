<?php
//VARS ???

  $GLOBALS[DB_USER] = 'purch'; 
  $GLOBALS[DB_PASS] = 'purch'; 


function elog($msg)
{
  $str = '';
  if( gettype($msg) != "string" )
  {
    ob_start();
    print_r($msg);
    $str = ob_get_contents();
    ob_end_clean(); 
  }
  else
  {
    $str = $msg;
  }

  
  error_log(0,$str);
}
?>