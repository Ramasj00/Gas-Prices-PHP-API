<?php

	header('Content-Type: application/json');
	define('DB_HOST','127.0.0.1');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','degalinesdb');
	
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	if(mysqli_connect_errno()){
		
		die('Unable to connect'.mysqli_connect_error());
	}
	$stmt = $conn->prepare("SELECT adresas,latitude,longtitude FROM tbldegalineslocation");
	
	$stmt->execute();
	
	$stmt->bind_result($adresas,$latitude,$longtitude);
	
	$loc = array();
	
	while($stmt->fetch()){
		
	$temp = array();	
	$temp['adresas']=$adresas;	
	$temp['latitude']=$latitude;	
	$temp['longtitude']=$longtitude;	
	
	array_push($loc,$temp);
		
	}
	
	echo json_encode($loc);