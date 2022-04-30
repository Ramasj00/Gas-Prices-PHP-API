<?php

	define('DB_HOST','127.0.0.1');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','degalinesdb');
	
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	if(mysqli_connect_errno()){
		
		die('Unable to connect'.mysqli_connect_error());
	}
	
	$user_name = $_POST["username"];
	$password = $_POST["password"];
	$sql = "select username,password from tbluserinfo where username = '$user_name' and password = '$password'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows <= 0 ){
		
		
		echo "Tokio vartotojo nera!";
		
	} else{
		echo "Sekmingai prisijungta!";
	}
	
   
	mysqli_close($conn);
	
?>