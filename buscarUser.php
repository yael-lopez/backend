<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonCurso = json_decode(file_get_contents("php://input"));

	$id = $jsonCurso->id;

	//$mensaje = array('id' => $id);

	require 'database.php';

	$query = "select * from user where id = " . $id;

	//$mensaje = array('id' => $query);

	$user = mysqli_fetch_assoc($db->query($query));
	if($user){
		$mensaje = [
			"estado" => true,
			"user" => $user
		];
	}else{
		$mensaje = [
			"estado" => false,
			"user" => "Error al Buscar Usuario"
		];
	}

	echo json_encode($mensaje);