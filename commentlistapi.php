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
	
	$stmt = $conn->prepare("SELECT adresas,benzinoKaina,dyzelioKaina,dujuKaina,commentData FROM tbldegalinescommentlist ORDER BY id desc");
	
	$stmt->execute();
	
	$stmt->bind_result($adresas,$benzinoKaina,$dyzelioKaina,$dujuKaina,$commentData);
	
	$degalines = array();
	
	while($stmt->fetch()){
		
	$temp = array();
	$temp['adresas']=$adresas;	
	$temp['benzinoKaina']=$benzinoKaina;	
	$temp['dyzelioKaina']=$dyzelioKaina;	
	$temp['dujuKaina']=$dujuKaina;	
	$temp['commentData']=$commentData;	
	
	
	array_push($degalines,$temp);
		
	}
	
	echo json_encode($degalines);