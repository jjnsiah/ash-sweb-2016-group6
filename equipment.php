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
	*@param string name equipment name
	*@param string barcode equipment barcode
	*@param string desc equipment description
	*@param string labName name of lab
	*@param string labLocation location of lab
	*@param int dateAdded date equipment was added
	*@return boolean returns true if successful or false 
	*/
	function addEquipment($name,$barcode,$desc,$dateAdded,$labName,$labLocation){
		
		
		$strQuery="insert into equipments set 
				NAME='$name', 
				BARCODE='$barcode',
				DESCRIPTION='$desc',
				DATE='$dateAdded',
				LABNAME='$labName',
				LABLOCATION='$labLocation'";
		return $this->query($strQuery);				
	}
	/**
	*gets equipment records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getUsers($filter=false){
		$strQuery="select NAME,BARCODE,DESCRIPTION,DATE,LABNAME,LABLOCATION";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
}
?>