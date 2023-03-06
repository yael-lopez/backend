<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonCurso = json_decode(file_get_contents("php://input"));

	$id = $jsonCurso->id;

	//$mensaje = array('id' => $id);

	require 'database.php';

	$query = "delete from curso where id = " . $id;

	//$mensaje = array('id' => $query);

	//$query = mysqli_query(, $db);
	if($db->query($query)){
		$mensaje = [
			"estado" => true,
			"mensaje" => "Curso Eliminado Con Exito"
		];
	}else{
		$mensaje = [
			"estado" => false,
			"mensaje" => "Error al Borrar Curso"
		];
	}

	echo json_encode($mensaje);