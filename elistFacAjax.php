<html>
	<head>
		<title>Display all Equipment</title>
		<link rel="stylesheet" href="mycss.css">

		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"> </script>
		<script type="text/javascript">

var curr =null;

function saveDescComplete(xhr, status)
{

	if(status!='success')
	{
		status.innerHTML='Request not completed';
	}
	else
	{
		console.log($("#txtName").val());
		status.innerHTML=xhr.responseText;
		curr.innerHTML=$("#txtName").val();
	}
	curr=null;
	var obj= $.parseJSON(xhr.responseText);
	if (obj.results==0)
	{
		status.innerHTML=obj.message;
	}
	else {
		curr=$("#txtName").val();
		alert(obj.message);

	}

}


function saveDesc(uc)
{
	url='ajaxequip.php?cmd=2&uc='+uc+'&desc='+$("#txtName").val();
	$.ajax(url,
		{async:true,complete:saveNameComplete}
	)
}
function savelabloc(uc)
{

	url='ajaxequip.php?cmd=3&uc='+uc+'&labloc='+$("#txtName").val();
	$.ajax(url,
		{async:true,complete:saveNameComplete}
	)
}
		function saveName(uc)
		{

			url='ajaxequip.php?cmd=1&uc='+uc+'&name='+$("#txtName").val();
			$.ajax(url,
				{async:true,complete:saveNameComplete}
			)
		}


		function saveNameComplete(xhr, status)
		{

			if(status!='success')
			{
				status.innerHTML='Request not completed';
			}
			else
			{
				//console.log($("#txtName").val());
				status.innerHTML=xhr.responseText;
				curr.innerHTML=$("#txtName").val();

			}
			curr=null;
			console.log(xhr.responseText);
			var obj= $.parseJSON(xhr.responseText);
			if (obj.results==0)
			{
				status.innerHTML=obj.message;
			}
			else {
				curr=$("#txtName").val();
				alert(obj.message);

			}
		}

		function savelablocComplete(xhr, status)
		{

			if(status!='success')
			{
				status.innerHTML='Request not completed';
			}
			else
			{
				console.log($("#txtName").val());
				status.innerHTML=xhr.responseText;
				curr.innerHTML=$("#txtName").val();
			}
			curr=null;
			var obj= $.parseJSON(xhr.responseText);
			if (obj.results==0)
			{
				status.innerHTML=obj.message;
			}
			else {
				curr=$("#txtName").val();
				alert(obj.message);

			}


		}


		function editlabloc(obj,rid){
			curr=obj;
			var currentName=obj.innerHTML;
			obj.innerHTML="<input id='txtName' type='text'> <span  onclick='savelabloc("+rid+")'>save</span>";
			$("#txtName").val(currentName);
		}

		function editDesc(obj,rid){
			curr=obj;
			var currentName=obj.innerHTML;
			obj.innerHTML="<input id='txtName' type='text'> <span  onclick='saveDesc("+rid+")'>save</span>";
			$("#txtName").val(currentName);
		}
		function editName(obj,rid){
			curr=obj;
			var currentName=obj.innerHTML;
			obj.innerHTML="<input id='txtName' type='text'> <span  onclick='saveName("+rid+")'>save</span>";
			$("#txtName").val(currentName);
		}


		</script>

	</head>
	<body>

	    	<ul>
	    	<a ><img src="logo.png"width="200" height="50" align="left"></a>
	    <p align='right'>
	    	<br></br>
	    	<a   href="#" class="button1" >Home </a>
				<a  href="#" class="button1" >Logout </a>
	    </p>
	    </ul>
		<br></br>
		<br></br>
					<div id="divContent">
						<form action="" method="GET" class="searchbox_1">
			<input type="search" class="search_1" placeholder="Search" name="txtSearch" />
			<button type="submit" class="submit_1" value="search">&nbsp;</button>
			<div id="status"></div>
		</form>
<?php

include_once ("functions.php");
	$new=new functions;
	$check=$new->getEquipment();

	if ($check=false) {
	echo "false";
	}
	else {
		//echo "true";
	}


	if (isset($_REQUEST['txtSearch'])){
		$search=$new->searchEquipment($_REQUEST['txtSearch']);

	}
	else {
		$search=$new->getEquipment();
	}


	echo "<table class=TFtable border=1><tr >
	<td >EID</td>
	<td>BARCODE</td>
	<td>NAME</td>
	<td>LABID</td>
	<td>DATE RECEIVED</td>

	<td>STATUS</td>
	<td>DESCRIPTION</td>
	<td>LAB LOCATION</td>
	<td>LAB NAME</td>

	<td>DELETE EQUIPMENT</td>
	<td>EDIT EQUIPMENT</td>
	<td>BORROW EQUIPMENT</td>

	</tr>";


	while ($row=$new->fetch()){


			 echo "<tr >
				<td >{$row['EquipmentID']}</td>";
			echo "<td >{$row['Barcode']}</td>";
			echo "<td ondblclick='editName(this,{$row['EquipmentID']})'>{$row['EquipmentName']}</td>";
			echo "<td >{$row['LabID']}</td>";
			echo "<td >{$row['datereceived']}</td>";

		echo "<td >{$row['status']}</td>";
			echo "<td ondblclick='editDesc(this,{$row['EquipmentID']})'>{$row['DESCRIPTION']}</td>";
			echo "<td ondblclick='editlabloc(this,{$row['EquipmentID']})'>{$row['LABLOCATION']}</td>";
			echo "<td >{$row['LABNAME']}</td>";

			echo "<td bgcolor=white><a href='deleteorchange.php?id=".$row['EquipmentID']."'> Delete</a></td>";
			echo "<td bgcolor=white><a href='editEquipment.php?code=".$row['EquipmentID']." && bc=".$row['Barcode']." && ename=".$row['EquipmentName']." && lid=".$row['LabID']." && rec=".$row['datereceived']." && status=".$row['status']." && desc=".$row['DESCRIPTION']." && loc=".$row['LABLOCATION']." && name=".$row['LABNAME']."'>Edit</a></td>";
			echo "<td bgcolor=white><a href='mborrow.php?id=".$row['EquipmentID']." && status=".$row['status']."'>Borrow</a></td>


				</tr>";
		 }







echo "</table>";

?>
					</div>
				</td>
			</tr>
		</table>
		<div style="align center" >
<button class="button button2" style="vertical-align:middle" <a href='eupdate.php?id=".$row['EquipmentID']." && status=".$row['status']."' ><span>Submit </span></button>
</div>
	</body>
</html>
