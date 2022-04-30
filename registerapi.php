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
	
	
	if($result=$conn->query("SELECT username FROM tbluserinfo WHERE username = '$user_name'")){

    if ( $result->num_rows <= 0 ) {
		$sql = "insert into tbluserinfo (username,password) values ('$user_name','$password')";
      if(mysqli_query($conn,$sql)){
	echo"Sekmingai prisiregistruota";	
	} else{
		echo "Ivyko klaida";
		
	}
          
    } else {
     echo "Toks vartotojas jau egzistuoja";
          
    }
    
        $result->close();
}
	mysqli_close($conn);
	
?>