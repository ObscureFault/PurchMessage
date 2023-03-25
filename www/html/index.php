<?php
  require '/var/external/flight/flight/Flight.php';
  require '../lib/PurchMessage.class.php';


  // New Class that does all the actual work
  $Purch = new PurchMessage();

  /*
    /
  */
  Flight::route('GET /PURCH/@id', function($id)
  {
    print "<h1>aaaaaaaaaaaa</h1>";

  //  $Purch->getPurchMessage($id);


  });



  Flight::route('POST /', function()
  {
    



  });





?>