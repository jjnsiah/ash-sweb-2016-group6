<?php

if (isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
		addEquip();
		break;
		default;
		echo "wrong command";
		break;
	}
}
function addEquip(){
	if(!isset($_REQUEST['name'])){
		exit();		
		//if no data, exit
	}
	
	//print_r($_REQUEST);
	$name=$_REQUEST['name'];
	$barcode=$_REQUEST['barcode'];
	$desc=$_REQUEST['desc'];
	$labName=$_REQUEST['labName'];
	$labLocation=$_REQUEST['labLocation'];
	$dateAdded=$_REQUEST['dateAdded'];
	
	include_once("equipment.php");
	$obj=new equipment();
	$r=$obj->addEquipment($name,$barcode,$desc,$dateAdded,$labName,$labLocation);
	
	//Print message
	if($r==false){
		$strStatusMessage="error while adding Equipment";
		
		}else{
		$strStatusMessage="$name added";
		}
		echo $strStatusMessage;
	
	
	}
	
?>