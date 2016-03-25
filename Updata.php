<?php
include_once("functions.php");
	
	$user1= new functions();
	
	if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$barcode=$_REQUEST['Barcode'];
	
	$ename=$_REQUEST['EquipmentName'];
	$lid=$_REQUEST['LabID'];
	$rec=$_REQUEST['datereceived'];
	$status=$_REQUEST['status'];
	$desc=$_REQUEST['DESCRIPTION'];
	$loc=$_REQUEST['LABLOCATION'];
	$name=$_REQUEST['LABNAME'];
	
		
	}
	else {
		exit;
	}
		$check=$user1->editEquipment($id,$barcode,$ename,$lid,$rec,$status,$desc,$loc,$name);		
	if ($check=true){
		echo "Equipment successfully updated";
		header("Location: elistFac.php");	
	}
	else {
		echo "error";
	
	}
	
		

?>