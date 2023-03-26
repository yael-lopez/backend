<?php 

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	 if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
	   die();
	 }

	require 'database.php';

	$query = "select * from user where id_rol = 2";

	$data = $db->query($query);

	$json = "{data:[";

	while($user = mysqli_fetch_assoc($data)){

		$json .= "{";
		$json .= "usuario:'" . $user["usuario"]. "',";
		$json .= "id:'" . $user["id"]. "',";
		$json .= "},";
		
	}

	$json .= "]}";	

	echo json_encode($json);