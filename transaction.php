<?php
//Database connect helper
include_once("setting.php");

//Transaction class is a class that interacts with the database for transactions
class transaction{
  var $db=null;
  var $result=null;

//Constructor
function transaction(){

}
	/**Connect to database
	*@return boolean true if connected else false
	*/
function connectToDB(){
  $this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
  if($this->db->connect_errno){
    echo "Connection error";

    return false;
  }

  return true;
}
/**Query the database
*@return boolean true if query is successful
*/
function transactionQuery(){
  $strQuery="Select * from Transaction";
  if(!$this->connectToDB()){
    return false;
  }
  if($this->db==null){
    return false;
  }
  $this->result=$this->db->query($strQuery);
  if($this->result==false){
    return false;
  }
  return true;
}

/*Fetches data from the database
*@return boolean true if fetching is successful
*/
function fetch(){

  if($this->result==null){
    return false;
  }

  if($this->result==false){
    return false;
  }

  return $this->result->fetch_assoc();
}



}

//test code for database connection
//$obj= new transaction();
//$obj->connectToDb();

//test code for query and fetching
//$obj->transactionQuery();
//print_r($obj->fetch());


?>
