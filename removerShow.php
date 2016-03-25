 <html>
	<head></head>
	<body>
	<form method= "post", action = "">
	Username <input type = "text" name = "EE"><br><br>

	          <input type = "submit" value = "Remove">
	</form>
	</body>
	</html>

<?php

include_once("removerQuery.php");




	//$obj1 = new removerConnect;
	$obj = new removerQuery;

	$username = $_REQUEST['EE'];
	$data2 = $obj->query($username);


			echo"<style>
			   table, th, td {border: 1px solid black;}
		</style>";
			echo"<table>
			 <tr bgcolor = 'lightblue'>
			  <td>EquipmentID</td>
			  <td>Barcode</td>
			  <td>Name</td>
			  <td>LabID</td>
			  <td>LabName</td>

			 </tr>";
			$numRows = $data2->num_rows;
			//echo $numRows;
			//echo "<br>";
			$number = 1;


			for($i = 0;$i<$numRows;$i++){
				//$data->data_seek($i);
				$row = $data2->fetch_array(MYSQLI_ASSOC);
				if ($number == 1){
			echo "<tr bgcolor = 'lightyellow'>
					<td > {$row['EquipmentID']}</td>
					<td> {$row['Barcode']}</td>
					<td> {$row['EquipmentName']}</td>
					<td> {$row['LabID']}</td>
					<td> {$row['LabName']}</td>
				  </tr>";
				  $number = -1;
				}
				else {
          echo "<tr bgcolor = 'lightblue'>
    					<td > {$row['EquipmentID']}</td>
    					<td> {$row['Barcode']}</td>
    					<td> {$row['EquipmentName']}</td>
    					<td> {$row['LabID']}</td>
    					<td> {$row['LabName']}</td>
    				  </tr>";
				  $number = 1;

				}
			}
			"</table>";




			//$conn->close();





?>
