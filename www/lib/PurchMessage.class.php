<?php 
include 'common.php';

class PurchMessage
{
    //Const?
    private $config = '';

    private $newFields = array("Name", "Message","PurchaseCount","PurchaseSummary","ImageURL");

    public function __construct()
    {
      $config  = load_config();  
print_r($config);
      try {
        $this->db = new PDO("mysql:host=".$config['database']['hostname'].";dbname=".$config['database']['dbame'], $config['database']['username'], $config['database']['password']);
  
      } catch (PDOException $pe) { 
       
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