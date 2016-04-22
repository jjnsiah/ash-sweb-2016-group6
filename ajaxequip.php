<?php
if(!isset($_REQUEST['cmd'])){
echo "cmd is not provided";
exit();

}
	$cmd=$_REQUEST['cmd'];
  switch($cmd){
case 1:
changeEquipName();
break;
case 2:
changeEquipDesc();
break;
case 3:
changeLabloc();
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
  echo' {"message":"Successfully changed equipment name","results":1}';
}
else {
  echo' {"message":"Unsuccessfully changed equipment name","results":0}';
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
  echo' {"message":"Successfully changed equipment description","results":1}';
}
else {
  echo' {"message":"Unsuccessfully changed equipment description","results":0}';
}

}


function changeLabloc(){
  if(!isset($_REQUEST['uc'])){
    echo "{'message':'No usercode','results':0}";
    return;
}


include_once("functions.php");
$obj= new functions();
$newlabloc=$_REQUEST['labloc'];
$usercode=$_REQUEST['uc'];
if($obj->updatelablocation($usercode,$newlabloc))
{
  echo' {"message":"Successfully changed lab location","results":1}';
}
else {
  echo' {"message":"Unsuccessfully changed lab location","results":0}';
}

}






 ?>
