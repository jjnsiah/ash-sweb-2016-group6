<html>
	<head>
		<title>Ash-Labs</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			function goBack() {
    window.history.back();
}<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Borrow New Equipment
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<span class="menuitem" >page menu 2</span>
						<span class="menuitem" >page menu 3</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>

					<?php
			//initialize
			
			$strStatusMessage ="Add new equipment to my Borrowed equipment";
			
			
			
			include_once("functions.php");
				$obj=new functions();
				

				$status="";
			$eid="";
			
			//1) what is the purpose of this if block
			if(isset($_REQUEST['id']) && ($_REQUEST['status'])){
				$status=$_REQUEST['status'];
				//$eid=$_REQUEST['id'];
				
				$r=$obj->getOldEquipment($_REQUEST['id']);
				
				
				
				if($r=false){
					$strStatusMessage="error while adding equipment";
				}else{
					
					echo "Checking for equipment availability";
				
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

	

	</tr>";
	
	 while ($row=$obj->fetch()){
		if ($status=="Available" || $row['EquipmentID']==$_REQUEST['id']){
		 $status="Borrowed";
			echo "<tr bgcolor=lightblue><td>{$row['EquipmentID']}</td>";
			echo "<td >{$row['Barcode']}</td>";
			echo "<td >{$row['EquipmentName']}</td>";
			echo "<td >{$row['LabID']}</td>";
			echo "<td >{$row['datereceived']}</td>";

		echo "<td >$status</td>";
			echo "<td >{$row['DESCRIPTION']}</td>";
			echo "<td >{$row['LABLOCATION']}</td>";
			echo "<td >{$row['LABNAME']}</td>
			
	 </tr>";}


		 
elseif ($row['status']=="Borrowed")
			{ 
		
		echo "cannot borrow equipment";
			}
			
			else
			{ 
		echo "Equipment is in Poor condition";
			}
		 
	//header("Location: elist.php");
		
	
			}}
					
			
else {echo "NO EQUIPMENT ID ENTERED";}			
	

	

			
					
?>
<div id="divStatus" class="status">
						
						
			
			<form action="eupdate.php?id= && status=" method="GET" onsubmit='validate()'>
			<button onclick="goBack()">Go Back</button>
			
			<div>Equipment ID<input type="text" name="id" value="<?php echo $row['EquipmentID']; ?>"></div>


			<input type="submit" name="save" value="Update"></input>
			

					</div>
					
				</td>
			</tr>
		</table>
	</body>
</html>	
