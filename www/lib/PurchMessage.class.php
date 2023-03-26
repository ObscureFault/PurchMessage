<?php 
include 'common.php';

class PurchMessage
{
    //Const?
    private $_config = '';
    private $_db;
   
    private $newFields = array("Name", "Message","PurchaseCount","PurchaseSummary","ImageURL");

    public function __construct()
    {
      $this->_config  = load_config();  
print_r($this->_config);
      try {
        $this->_db = new PDO("mysql:host=".$this->_config['database']['hostname'].";dbname=".$this->_config['database']['dbame'], $this->_config['database']['username'], $this->_config['database']['password']);
  
      } catch (PDOException $pe) { 
       print_r($pe);
      }
    }

    public function addMessage($data)
    {
      //validate fields are correct
      foreach ($this->newFields as $field)
      {
        if ( !is_set($data[$field]) )
        {
          return 0;
        }
      }

      $sql = "INSERT INTO PURCH_MSG (NAME,MESSAGE,PURCHASE_COUNT,PURCHASE_SUMMARY,PURCHASE_IMAGE_URL) VALUES (:Name, :Message, :PurchaseSummary, :ImageURL)";
      $stmt= $this->db->prepare($sql);
      $stmt->execute($data);

    }

    /*
      return the URL, message  after start date
    */
    public function replyRequired($startDate)
    {
       
    }

    /*
      return the URL, message and response
      after start date
    */
    public function nextForDisplay($startDate)
    {

    }


}
?>