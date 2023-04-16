<?php

$contrasena = "pass";
$usuario = "user";
$nombre_bd = "proyecto_final";

try {
	$bd = new PDO (
		'mysql:host=target;
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}

?>
