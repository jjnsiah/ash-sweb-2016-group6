<html>
	<head>
	</head>
	<body>
		<form action="loginform.php" method="GET">
			Username: <input type="text" name="Username"/>
			Password: <input type="text" name="Password"/>
			UserType: <select name="UserType">
				<option value="Student">Student</option>
				<option value="Faculty">Faculty</option>
			</select>
			<input type="submit" value="Login">
		</form>
	</body>
</html>

<?php

		$username = "";
		$password = "";
		$userType = "";
		$uu = "";
		$pp = "";
		$array1;
		if(isset($_REQUEST["UserType"])){
			$username = $_GET["Username"];
			$password = $_GET["Password"];
			$userType = $_GET["UserType"];
		}
		else {
			echo "no data sent";
		}

	include_once("Interactions.php");
	$obj = new Interactions();
	$bool = $obj->connect();
	if ($bool == false){
		echo "Please enter both your username and password, and specify your UserType";
	}
	else{
		$obj->assignFormValues($username, $password, $userType);
		$array1 = $obj->queryDatabase($username, $password, $userType);
		$uu = $array1[0];
		$pp = $array1[1];
		$obj->checkDetails($uu, $username, $pp, $password);
	}
	
?>