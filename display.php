<html>
	<head>
		<title>Report</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					<img src="ashlabs.jpeg"width="150" height="100" align="middle">
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">Home</div>
					<div class="menuitem">Logout</div>
				</td>
				<td id="content">

					<div id="divStatus" class="status">
						<font color ="#bf360c" > Activity Log Sheet </font>
					</div>

<?php

include_once ("transaction.php");
$obj= new transaction();
$obj->connectToDB();
$obj->transactionQuery();

	echo "<table id =t01 border=2 style=width:100%>
	<tr>
	<td><b>Activity No.</b></td>
	<td><b>DATE / TIME</b></td>
	<td><b>ACTIVITY</b></td>
	</tr>";
	$x=1;
	while ($results= $obj->fetch())
	{
		if ($x%2==0){
		echo "<tr>
		<td bgcolor= #ffcdd2 >{$results['Activity No.']}</td>
		<td bgcolor=#ffcdd2 >{$results['Date/Time']}</td>
	  <td bgcolor=#ffcdd2 >{$results['Activity']}</td>
		</tr>";
	}
	else{
		echo "<tr>
		<td>{$results['Activity No.']}</td>
		<td>{$results['Date/Time']}</td>
		<td>{$results['Activity']}</td>
		</tr>";
	}
	$x++;

}


echo "	</table>";


?>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>
