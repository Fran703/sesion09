<?php

// Mostrar informacion
function mostrarInformacion(){
	global $conn;

	$sql = "SELECT * FROM informacion";

	$resultado = $conn->query($sql);

	return $resultado;
}

// Modificar informacion
function modificarInformacion($titulo, $texto){

	global $conn;

	$sql = "UPDATE informacion SET titulo_informacion = '".$titulo."', texto_informacion = '".$texto."' WHERE id_informacion = 0 ";

	$resultado = $conn->query($sql);

	if($resultado === true)
			return true;
	return false;
}

?>
