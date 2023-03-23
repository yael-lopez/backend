<?php 

	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");


	$jsonUser = json_decode(file_get_contents("php://input"));

	$user = $jsonUser->user;
	$password = password_hash($jsonUser->password, PASSWORD_BCRYPT);
	$rol = $jsonUser->rol;

	require 'database.php';

	$query = "insert into user (usuario, password, id_rol) values('$user', '$password', $rol)";

	//$query = mysqli_query(, $db);
	if($db->query($query)){
		$mensaje = [
			"estado" => true,
			"mensaje" => "Usuario Creado Con Exito"
		];
	}else{
		$mensaje = [
			"estado" => false,
			"mensaje" => "Error al Crear Usuario"
		];
	}

	echo json_encode($mensaje);