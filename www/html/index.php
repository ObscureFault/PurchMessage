<?php
  require '/var/external/flight/flight/Flight.php';
  require '../lib/PurchMessage.class.php';

// New Class that does all the actual work
  //Flight::set('flight.log_errors', true);


  Flight::route('GET /PurchDisplay/@timestamp', function($timestamp)
  {
    $purch = new PurchMessage();
    print "<h1>aaaaaaaaaaaa</h1>\n\n\n";
  //  $Purch->getPurchMessage($id);

  });

  Flight::route('POST /NewPURCH', function()
  {
    $purch = new PurchMessage();
    $_POST = (array) json_decode(urldecode(file_get_contents("php://input")));
    $purch->addMessage($_POST);
  });

  Flight::start();
?>