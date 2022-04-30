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
	$stmt = $conn->prepare("SELECT tbldegalinesinfo.id,miestas,pavadinimas,tbldegalinesinfo.adresas,ikelimoData,benzinoKaina,dyzelioKaina,dujuKaina,tbldegalineslocation.latitude,tbldegalineslocation.longtitude FROM tbldegalinesinfo INNER JOIN tbldegalineslocation ON tbldegalinesinfo.adresas = tbldegalineslocation.adresas;");
	
	$stmt->execute();
	
	$stmt->bind_result($id,$miestas,$pavadinimas,$adresas,$ikelimoData,$benzinoKaina,$dyzelioKaina,$dujuKaina,$latitude,$longtitude);
	
	$degalines = array();
	
	while($stmt->fetch()){
		
	$temp = array();
	$temp['id']=$id;	
	$temp['miestas']=$miestas;	
	$temp['pavadinimas']=$pavadinimas;	
	$temp['adresas']=$adresas;	
	$temp['ikelimoData']=$ikelimoData;	
	$temp['benzinoKaina']=$benzinoKaina;	
	$temp['dyzelioKaina']=$dyzelioKaina;	
	$temp['dujuKaina']=$dujuKaina;	
	$temp['latitude']=$latitude;	
	$temp['longtitude']=$longtitude;	
	
	array_push($degalines,$temp);
		
	}
	
	echo json_encode($degalines);