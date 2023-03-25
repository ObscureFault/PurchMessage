<?php
require '/var/external/flight/flight/Flight.php';
require '../lib/PurchMessage.class.php';


// New Class that does all the actual work
$Purch = new();

/*
  /
*/
Flight::route('GET /PURCH/@id', function($id)
{
  print "aaaaaaaaaaaa";

//  $Purch->getPurchMessage($id);


});



Flight::route('POST /', function(){
  //  echo 'I received a POST request.';
});





?>