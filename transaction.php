<?php
//Database connect helper
include_once("setting.php");

class transaction{
  var $db=null;
  var $result=null;

function transaction(){

}

function connectToDB(){
  $this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
  if($this->db->connect_errno){
    echo "Connection error";

    return false;
  }
  //echo "Database Connected";
  return true;
}

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

function fetch(){
  //Complete this funtion to fetch from the $this->result
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
$obj= new transaction();
$obj->connectToDb();

//test code for query and fetching
$obj->transactionQuery();
print_r($obj->fetch());


?>