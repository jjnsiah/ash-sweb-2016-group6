<?php
/**
*REJOICE HORMEKU**
*My configuration page 
*/

/**
*Settings class which contains all functions called by program
*/
class settings
{
/**
*Declaration of global variables
*/
	var $db=null;
	var $result=null;
/**
*Connect function which connects to the database
*If database is empty, return false
*else return true
*/
function connect(){
$this->db=new mysqli("localhost","root","@1906","user");

if ($this->db==null){
			return false;
		}
		if($this->db->connect_errno){
			return false;
			
		}
		return true;
}

/**
*Query function which is called to run sql statements
*It first of connects to the database and checks if database is empty
*if database is empty, return false, else run the query 
*/
function query($strQuery){
	
		if(!$this->connect()){
			echo "Not able to";
			return false;
		}
		if($this->db==null){
			echo "Empty";
			return false;
		}
		$this->result=$this->db->query($strQuery);
		if($this->result==false){
			return false;
		}
		return true;
	}

/**
*Function to fetch cloumns and values 
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
 ?>
