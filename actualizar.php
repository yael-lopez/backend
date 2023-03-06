<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonUser = json_decode(file_get_contents("php://input"));

	$nombre= $jsonUser->nombre;
	$inicio= $jsonUser->inicio;
	$fin= $jsonUser->fin;
	$horas= $jsonUser->horas;
	$costo = $jsonUser->costo;
	$id = $jsonUser->id;

	/*echo json_encode(array(
		"estado" => $inicio
	));*/

	require 'database.php';

	$query = "update curso set nombre='$nombre', fecha_inicio='$inicio', fecha_fin='$fin', horas=$horas, costo=$costo where id = $id";

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