<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: content-type");

	$jsonUser = json_decode(file_get_contents("php://input"));

	$user = $jsonUser->user;
	$password = $jsonUser->password;

	require 'database.php';

	$query = "select * from user where usuario = '$user'";

	$usuario = mysqli_fetch_assoc($db->query($query));

	if($usuario){
		if(password_verify($password, $usuario["password"])){
			$data = [
				"estado" => true,
				"mensaje" => "Inicio de Sesión Correcto",
				"user" => $usuario
			];
		}else{
			$data = [
				"estado" => false,
				"mensaje" => "Contraseña Incorrecta"
			];
		}
	}else{
		$data = [
			"estado" => false,
			"mensaje" => "No Se Encontro al Usuario"
		];
	}

	

	echo json_encode($data);