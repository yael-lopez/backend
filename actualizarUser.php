<?php 

	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	 if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
	   die();
	 }

	$jsonCalif = json_decode(file_get_contents("php://input"));

	$usuario= $jsonCalif->usuario;
	$id = $jsonCalif->id;

	/*echo json_encode(array(
		"estado" => $inicio
	));*/

	require 'database.php';

	$query = "update user set usuario='$usuario' where id = $id";

	//$mensaje = array('mensaje' => $query );

	//$query = mysqli_query(, $db);
	if($db->query($query)){
		$mensaje = [
			"estado" => true,
			"mensaje" => "Usuario Actualizado con Exito"
		];
	}else{
		$mensaje = [
			"estado" => false,
			"mensaje" => "Error al Actualizar Usuario"
		];
	}

	echo json_encode($mensaje);