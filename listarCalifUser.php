<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonCalif = json_decode(file_get_contents("php://input"));

	$id = $jsonCalif->id;

	require 'database.php';

	$query = "SELECT ca.id, cu.nombre, u.usuario, ca.calificacion FROM calificacion ca INNER JOIN curso cu ON ca.materia = cu.id INNER JOIN user u ON ca.usuario = u.id WHERE u.id = $id";

	$data = $db->query($query);

	$json = "{data:[";

	while($curso = mysqli_fetch_assoc($data)){

		$json .= "{";
		$json .= "nombre:'" . $curso["nombre"]. "',";
		$json .= "id:'" . $curso["id"]. "',";
		$json .= "usuario:'" . $curso["usuario"]. "',";
		$json .= "calificacion:'" . $curso["calificacion"]. "'";
		$json .= "},";
		
	}

	$json .= "]}";	

	echo json_encode($json);