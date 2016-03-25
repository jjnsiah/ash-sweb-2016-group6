<html>
	<head>
		<title>Display all Equipment</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Ash-Labs Equipment List
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
					<form action="" method="GET">
						<input type="text" name="txtSearch">
						<input type="submit" value="search" >
					</form>
<?php

include_once ("functions.php");
	$new=new functions;
	$check=$new->getEquipment();

	if ($check=false) {
	echo "false";
	}
	else {
		echo "true";
	}


	if (isset($_REQUEST['txtSearch'])){
		$search=$new->searchEquipment($_REQUEST['txtSearch']);

	}
	else {
		$search=$new->getEquipment();
	}


	echo "<table  border=1><tr >
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


			 echo "<tr bgcolor=lightblue>
				<td >{$row['EquipmentID']}</td>";
			echo "<td >{$row['Barcode']}</td>";
			echo "<td >{$row['EquipmentName']}</td>";
			echo "<td >{$row['LabID']}</td>";
			echo "<td >{$row['datereceived']}</td>";

		echo "<td >{$row['status']}</td>";
			echo "<td >{$row['DESCRIPTION']}</td>";
			echo "<td >{$row['LABLOCATION']}</td>";
			echo "<td >{$row['LABNAME']}</td>";

			echo "<td bgcolor=white><a href='deleteorchange.php?id=".$row['EquipmentID']."'>Delete</a></td>";
			echo "<td bgcolor=white><a href='editEquipment.php?code=".$row['EquipmentID']." && bc=".$row['Barcode']." && ename=".$row['EquipmentName']." && lid=".$row['LabID']." && rec=".$row['datereceived']." && status=".$row['status']." && desc=".$row['DESCRIPTION']." && loc=".$row['LABLOCATION']." && name=".$row['LABNAME']."'>Edit</a></td>";
			echo "<td bgcolor=white><a href='borrow.php?id=".$row['EquipmentID']." && status=".$row['status']."'>Borrow</a></td>


				</tr>";
		 }







echo "</table>";

?>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>
