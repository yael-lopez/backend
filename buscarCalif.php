<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonCurso = json_decode(file_get_contents("php://input"));

	$id = $jsonCurso->id;

	//$mensaje = array('id' => $id);

	require 'database.php';

	$query = "select * from calificacion where id = " . $id;

	//$mensaje = array('id' => $query);

	$calificacion = mysqli_fetch_assoc($db->query($query));
	if($calificacion){
		$mensaje = [
			"estado" => true,
			"calificacion" => $calificacion
		];
	}else{
		$mensaje = [
			"estado" => false,
			"calificacion" => "Error al Buscar Curso"
		];
	}

	echo json_encode($mensaje);