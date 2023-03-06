<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonCalif = json_decode(file_get_contents("php://input"));

	$materia= $jsonCalif->materia;
	$usuario= $jsonCalif->usuario;
	$calif= $jsonCalif->calificacion;
	$id = $jsonCalif->id;

	/*echo json_encode(array(
		"estado" => $inicio
	));*/

	require 'database.php';

	$query = "update calificacion set materia=$materia, usuario=$usuario, calificacion=$calif where id = $id";

	//$query = mysqli_query(, $db);
	if($db->query($query)){
		$mensaje = [
			"estado" => true,
			"mensaje" => "Calificación Actualizada con Exito"
		];
	}else{
		$mensaje = [
			"estado" => false,
			"mensaje" => "Error al Actualizar Calificación"
		];
	}

	echo json_encode($mensaje);