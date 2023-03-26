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
    $purch->updateResponse($_POST);
  });


  Flight::route('GET /ReplyRequired/', function()
  {
    $purch = new PurchMessage();
    $res = $purch->ReplyRequired();
    Flight::json($res);
  });



/*
Display Functions
*/
  Flight::route('GET /PurchDisplayNext/', function()
  {
    $purch = new PurchMessage();
    $res = $purch->nextForDisplay();
    Flight::json($res);
  });

  Flight::route('GET /PurchDisplayUpdate/@id', function($id)
  {
    $purch = new PurchMessage();
    $res = array(STATUS => $purch->updateDisplayed($id) );

    Flight::json($res);
  });



/*
Activation Functions
*/




  Flight::route('GET /PurchActivate', function()
  {
    $purch = new PurchMessage();
    $res = array('STATUS' => $purch->setActive() );

    Flight::json($res);
  });

  Flight::route('GET /PurchDeactivate', function()
  {
    $purch = new PurchMessage();
    $res = array('STATUS' => $purch->deactivate() );

    Flight::json($res);
  });



  Flight::start();
?>


