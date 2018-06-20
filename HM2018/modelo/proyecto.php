<?php

// Metodo para crear un proyecto
function crearProyecto($idProyecto, $nombreProyecto, $descripcionProyecto, $idCreador){
  global $conn;

	$sql = "INSERT INTO proyecto (nombre_proyecto, descripcion_proyecto )
	VALUES ( '" . $nombreProyecto . "', '" . $descripcionProyecto . "')";

  $resultado = $conn->query($sql);

  asignarUsuarioProyecto("1", $idProyecto);

	if($resultado === true)
		return (true);
	return (false);
}

//Obtenemos el id ultimo proyecto creado
function getLastID(){
  global $conn;

	$sql = "SELECT id_proyecto FROM proyecto ORDER BY id_proyecto DESC LIMIT 1";
  $resultado = $conn->query($sql);

	return $resultado;
}

//Asignamos el proyecto creado al usuario creador de dicho proyecto
function asignarUsuarioProyecto($idUsuario, $idProyecto){
  global $conn;

  $sql = "INSERT INTO usuario_has_proyecto (usuario_id_usuario, proyecto_id_proyecto )
  VALUES ( '" . $idUsuario . "', '" . $idProyecto . "')";

  $resultado = $conn->query($sql);

  return $resultado;
}

// Modificar el nombre proyecto
function modificarProyecto($idProyecto, $nombreNuevo, $descripcionNueva){
	global $conn;

	$sql = "UPDATE proyecto
	SET nombre_proyecto = '".$nombreNuevo."', descripcion_proyecto = '".$descripcionNueva."'
	WHERE id_proyecto = '".$idProyecto."'";

	$resultado = $conn->query($sql);

	if($resultado === true)
		return (true);
	return (false);
}

//Eliminar proyectos
function borrarProyecto($idProyecto){

  global $conn;
  $sql = "DELETE FROM usuario_has_proyecto WHERE Proyecto_id_proyecto= '" .$idProyecto ."'";
  /*
  $sql = "ALTER TABLE usuario_has_proyecto ADD CONSTRAINT FOREIGN KEY (fk_Usuario_has_Proyecto_Proyecto1) REFERENCES proyecto (id_proyecto)";
  $sql = "ALTER TABLE proyecto ADD CONSTRAINT FOREIGN KEY (fk_Usuario_has_Proyecto_Proyecto1) REFERENCES proyecto (id_proyecto)";
  $sql = "DELETE FROM proyecto WHERE id_proyecto = '".$idProyecto."'";*/


  /*$sql .= "DELETE FROM usuario_has_proyecto WHERE proyecto_id_proyecto = '".$idProyecto."'";

  $resultado = $conn->multi_query($sql);
  if($resultado === true)
    return true;
  return false;*/

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}

function borrarMiembro($idUsuario, $idProyecto){

  global $conn;
  $sql = "DELETE FROM usuario_has_proyecto
  WHERE usuario_id_usuario= '" .$idUsuario ."'
  AND proyecto_id_proyecto = '" .$idProyecto."'";

 $resultado = $conn->query($sql);
}

// Listar proyectos por usuario
function listarProyectos($idUsuario){
	global $conn;

	$sql = "SELECT proyecto.id_proyecto, proyecto.nombre_proyecto, proyecto.descripcion_proyecto FROM proyecto
		INNER JOIN usuario_has_proyecto
		ON proyecto.id_proyecto = usuario_has_proyecto.proyecto_id_proyecto
		INNER JOIN usuario
		ON usuario_has_proyecto.usuario_id_usuario = usuario.id_usuario
		WHERE usuario.id_usuario = '".$idUsuario."'
		ORDER BY proyecto.id_proyecto";

	$resultado = $conn->query($sql);

	return $resultado;
}

function verProyecto($idProyecto){
  global $conn;

	$sql = "SELECT * FROM proyecto WHERE id_proyecto = '".$idProyecto."'";

	$resultado = $conn->query($sql);

	return $resultado;
}

// Listar proyectos por usuario
function listarMiembroProyecto($idProyecto){
	global $conn;

	$sql = "SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.correo_usuario, usuario.rol_usuario, usuario.peso_usuario FROM usuario
		INNER JOIN usuario_has_proyecto
		ON usuario.id_usuario = usuario_has_proyecto.usuario_id_usuario
		INNER JOIN proyecto
		ON usuario_has_proyecto.proyecto_id_proyecto = proyecto.id_proyecto
		WHERE proyecto.id_proyecto = '".$idProyecto."' AND usuario.rol_usuario = 'Cliente'
		ORDER BY usuario.peso_usuario DESC";

	$resultado = $conn->query($sql);

	return $resultado;
}

function guardarSolucion($idProyecto, $solucion){
  global $conn;

  $sql = "UPDATE proyecto
  	SET solucion = '".$solucion."'
  	WHERE id_proyecto = '".$idProyecto."'";

  $resultado = $conn->query($sql);

  return $resultado;
}

function mostrarSolucion($idProyecto){
  global $conn;

  $sql = "SELECT proyecto.solucion
  	FROM proyecto
  	WHERE id_proyecto = '".$idProyecto."'";

  $resultado = $conn->query($sql);

  return $resultado;
}

?>
