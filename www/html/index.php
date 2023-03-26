<?php
  require '/var/external/flight/flight/Flight.php';
  require '../lib/PurchMessage.class.php';

// New Class that does all the actual work
  //Flight::set('flight.log_errors', true);


  Flight::route('GET /PurchDisplay/@timestamp/@id', function($timestamp,$id)
  {
    $purch = new PurchMessage();
    print "<h1>aaaaaaaaaaaa</h1>\n\n\n";
  //  $Purch->getPurchMessage($id);

  });
  
  Flight::route('POST /PURCH/New/', function()
  {
    $purch = new PurchMessage();
    echo $purch->active();
    $_POST = (array) json_decode(urldecode(file_get_contents("php://input")));
    $purch->addMessage($_POST);
  });




  Flight::route('POST /PurchNew/', function()
  {
    $purch = new PurchMessage();
    $_POST = (array) json_decode(urldecode(file_get_contents("php://input")));
    $purch->addMessage($_POST);
  });

  Flight::route('POST /PurchResponse/', function()
  {
    $purch = new PurchMessage();
    $_POST = (array) json_decode(urldecode(file_get_contents("php://input")));
    $purch->addMessage($_POST);
  });



  Flight::route('POST /PurchActivate', function()
  {
    $purch = new PurchMessage();
    $res = array('STATUS' => $purch->setActive() );

    Flight::json($res);
  });

  Flight::route('POST /PurchDeactivate', function()
  {
    $purch = new PurchMessage();
    $res = array('STATUS' => $purch->deactivate() );

    Flight::json($res);
  });



  Flight::start();
?>


