 <html>
	<head>
	</head>
	<body>
		<form action="addEquipment.php" method="GET">
			<div>Name: <input type="text" name="name"/></div><br>
			<div>Barcode: <input type="text" name="barcode"/></div><br>
			<div>Description: <textarea name="desc" cols="width" rows="height" wrap="type"></textarea></div><br>
			<div>Lab Name: <input type="text" name="labName"/></div><br>
			<div>Lab Location: <input type="text" name="labLocation"/></div><br>
			<div>Date Added: <input type="text" name="dateAdded" value="dd/mm/yyyy"/></div><br>
			<div>
				
				</select>
			</div><br>
			<input type="submit" value="Add Equipment">
		</form>	
	</body>
</html>
<?php
	if(!isset($_REQUEST['name'])){
		exit();		
		//if no data, exit
	}
	//print_r($_REQUEST);
	$name=$_REQUEST['name'];
	$barcode=$_REQUEST['barcode'];
	$desc=$_REQUEST['desc'];
	$labName=$_REQUEST['labName'];
	$labLocation=$_REQUEST['labLocation'];
	$dateAdded=$_REQUEST['dateAdded'];
	include_once("equipment.php");

	
	
	$strQuery="insert into equipments set NAME='$name', BARCODE='$barcode',
				DESCRIPTION='$desc',
				DATE='$dateAdded',
				LABNAME='$labName',
				LABLOCATION='$labLocation'";
				
	//echo $strQuery;
	if($db->query($strQuery)){
		echo "Data Added";
	}else{
		echo "Error while adding data";
	}
	
	if($db->query($strQuery)){
		echo "Data Added";
	}else{
		echo "Error while adding data";
	}
	$result=$db->query("select * from equipments");
	
	//Print table
	$col1="pink";
			$col2="purple";
			$col3="#cccccc";
			$col4="#e9e9e9";
			$counter=1;
	
	echo "<table border='1'; bgcolor=$col4>
	
			<tr bgcolor=$col3>
				<td>Equipment Name</td>
				<td>Barcode</td>
				<td>Description</td>
				<td>Lab Name</td>
				<td>Lab Location</td>
			</tr>";
	
	$row=$result->fetch_assoc();
	while($row){
		if ($counter==1){
	
		echo "<tr>
			<td bgcolor=$col3>{$row['NAME']}</td>
			<td bgcolor=$col1>{$row['BARCODE']}</td>
			<td bgcolor=$col1>{$row['DESCRIPTION']}</td>
			<td bgcolor=$col1>{$row['LABNAME']}</td>
			<td bgcolor=$col1>{$row['LABLOCATION']}</td>
			
			</tr>";
		$row=$result->fetch_assoc();
		$counter=0;
		}else{
			echo "<tr>
			<td bgcolor=$col3>{$row['NAME']}</td>
			<td bgcolor=$col1>{$row['BARCODE']}</td>
			<td bgcolor=$col1>{$row['DESCRIPTION']}</td>
			<td bgcolor=$col1>{$row['LABNAME']}</td>
			<td bgcolor=$col1>{$row['LABLOCATION']}</td>
			</tr>";
		$row=$result->fetch_assoc();
		$counter=1;
			
			
		}
	}
	echo "</table>";
?>
