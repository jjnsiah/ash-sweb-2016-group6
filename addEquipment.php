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
			<div>Date Added: <input type="text" name="dateAdded" value="yyyy/mm/dd"/></div><br>
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
	$obj=new equipment();
	$r=$obj->addEquipment($name,$barcode,$desc,$dateAdded,$labName,$labLocation);
	
	//Print message
	if($r==false){
		$strStatusMessage="error while adding Equipment";
		
		}else{
		$strStatusMessage="$name added";
		}
		echo $strStatusMessage
	
?>