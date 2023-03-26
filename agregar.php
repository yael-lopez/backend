<?php 

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	 if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
	   die();
	 }

	$JSONData = file_get_contents("php://input");
	$dataObject = json_decode($JSONData);


	$nombre= $dataObject->nombre;
	$inicio= $dataObject->inicio;
	$fin= $dataObject->fin;
	$horas= $dataObject->horas;
	$costo = $dataObject->costo;

	require 'database.php';

	$query = "insert into curso (nombre, fecha_inicio, fecha_fin, horas, costo) values('$nombre', '$inicio', '$fin', $horas, $costo)";

	//$query = mysqli_query(, $db);
	if($db->query($query)){
		$mensaje = [
			"estado" => true,
			"mensaje" => "Curso Creado con Exito"
		];
	}else{
		$mensaje = [
			"estado" => false,
			"mensaje" => "Error al Crear Curso"
		];
	}

	echo json_encode($mensaje);