<?php
	//check for user code
	
	include_once("functions.php");
	
	$newDel= new functions();
	
	if(isset($_REQUEST['status'])){
	
	
		$status=$_REQUEST['status'];
		$id=$_REQUEST['id'];
		$check=$newDel->availEquipment($id,$status);	
		
		if ($check==true){
			header("Location: elist.php");	
		}
	
	else 
	{
		echo 'false';
	}
		}

	else{
		$id=$_REQUEST['id'];
		$check=$newDel->deleteEquipment($id);		
	if ($check==true){
		header("Location: elist.php");	
	}
	}

?>