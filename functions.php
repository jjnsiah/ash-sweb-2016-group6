<?php
/**
*/
include_once("adb.php");
/**
*Functions  class
*/
class functions extends adb{
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
	function addEquipment($id,$name,$barcode,$datereceived,$supplierid,$status){
		$strQuery="insert into allequipment set
						id=$id,
						name='$name',
						barcode='$barcode',
						datereceived=$datereceived,
						supplierid=$supplierid,
						status='$status'";
		return $this->query($strQuery);
	}
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getEquipment($filter=false){
		$strQuery="select * from equipment";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
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
			$filter="name like '%$text%' or barcode like '%$text%' or status like '%$text%' or id like '%$text%' ";
		}

		return $this->getEquipment($filter);
		echo $text;
	}

	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteEquipment($id){
		//query
	$strQuery="delete from allequipment where id=$id";
	return $this->query($strQuery);
	}

	function availEquipment($id,$status){
		//query
		if ($status=='Available'){
			$strQuery="update allequipment set status= 'Borrowed' where id=$id";
		}
		else{
		$strQuery="update allequipment set status='Available' where id=$id";
		}
	return $this->query($strQuery);
	}

	/*in case of an error come and change the updating of the id
	*/
		function editEquipment($id,$name,$barcode,$datereceived,$supplierid,$status){
	$strQuery="update user set

						id='$id',
						name='$name',
						barcode=$barcode,
						datereceived='$datereceived',
						supplierid=$supplierid,
						status='$status' where id=$id";
						echo $strQuery;
			return $this->query($strQuery);
		}

		function getOldEquipment($id){
			$entered=$id;
			if ($entered=true){
			$filter="id= $entered";
			}
			else{
				echo "No id has been entered";
			}
			$this->getEquipment($filter);
		}

		
	function getUserByCode($uid){
		$strQuery="select uid, username, firstname,lastname from users where uid=$uid";
		return $this->query($strQuery);
	}
}
?>
