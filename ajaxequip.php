<?php
if(!isset($_REQUEST['cmd'])){
echo "cmd is not provided";
exit();

}
	$cmd=$_REQUEST['cmd'];
  switch($cmd){
case 1:
changeEquipName();
case 2:
changeEquipDesc();
break;
default:
echo "wrong cmd";

}

function changeEquipName(){
  if(!isset($_REQUEST['uc'])){
    echo "{'message':'No usercode','results':0}";
    return;
}


include_once("functions.php");
$obj= new functions();
$newName=$_REQUEST['name'];
$usercode=$_REQUEST['uc'];
if($obj->updateName($usercode,$newName))
{
  echo "equipment name changed successfully";
}
else {
  echo "equipment name changed unsuccessfully";
}

}

function changeEquipDesc(){
  if(!isset($_REQUEST['uc'])){
    echo "{'message':'No usercode','results':0}";
    return;
}


include_once("functions.php");
$obj= new functions();
$newDesc=$_REQUEST['desc'];
$usercode=$_REQUEST['uc'];
if($obj->updateDesc($usercode,$newDesc))
{
  echo "equipment Description changed successfully";
}
else {
  echo "equipment Description changed unsuccessfully";
}

}







 ?>
