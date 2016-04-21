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
	
?>