<?php

// Mostrar menu enlaces
function listarMenu(){
	
	global $conn;
		
	$resultado = $conn->query($sql);
	
	$row = mysqli_fetch_all($resultado);
	//echo var_dump($row);
	
	if( $row > 0)
		//while ($row = mysqli_fetch_assoc($resultado);){
			//$a[$i] = $row[&i];
			//$i++;

		return $row;
		}
	/*else
		return ('No hay proyectos para este usuario.');
	return ($a);
	}*/

// Modificar menu enlaces
function modificarUrl($idMenuIzquierda,$url,$urlNueva){
	
	global $conn;
	
	if($url == $urlNueva)
		return ("Ha introducido el mismo enlace, introduzca otro distinto.");
	else{
		$sql = "UPDATE MenuIzquierda SET url = '".$urlNueva."' WHERE idMenuIzquierda = '".$idMenuIzquierda."'";
		$resultado = $conn->query($sql);
		
		if($resultado === true)
			return (true);
		return (false);
	}
}

// Eliminar enlace
function eliminarUrl($idMenuIzquierda){
	
	global $conn;
	
	$sql = "DELETE FROM MenuIzquierda WHERE idMenuIzquierda = '".$idMenuIzquierda."'";
	$resultado = $conn->query($sql);
		
	if($resultado === true)
		return (true);
	return (false);
}


// Nuevo enlace
function nuevaUrl($nombre, $url, $icono){

	global $conn;
	
	$sql = "INSERT INTO MenuIzquierda (nombre, url, icono)
	VALUES ( '" . $nombre . "', '" . $url . "', '" . $icono . "')";
	
	if ($conn->query($sql) === TRUE) {
		return (true);
	}
	return (false);
}

?>