<?php

/**
*Database connection helper
*/
include_once("setting.php");

/**
* Database connection helper class
*/
class adb{

	var $db=null;
	var $result=null;

	// var $conn=null;
	// var $data=null;

	function adb(){
	}
	/**
	*Connect to database
	*@return boolean ture if connected else false
	*/


	public function connect(){

		//connect
		//$this->db=new mysqli('localhost','ashesics_oos8746','8sk7qfps9xwv','ashesics_onyinye_oguego');
			$this->db=new mysqli('localhost','root','@1906','ashlabs');

		if($this->db->connect_errno){
			//no connection, exit
			return false;
		}
		return true;
	}

	/**
	*Query the database
	*@param string $strQuery sql string to execute
	*/
	function query($strQuery){
		if(!$this->connect()){
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

	/*
	* Fetch from the current data set and return
	*@return array one record
	*/
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

?>
