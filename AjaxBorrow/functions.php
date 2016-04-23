<?php
/**
*/
include_once("adb2.php");
/**
*Functions  class
*/
class functions extends adb2{
	function functions(){
	}
	/**
	*Adds a new user
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param int permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false
	*/
	
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getEquipment($filter=false){
		
		$strQuery= "select * from equipment";
		
		if($filter!=false){
			
			$strQuery=$strQuery. " where $filter";
		}
		
			
		return $this->query($strQuery);

	}


	/**
	*Searches for user by username, fristname, lastname
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchEquipment($text=false){
		$filter=false;
		if($text!=false){
			$filter="EquipmentName like '%$text%' or Barcode like '%$text%' or status like '%$text%' or EquipmentID like '%$text%' ";
		}

		return $this->getEquipment($filter);
		
	}

	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteEquipment($id){
		//query
	$strQuery="delete from equipment where EquipmentID=$id";
	return $this->query($strQuery);
	}

	function availEquipment($id,$status){
		//query
		if ($status=='Available'){
			$strQuery="update equipment set status= 'Borrowed' where EquipmentID=$id";
			//$query="SELECT INTO borrow 
		}
		else{
		echo "Equipment already borrowed";
		exit;
		}
	return $this->query($strQuery);
	}

	/*in case of an error come and change the updating of the id
	*/
		function editEquipment($id,$barcode,$ename,$lid,$rec,$status,$desc,$loc,$name){
	$strQuery="update equipment set

						EquipmentID= $id,
						Barcode= $barcode,
						EquipmentName='$ename',
						LabID=$lid,
						datereceived= $rec,
						status='$status'
						Description= '$desc',
						Location= '$loc',
						LabName= '$name' 
						where EquipmentID=$id";
						
						
			return $this->query($strQuery);
		}

		function getOldEquipment($id){
			$text=$id;
			if ($text==true){
			$filter="EquipmentID= $text";
			}
			else{
				echo "No id has been entered";
			}
			//echo $filter;
			$this->getEquipment($filter);
		}


	
}
?>
