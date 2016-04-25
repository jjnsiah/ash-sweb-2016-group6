<html>
<head>
	<title>Equipment List</title>
	<link rel="stylesheet" href="css.css">
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<script type="text/javascript">
	
	function viewEquip(obj,id){
		/**
		*send page to server with cmd and id
		*/
	$.ajax("equiplistajax.php?cmd=1&eid="+id,
		{async:true,
		complete:viewEquipComplete
		}
		);
		/**
		*set the current object
		*/
		currentObject=obj;
	}

	function viewEquipComplete(xhr, status){
		if(status!="success"){
			divStatus.innerHTML="error while getting information";
			return;
		}
	var obj=JSON.parse(xhr.responseText);
		if(obj.result==0){
			divStatus.innerHTML=obj.message;
		}
		else{
		/**
		*if status is okay
		*/
		divStatus.innerHTML="Equipment information retrieved";
		/**
		*then update the span
		*/
		currentObject.innerHTML="Equipment ID: "+obj.equipment.EquipmentID+" Barcode: "+obj.equipment.Barcode+" LabID: "+obj.equipment.LabID+" Date: "+obj.equipment.datereceived+" Lab Location: "+obj.equipment.LABLOCATION;	
		}
	currentObject=null;
}

	function changeStatus(obj,id){
		/**
		*send url to call function
		*/
	$.ajax("equiplistajax.php?cmd=2&eid="+id,
		{
		async:true,
		complete:changeStatusComplete
		}
		);
		currentObject=obj;
}

	function changeStatusComplete(xhr, status){
		/**
		*if calling of function was not successful
		*/
	if(status!="success"){
		divStatus.innerHTML="error while borrowing equipment";
		return;
	}
	var obj=JSON.parse(xhr.responseText);
	if(obj.result==0){
		/**
		*if function was not successful
		*/		divStatus.innerHTML=obj.message;
	}
	else{
		/**
		*if successful, set what is displayed in status
		*update current object
		*/
		divStatus.innerHTML="Equipment borrowed";
		currentObject.innerHTML=obj.message;
	}
	currentObject=null;
}

 </script>
</head>
<body>
	<ul>
	    <a><img src="logo.png"width="200" height="50" align="left"></a>
	    <p align='right'><br></br>
	    <a href="interface.html" class="button1">Home </a>
		<a href="interface.html" class="button1">Logout </a>
	    </p>
	</ul>
		<div id="divContent">
			<form action="" method="GET" class="searchbox_1">
				<input type="search" class="search_1" placeholder="Search" name="txtSearch" />
				<button type="submit" class="submit_1" value="search">&nbsp;</button>
			</form>
	<div class="status" id="divStatus" >Ready</div>
	<table class="TFtable" id="tableUsers" >
			<tr class='header'><td>NAME</td>
						<td>STATUS</td>
						<td>DESCRIPTION</td>
						<td>LAB NAME</td>
						<td>change status</td>
						<td>view more</td>

			</tr>	
		</div>		

<?php
	include_once("functions.php");
	$obj = new functions();
	$result=$obj->getEquipment();
	$row=$obj->fetch();
	while($row==true){
			echo"<tr  width='100%'>
				<td >{$row['EquipmentName']}</td>
				<td >{$row['status']}</td>
				<td >{$row['DESCRIPTION']}</td>
				<td >{$row['LABNAME']}</td><td>
				<span onclick='changeStatus(this,{$row['EquipmentID']})'>{$row['status']}</span>
				<td><span onclick='viewEquip(this,{$row['EquipmentID']})'><button> view</button></span></td>
				</tr>";
			$row=$obj->fetch();
	}
?>

	</table>
</body>
</html>
