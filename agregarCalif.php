<?php 

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	 if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
	   die();
	 }

	$jsonCalif = json_decode(file_get_contents("php://input"));

	$materia= $jsonCalif->materia;
	$usuario= $jsonCalif->usuario;
	$calif= $jsonCalif->calificacion;

	/*echo json_encode(array(
		"estado" => $inicio
	));*/

	require 'database.php';

	$query = "insert into calificacion (materia, usuario, calificacion) values($materia, $usuario, $calif)";

	//$query = mysqli_query(, $db);
	if($db->query($query)){
		$mensaje = [
			"estado" => true,
			"mensaje" => "Calificación Creado con Exito"
		];
	}else{
		$mensaje = [
			"estado" => false,
			"mensaje" => "Error al Crear Calificación"
		];
	}

	echo json_encode($mensaje);