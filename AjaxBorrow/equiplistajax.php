<?php
/**
*check command
*/
if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
/**
* cmd=1
*/
	case 1:
/**
*else call function to borrow
*/
	viewEquipment();
	break;
	case 2:
/**
*else call function to borrow
*/
	changeEquipStatus();
	break;
	default:
/**
*if none is entered, send error message
*/
	echo "wrong command";
	break;
}
}

function viewEquipment(){
/**
*assign id to a variable
*/
	$equipmentID=$_REQUEST['eid'];
	include_once('functions.php');
/**
*create an object of users
*/	
	$obj=new functions();
/**
*call function to get equipment
*/
	$row=$obj->getEquipment("EquipmentID=$equipmentID");
	$row=$obj->fetch();
/**
*if query was unsuccessful
*/
	if($row==false){
/**
*send an error message
*/
		echo '{"result":0,"message":"error"}';
	}
	else{
/**
*if equipment id was right and query was successful, 
*/		
		echo '{"result":1,"equipment":';
/**
*send a json message
*/		echo json_encode($row);
		echo "}";
	}
}

function changeEquipStatus(){
/**
*check for id
*/
	if(!isset($_REQUEST['eid'])){
		echo '{"result":0,"message":"equipment code is not correct"}';
		return;
	}
	$equipmentID=$_REQUEST['eid'];
	include_once('functions.php');
	$obj=new functions();
/**
*call function
*/
	$row=$obj->getEquipment("EquipmentID=$equipmentID");
	$row=$obj->fetch();
	if($row==false){
		echo '{"result":0,"message":"equipment not found"}';
		return;
	}
/**
*if equipment is available
*/
	if($row["status"]=="Available"){
		$status=$row['status'];
/**
*call function to borrow and further change the status
*/
		$result=$obj->availEquipment($equipmentID,$status);
	}
	else{
/**
*this is the case where equipment is already borrowed, return false by default
*/		
		$result=false;
	}
/**
*if query was unsuccessful or equipment is already borrowed
*/
	if($result==false){
		echo '{"result":0,"message":"You cannot borrow a borrowed equipment"}';
	}
	else{
/**
*if query was successful
*/
		echo '{"result":1,"message":"Borrowed"}';
	}

}

?>
