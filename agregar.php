<?php 

	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");

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