<?php



	define('DB_HOST','127.0.0.1');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','degalinesdb');
	
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	if(mysqli_connect_errno()){
		
		die('Unable to connect'.mysqli_connect_error());
	}
	
	
	$adresas=$_POST["adresas"];
	$benzinoKaina = $_POST["benzinoKaina"];
	$dyzelioKaina = $_POST["dyzelioKaina"];
	$dujuKaina = $_POST["dujuKaina"];
	$commentData=$_POST["commentData"];
	
	
	
		$sql = "insert into tbldegalinescommentlist (adresas,benzinoKaina,dyzelioKaina,dujuKaina,commentData) values ('$adresas','$benzinoKaina','$dyzelioKaina','$dujuKaina','$commentData')";
      if(mysqli_query($conn,$sql)){
	echo"Sekmingai issiusta!";	
	} else{
		echo "Ivyko klaida";
		
	}
     

	mysqli_close($conn);
	
?>