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
		*store the fetched info in new variables 
		*/
		var id=obj.equipment.EquipmentID;
		var code=obj.equipment.Barcode;
		var name=obj.equipment.EquipmentName;
		var date=obj.equipment.datereceived;
		var status=obj.equipment.status;
		var lid=obj.equipment.LabID;
		var desc=obj.equipment.DESCRIPTION;
		var loc=obj.equipment.LABLOCATION;
		var lname=obj.equipment.LABNAME;
		/**
		*To create the modal
		*/
		var modal = document.getElementById('myModal');
		var modalInfo="";
		modalInfo+="<div class='modal-content'><div class='modal-header'><h3><Equipment Details></h3><span class='close'>×</span></div><div class=modal-body><table border=1><tr><td>EID</td><td>BARCODE</td><td>NAME</td><td>LABID</td><td>DATE RECEIVED</td><td>STATUS</td><td>DESCRIPTION</td><td>LAB LOCATION</td><td>LAB NAME</td></tr><tr><td>"+id+"</td><td>"+code+"</td><td>"+name+"</td><td>"+lid+"</td><td>"+date+"</td><td>"+status+"</td><td>"+desc+"</td><td>"+loc+"</td><td>"+lname+"</td></tr></table></div><div class='modal-footer'><h3> detail of Equipment</h3></div></div>"
		;
		modal.innerHTML=modalInfo;
		modal.style.display="block";

		/**
		*Get the button that opens the modal
		*/
		var btn = document.getElementById("myBtn");

		/**
		*Get the <span> element that closes the modal
		*/
		var span = document.getElementsByClassName("close")[0];
		/**
		*When the user clicks the button, open the modal 
		*/
		btn.onclick = function() {
		modal.style.display = "block";
		}
		/**
		*When the user clicks on <span> (x), close the modal
		*/
		span.onclick = function() {
			modal.style.display = "none";
		}
		/**
		*When the user clicks anywhere outside of the modal, close it
		*/
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	}
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
						<td>STATUS</td>

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
				<span onclick='changeStatus(this,{$row['EquipmentID']})'>{$row['status']}</span><br><br>
				<td><span onclick='viewEquip(this,{$row['EquipmentID']})'><button id='myBtn'>view</button></span></td>
				</tr>";
			$row=$obj->fetch();
	}
?>
	</table>
	
<?php echo "<div id='myModal' class='modal'></div>; "?>

</body>
</html>
