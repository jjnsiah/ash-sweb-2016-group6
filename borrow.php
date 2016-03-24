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
				$obj2=new functions();
				$obj3=new functions();

				$status="";
			$eid="";
			
			//1) what is the purpose of this if block
			if(isset($_REQUEST['id']) && ($_REQUEST['status'])){
				$status=$_REQUEST['status'];
				$eid=$_REQUEST['id'];
				
				$r=$obj->getOldEquipment($eid);
				$u=$obj2->getUserByCode(2);
				
				
				if($r=false){
					$strStatusMessage="error while adding equipment";
				}else{
					
					echo "Checking for equipment availability";
				}
				
									
				echo "<table  border=1><tr><td>EID</td>
	<td>NAME</td>
	<td>BARCODE</td>
	<td>STATUS</td>
	<td>DATE RECEIVED</td></tr>";
	
	
	while ($row=$obj->fetch()){
		if ($status=="Available"){
			 
			 echo "<tr bgcolor=lightblue>
				<td >{$row['id']}</td>"; 
			echo "<td >{$row['name']}</td>";
			echo "<td >{$row['barcode']}</td>";
			echo "<td >{$row['status']}</td>";
			echo "<td >{$row['datereceived']}</td>
							
</tr>";
		 //$status="Borrowed";
		 }
		
		 
		 else 
		 {
			
		 echo "This equipment cannot be borrowed";
		 }
			
		 }
	//header("Location: elist.php");
		
	}
	 
					
				
	

echo "<table border=1><tr><td >USERID</td>
<td>USERNAME</td>
	<td>FIRSTNAME</td>
	<td>LASTNAME</td>
	
	</tr>";
	
	while ($row1=$obj2->fetch()){
		
		
			echo "<tr bgcolor=lightblue>
				<td >{$row1['uid']}</td>"; 
			echo "<td >{$row1['username']}</td>";

			echo "<td >{$row1['firstname']}</td>";
			echo "<td >{$row1['lastname']}</td>	
	
	</tr>";
	}

echo "</table>";	

			
					
?>
<div id="divStatus" class="status">
						
						
			
			<form action="eupdate.php?status" method="GET" onsubmit='validate()'>
			<button onclick="goBack()">Go Back</button>
			
			<div>Equipment ID<input type="text" name="id" value="<?php echo $row['id']; ?>"></div>
						

			<input type="submit" name="save" value="Update"></input>
			

					</div>
					
				</td>
			</tr>
		</table>
	</body>
</html>	
