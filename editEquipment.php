<html>

	<head>
	<title>Edit Equipment</title>
	<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript">
			function validate(){
				//check data
				alert("valid");
				return true;
			}

		</script>
	</head>
	<body>
	<table>
			<tr>
				<td colspan="2" id="pageheader">
					Equipment Form
				</td>
			</tr>
			<tr><td><div id="divContent">
						Content space
<?php
	include_once("functions.php");
	$new= new functions();

	if(isset($_REQUEST['code'])){

	$id=$_REQUEST['code'];
	$check=$new->getOldEquipment($id);
	if ($check=true){
	$row=$new->fetch();
	}
	else {
		echo "could not fetch";
	}
	}
	else
	{
		echo "no id entered";
		exit();
	}


?>
		<form action="eupdate.php" method="GET" onsubmit='validate()'>

			<input type="hidden" name="id" value="<?php echo $row['EquipmentID']?>">

			<div>Barcode: <input type="text" name="barcode" value="<?php echo $row['Barcode'] ?>"/></div>
			<div>Equipmentname: <input type="text" name="name" value="<?php echo $row['EquipmentName'] ?>"/></div>
			<div>LabID: <input type="text" name="supplierid" value="<?php echo $row['LabID'] ?>"/></div>
			<div>DateReceived: <input type="date" name="datereceived" value="<?php echo $row['datereceived'] ?>"/></div>
			<div>Description: <input type="date" name="DESCRIPTION" value="<?php echo $row['DESCRIPTION'] ?>"/></div>
			<div>Lab Location: <input type="date" name="LABLOCATION" value="<?php echo $row['LABLOCATION'] ?>"/></div>
			<div>Lab Name: <input type="date" name="LABNAME" value="<?php echo $row['LABNAME'] ?>"/></div>

	<div>
				<?php
				$Available="";
				$Borrowed="";

				if ($row['status']=='Available'){
					$Available="checked";
				}
				else
				{
					$Borrowed="checked";
					}
			?>
			<div>
	Status: <input type="radio" name="status" <?php echo $Available?> value="Available"> Available
		<input  type="radio" name="status"  <?php echo $Borrowed?> value="Borrowed"> Borrowed
			</div>

			<input type="submit" name="save" value="Update"></input>
		</div>
				</td>
			</tr>
		</table>
	</body>
</html>
