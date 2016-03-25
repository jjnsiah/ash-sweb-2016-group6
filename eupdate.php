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

	if ($check==false) {
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
	<td>NAME</td>
	<td>BARCODE</td>
	<td>STATUS</td>
	<td>DATE RECEIVED</td>
	<td>BORROW EQUIPMENT</td>
	
	</tr>";
	
	
	
		 while ($row=$new->fetch()){
		
		$status="";
				
			 $status="Borrowed";
			 echo "<tr bgcolor=lightblue>
				<td >{$row['id']}</td>"; 
			echo "<td >{$row['name']}</td>";
			echo "<td >{$row['barcode']}</td>";
			
			echo "<td >{$row['datereceived']}</td>
			
			
</tr>";

if ($row['id']==$_REQUEST['id']) {
	echo "<td >$status</td>";
echo "<td bgcolor=white>Already Borrowed</a></td></tr>";}
		 
			
			

			
			elseif ($row['status']=="Borrowed")
			{ 
		echo "<td >$status</td>";
		echo "<td bgcolor=white>Already Borrowed</a></td></tr>";
			}
			else
			{ 
		$status=$row['status'];
				echo "<td >$status</td>";

		echo "<td bgcolor=white><a href='borrow.php?id=".$row['id']." && status=".$row['status']."'>Borrow</a></td>
		 
				</tr>";
			}
			

		
	}
echo "</table>";	
	
?>						
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	
