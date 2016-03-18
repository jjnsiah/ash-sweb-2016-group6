<?php

/**
* Database connection helper class
*/
class adb{
	
	var $conn=null;
	var $data=null;
	function adb(){
	}
	/**
	*Connect to database 
	*@return boolean ture if connected else false
	*/
	public function connect(){
		
		//connect
		//$this->db=new mysqli('localhost','ashesics_oos8746','8sk7qfps9xwv','ashesics_onyinye_oguego');
			$this->conn=new mysqli('localhost','root','','ashlabs');

		if($this->conn->connect_errno){
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
		if($this->conn==null){
			$this->connect();
			
		}
		
		$this->data=$this->conn->query($strQuery);
		if($this->data!=null){
			return true;
		} else{
		return false;
		}
	}
	/*
	* Fetch from the current data set and return
	*@return array one record
	*/
	function fetch(){
		//Complete this funtion to fetch from the $this->result
		if($this->data!=null){
			return $this->data->fetch_assoc();
		}else{
			return false;
		}
		
	}
}
/*
This is a test code
$obj=new adb();
if(!$obj->query("select * from equipments"))
{
	echo "error";
	exit();
}
print_r($obj->fetch());
*/
?>