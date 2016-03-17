<?php
include_once("adb.php");
	/** This is the equipment file which would hold the file
	*The equipment class
	*The class is used to manage the equipments of the class
	*/
class equipment extends adb{
	function equipment(){
	}
	/**
	*Adds a new equipment
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param int permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false 
	*/
	function addUser($username,$firstname='none',$lastname='none',$password='none',$usergroup=0,$permission=1){
		
		if($status=1){
			$status = "ENABLED";
		}
		else {
			$status = "DISABLED";
		}
		$strQuery="insert into users set
						USERNAME='$username',
						FIRSTNAME='$firstname',
						LASTNAME='$lastname',
						PWORD=MD5('$password'),
						PERMISSION=$permission,
						USERGROUP=$usergroup,
						STATUS=$status";
		return $this->query($strQuery);				
	}
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getUsers($filter=false){
		$strQuery="select USERCODE,USERNAME,FIRSTNAME,LASTNAME,PERMISSION,users.USERGROUP,STATUS,PERMISSION+0 as NPERMISSION,STATUS+0 as NSTATUS from users left join usergroups on users.USERGROUP=usergroups.GROUP_ID";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
?>