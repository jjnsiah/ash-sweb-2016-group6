<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "no command has been specified";
		exit();
	}


	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			deleteEquipment();		//if cmd=1 the call delete
			break;
		case 2:
			//if cmd=2 , call a different method
			break;
		case 3:
			//if cmd=3 , call a different method
			break;
		default:
			echo "cmd is not executable";	//change to json message
			break;
	}
	/**
	*delete equipment
	*@param int barcode the equipment code to be deleted
	*returns JSON object result 0 if barcode is received
	*/
	function deleteEquipment(){
		//check if there is an equipment barcode
		if(!isset($_REQUEST['bc'])){
			echo '{"result":0,"message":"Barcode not provided"}';	//change to json message	
			exit();
		}
		
		$barcode=$_REQUEST['bc'];
		include("functions.php");
		$obj=new functions();
		//delete the equipment
		$action = $obj->deleteEquipment($barcode);
		if($action != false){
			echo '{"result":1,"message":"equipment deleted"}';
		}
		else{
			echo '{"result":1,"message":"equipment not deleted"}';
		}
	}
?>