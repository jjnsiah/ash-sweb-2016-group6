<html>
	<head>
	</head>
	<body>
		<form action="LoginPage.php" method="GET">
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
	$db = new mysqli ("127.0.0.1", "root", "mawuli.adjei", "ashlabs");
	if(isset($_REQUEST["Username"]) && isset($_REQUEST["Password"]) && isset($_REQUEST["UserType"])){
		$username = $_GET["Username"];
		$password = $_GET["Password"];
		$userType = $_GET["UserType"];
	}
	else {
		echo "Please enter both your username and password, and specify your UserType";
	}
	

	/*echo $username;
	echo $password;
	echo $userType;*/
	if ($db -> connect_errno){
		echo "error";
		exit();
	}

	else {
		if ($userType == "Student"){
			$pQuery = ("SELECT password FROM students WHERE student.username = 'Username'");
			$uQuery = ("SELECT username FFOM students WHERE student.password = 'Password'");

			$uResult = $db->query($uQuery);
			$pResult = $db->query($pQuery);

			if($uResult = false || $pResult = false){
				echo "username or password does not exist";
			}
			else{
				if((strcmp($uResult, $username) ==0) && (strcmp($pResult, $password) == 0)){
					echo "access allowed ";
				}

				else{
					echo "access disallowed";
				}
			}
		}

		elseif ($userType == "Faculty") {
			$pQuery = ("SELECT password FROM faculty WHERE faculty.username = 'Username'");
			$uQuery = ("SELECT username FFOM faculty WHERE faculty.password = 'Password'");

			$uResult = $db->query($uQuery);
			$pResult = $db->query($pQuery);

			if($uResult = false || $pResult = false){
				echo "username or password does not exist";
			}
			else{
				if((strcmp($uResult, $username) ==0) && (strcmp($pQuery, $password) == 0)){
					//allow access
				}

				else{
					//deny access to the rest of the website
				}
			}
		}

	}
?>