 <html>
	<head>
	<title>Add User</title>
		<link rel="stylesheet" href="mycss.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
		
			//Function that recieves response
			function addEquipmentComplete(xhr,status){
				if (status!="success"){
					divStatus.innerHTML="error while adding equipment";
						return;
				}
				divStatus.innerHTML=xhr.responseText;
			}
			
			//Function that sends request
			function addEquipment(){
			var name=$('#name').val();
			var barcode=$('#barcode').val();
			var desc=$('#desc').val();
			var labName=$('#labName').val();
			var labLocation=$('#labLocation').val();
			var dateAdded=$('#dateAdded').val();
			
			var ajaxUrl="equipAjax.php?cmd=1&name="+name+"&barcode="+barcode+"&desc="+desc+"&labName="+labName+"&labLocation="+labLocation+"&dateAdded="+dateAdded;
				prompt('aja', ajaxUrl);
				
					$.ajax(ajaxUrl,
					{async:true,
					complete:addEquipmentComplete	
					}	
					);
			}
					function saveEquipment(){
						
					divStatus.innerHTML="Equipment saved";
				}
					
					
				
				
		</script>
	</head>
	<body>
		<div align="center">Please input the details of the new Equipment you want to add</div><br>
		<div align="center">
			<div>Name: <input type="text" id="name"/></div><br><br>
			<div>Barcode: <input type="text" id="barcode"/></div><br><br>
			<div>Description: <input type="text" id="desc" cols="width" rows="height" wrap="type"></input></div><br><br>
			<div>Lab Name: <input type="text" id="labName"/></div><br><br>
			<div>Lab Location: <input type="text" id="labLocation"/></div><br><br>
			<div>Date Added: <input type="text" id="dateAdded" value="yyyy/mm/dd"/></div><br><br>
			
		</div>

			
		<div style="align center" >
		<button class="button button2" style="vertical-align:middle" value="Add Equipment" onclick="addEquipment()" >Submit </button>
		</div>
			
	</body>
</html>


