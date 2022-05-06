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
	$stmt = $conn->prepare("SELECT tbldegalinesinfo.pavadinimas,tbldegalineslocation.adresas,latitude,longtitude FROM tbldegalineslocation INNER JOIN tbldegalinesinfo on tbldegalineslocation.adresas = tbldegalinesinfo.adresas");
	
	$stmt->execute();
	
	$stmt->bind_result($pavadinimas,$adresas,$latitude,$longtitude);
	
	$loc = array();
	
	while($stmt->fetch()){
		
	$temp = array();	
	$temp['pavadinimas']=$pavadinimas;	
	$temp['adresas']=$adresas;	
	$temp['latitude']=$latitude;	
	$temp['longtitude']=$longtitude;	
	
	array_push($loc,$temp);
		
	}
	
	echo json_encode($loc);