<?php
include 'common.php';

class PurchMessage
{
    //Const?
    private $_config = '';
    private $_db;

    private $_newFields = array("NAME", "MESSAGE","PURCHASE_COUNT","PURCHASE_SUMMARY","PURCHASE_IMAGE_URL");
 
    /*
      Construct
      Connect to DB
    */
    public function __construct()
    {
      $this->_config = load_config();

      try {
        $this->_db = new PDO("mysql:host=".$this->_config['database']['hostname'].";dbname=".$this->_config['database']['dbame'], $this->_config['database']['username'], $this->_config['database']['password']);
      } catch (Exception $pe) {
        print_r($pe);
      }

    }


    
    /*
      New Message from Customer
      Save to DB
    */
    public function addMessage($data)
    {
      //validate fields have data correct
      foreach ($this->_newFields as $field)
      {
        if ( !isset($data[$field]) )
        {
          return 0;
        }
      }

      $res = 0;
      $sql = "INSERT INTO PURCH_MSG (NAME,MESSAGE,PURCHASE_COUNT,PURCHASE_SUMMARY,PURCHASE_IMAGE_URL) VALUES (:NAME, :MESSAGE, :PURCHASE_COUNT,:PURCHASE_COUNT,:PURCHASE_IMAGE_URL)";
      try {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute($data);
        $res = $stmt->rowCount();
 
      } catch (Exception $e) {
        print_r($e);
      }
      return $res;
    }

    /*
      Save Response to Message
    */
    public function updateResponse($id, $resonseText)
    {
      //validate fields are correct
      $data = array(PURCH_ID => $id, RESPONSE => $resonseText);
      
      $sql = "UPDATE PURCH_MSG SET RESPONSE = :RESPONSE, RESPONSE_STAMP = NOW() WHERE PURCH_ID = :PURCH_ID";
      $res = 0;
      try {
        $stmt= $this->_db->prepare($sql);
        $stmt->execute($data);
        $res = $stmt->rowCount();
      } catch (Exception $e) {
        print_r($e);
      }
      return $res;
    }

    /*
      return the ID, URL, message  after start date
      List of new messages to be reviewed 
      */
    public function replyRequired($recCount=20)
    {
      $res = array();

      $sql = "SELECT PURCH_ID, NAME, MESSAGE, PURCHASE_COUNT,PURCHASE_SUMMARY,PURCHASE_IMAGE_URL ";
      $sql .= "FROM PURCH_MSG,PURCH_ACTIVE WHERE PURCH_ACTIVE.ACTIVE = 1 AND PURCH_MSG.CREATED_STAMP >= PURCH_ACTIVE.ACTIVE_STAMP ";
      $sql .= "AND RESPONSE_STAMP is null AND ONSCREEN_STAMP is null AND CURATED_COMPLETE_STAMP is null";
 
      try {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) 
        {
          $res = $row['ACTIVE']; 
          break;
        }
      } catch (Exception $e) {
        print_r($e);
      }
      return $res;

    }

    
    

    /*
      return the URL, message and response
      after start date
    */
    public function nextForDisplay()
    {



    }










/*
  SERVICE ACTIVATION
*/

    /*
      Determines id the Servce is running
    */
    public function getActive()
    {
      $res = 0;
      $sql = "SELECT ACTIVE FROM PURCH_ACTIVE WHERE ACTIVE_STAMP < now() AND ACTIVE = 1";
      try {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) 
        {
          $res = $row['ACTIVE']; 
          break;
        }
      } catch (Exception $e) {
        print_r($e);
      }
      return $res;
    }

    /*
      Activate
    */
    public function setActive()
    {
      if ( $this->getActive() )
        return 0;

      $sql = "INSERT INTO PURCH_ACTIVE (ACTIVE) VALUES (1)";
      try {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        $res = $stmt->rowCount(); 
      } catch (Exception $e) {
        print_r($e);
      }
      return $res;
    }

    /*
      Disable Service
         Sets ALL  ACTIVE values to 0
    */
    public function deactivate()
    {
      $sql = "UPDATE PURCH_ACTIVE SET ACTIVE = 0";
      $res = 0;
      try {
        $stmt= $this->_db->prepare($sql);
        $stmt->execute();
        $res = $stmt->rowCount();
      } catch (Exception $e) {
        print_r($e);
      }
      return $res;
    }


}
?>