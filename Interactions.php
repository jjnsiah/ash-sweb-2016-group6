<?php
/**
*This is the login class that will be interacting with the database
*/
	class Interactions{

				var $username = "";
				var $password = "";
				var $userType = "";
				var $uResult = "";
				var $pResult = "";
				var $uResult1 = "";
				var $usernameQuery = "";
				var $passwordQuery = "";
				var $db = null;

/**
*@return true if successful, false if unsuccessful
*/
		function connect(){
			$this->db = new mysqli ("localhost", "root", "", "ashlabs");

			if ($this->db -> connect_errno){
					echo "error";
					return false;
				}
			else {
				return true;
			}
		}

/**
*@return true if successful, false if unsuccessful
*@param string, string, string
*/
		function assignFormValues($u, $p, $ut){

				$username = $u;
				$password = $p;
				$userType = $ut;
				return true;
		}
/**
*@return true if successful, false if unsuccessful
*/
		function queryDatabase($username, $password, $userType){
				if ($userType == "Student"){
					$pQuery = ("SELECT password FROM students WHERE username = '$username'");
					$uQuery = ("SELECT username FROM students WHERE password = '$password'");

					$this->usernameQuery = $this->db->query($uQuery);
					$this->passwordQuery = $this->db->query($pQuery);

					if ($this->usernameQuery == false || $this->passwordQuery == false){
						echo "no data from database. check username and password";
						return false;
						}
					else {
						$uResult1 = $this->usernameQuery->fetch_assoc();
						$pResult1 = $this->passwordQuery->fetch_assoc();
						$uResult = $uResult1['username'];
						$pResult = $pResult1['password'];
						$array[0] = $uResult;
						$array[1] = $pResult;
						return $array;
						}
				}
				elseif ($userType == "Faculty"){
					$pQuery = ("SELECT password FROM students WHERE username = '$username'");
					$uQuery = ("SELECT username FROM students WHERE password = '$password'");

					$this->usernameQuery = $this->db->query($uQuery);
					$this->passwordQuery = $this->db->query($pQuery);

					if ($this->usernameQuery == false || $this->passwordQuery == false){
						echo "no data from database. check username and password";
						return false;
						}
					else {
						echo "data reeived from database";
						$uResult1 = $this->usernameQuery->fetch_assoc();
						$pResult1 = $this->passwordQuery->fetch_assoc();
						$uResult = $uResult1['username'];
						$pResult = $pResult1['password'];
						$array[0] = $uResult;
						$array[1] = $pResult;
						return $array;
						}
				}
		}

/**
*@return true if successful, false if unsuccessful
*/
		function checkDetails($user, $username, $pass, $password)
		{
			if ($username==null ||$user==null || $pass==null || $password==null )
			{
				exit;
			}

				if((strcasecmp($user, $username) ==0) && (strcmp($pass, $password) == 0)){
					echo "access allowed ";
					return true;
				//echo '<script> window.location.href ="homepage.html"; </script>';
				}

				else{
					echo "access disallowed";
					return false;
				}
			}

	}
?>
