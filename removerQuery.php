   

<?php 
    /*Class
	*This class connects and provides the query to delete
	*/
	class removerQuery{
		
	/**
	 *functin
     *this gives the remove query which acts on the database. 
    */	 
	function query($user){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "best";

			$conn = new mysqli($servername,$username,$password,$database);

			if ($conn->connect_error) {
				 die("Connection failed: " . $conn->connect_error);
			}
           $sql = "select * from login";
		   $data = $conn->query($sql);
			//if (isset($_REQUEST['EE'])){
				$input = $user;
				echo '$input';
				$sql  = "DELETE FROM login WHERE USERNAME = '$input'"; 
			//}
			 $conn->query($sql);
			
			
			if (!$data) {
				echo "Error creating database: " . $conn->error;
				exit();
			}
			$sql = "SELECT * FROM login";
			$data = $conn->query($sql);
		return $data;
	}
	
	}

	
?>