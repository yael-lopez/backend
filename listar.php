<?php 

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	 if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
	   die();
	 }

	require 'database.php';

	$query = "select * from curso";

	$data = $db->query($query);

	$json = "{data:[";

	while($curso = mysqli_fetch_assoc($data)){

		$json .= "{";
		$json .= "nombre:'" . $curso["nombre"]. "',";
		$json .= "id:'" . $curso["id"]. "',";
		$json .= "inicio:'" . $curso["fecha_inicio"]. "',";
		$json .= "fin:'" . $curso["fecha_fin"]. "',";
		$json .= "hora:'" . $curso["horas"]. "',";
		$json .= "costo:'" . $curso["costo"]. "'";
		$json .= "},";
		
	}

	$json .= "]}";	

	echo json_encode($json);