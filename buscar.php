<?php 

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	 if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
	   die();
	 }

	$jsonCurso = json_decode(file_get_contents("php://input"));

	$id = $jsonCurso->id;

	//$mensaje = array('id' => $id);

	require 'database.php';

	$query = "select * from curso where id = " . $id;

	//$mensaje = array('id' => $query);

	$curso = mysqli_fetch_assoc($db->query($query));
	if($curso){
		$mensaje = [
			"estado" => true,
			"curso" => $curso
		];
	}else{
		$mensaje = [
			"estado" => false,
			"curso" => "Error al Buscar Curso"
		];
	}

	echo json_encode($mensaje);