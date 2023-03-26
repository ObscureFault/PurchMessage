<?php
  require '/var/external/flight/flight/Flight.php';
  require '../lib/PurchMessage.class.php';

  // New Class that does all the actual work
  $Purch = new PurchMessage();

  //Flight::set('flight.log_errors', true);

  Flight::route('GET /PURCH/@id', function($id)
  {
    print "<h1>aaaaaaaaaaaa</h1>\n\n\n";
  //  $Purch->getPurchMessage($id);


  });



  Flight::route('POST /NewPURCH', function()
  {
    $request = Flight::request();
    if ( isset($request->data) )
    {
      $Purch->addMessage($request->data);
    }

  });

  Flight::start();
?>
