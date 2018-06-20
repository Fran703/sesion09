<?php

include_once "modelo/usuario.php";

//Crear nuevo requisito
function crearRequisito($nombreRequisito, $descripcionRequisito, $esfuerzo){
  global $conn;

	$sql = "INSERT INTO requisito (nombre_requisito, descripcion_requisito, esfuerzo_requisito)
	VALUES ( '" . $nombreRequisito . "', '" . $descripcionRequisito . "', '" . $esfuerzo ."')";

  $resultado = $conn->query($sql);

	if($resultado === true)
		return (true);
	return (false);
}

//Modificar importancia requisito

function modificarImportancia($idRequisito, $importancia){
  global $conn;

	$sql = "UPDATE requisito SET importancia_requisito = '".$importancia."'
	WHERE id_requisito = ".$idRequisito."";

	$resultado = $conn->query($sql);

	if($resultado === true)
		return (true);
	return (false);
}


function modificarRequisito($idRequisito, $nombreRequisito, $descripcionRequisito, $esfuerzoRequisito){
  global $conn;

	$sql = "UPDATE requisito
	SET nombre_requisito = '".$nombreRequisito."',
	descripcion_requisito = '".$descripcionRequisito."',
	esfuerzo_requisito = '".$esfuerzoRequisito."'
	WHERE id_requisito = ".$idRequisito."";

	$resultado = $conn->query($sql);

	if($resultado === true)
		return (true);
	return (false);
}

//Modificar importancia requisito
function modificarEsfuerzo($idRequisito, $esfuerzo){
  global $conn;

	$sql = "UPDATE requisito SET esfuerzo_requisito = '".$esfuerzo."'
	WHERE id_requisito = ".$idRequisito."";

	$resultado = $conn->query($sql);

	if($resultado === true)
		return (true);
	return (false);
}

// Eliminar requisito
function eliminarProyecto($idRequisito){
  global $conn;

  $sql = "DELETE FROM requisito WHERE id_requisito= ".$idRequisito. "";

  $resultado = $conn->query($sql);

  if($resultado === true)
    return (true);
  return (false);
}

//Asignamos el requisito al proyecto
function asignarRequisitoProyecto($idRequisito, $idProyecto){
  global $conn;

  $sql = "INSERT INTO proyecto_has_requisito (proyecto_id_proyecto, requisito_id_requisito )
  VALUES ( '" . $idProyecto . "', '" . $idRequisito . "')";

  $resultado = $conn->query($sql);
  return $resultado;

	/*if($resultado === true)
		return (true);
	return (false);*/
}

//Metodo para buscar un requisito por su nombre
function buscarRequisito($nombre){
	global $conn;

	$sql = "SELECT id_requisito FROM requisito WHERE nombre_requisito = '" .$nombre."'";

	$resultado = $conn->query($sql);
	return $resultado;
}

function verRequisito($idRequisito){
  global $conn;

	$sql = "SELECT * FROM requisito WHERE id_requisito = '".$idRequisito."'";

	$resultado = $conn->query($sql);

	return $resultado;
}

function listarRequisitos(){
	global $conn;

	$sql = "SELECT id_requisito, nombre_requisito, descripcion_requisito, esfuerzo_requisito
	FROM requisito";

	$resultado = $conn->query($sql);

	return $resultado;
}
// Listar requisitos por proyecto
function listarRequisitoProyecto($idProyecto){
	global $conn;

	$sql = "SELECT requisito.id_requisito, requisito.nombre_requisito, requisito.descripcion_requisito, requisito.esfuerzo_requisito, requisito.esfuerzo_requisito
    FROM requisito
		INNER JOIN proyecto_has_requisito
		ON requisito.id_requisito = proyecto_has_requisito.requisito_id_requisito
		INNER JOIN Proyecto
		ON proyecto_has_requisito.proyecto_id_proyecto = proyecto.id_proyecto
	WHERE proyecto.id_proyecto = '".$idProyecto."'
	ORDER BY requisito.esfuerzo_requisito DESC";

	$resultado = $conn->query($sql);

	return $resultado;
}
/*
function listarRequisitoProyecto2($idProyecto){
	global $conn;

	$sql = "SELECT requisito.id_requisito, requisito.nombre_requisito, requisito.descripcion_requisito, requisito.esfuerzo_requisito
    FROM requisito
		INNER JOIN proyecto_has_requisito
		ON requisito.id_requisito = proyecto_has_requisito.requisito_id_requisito
		INNER JOIN Proyecto
		ON proyecto_has_requisito.proyecto_id_proyecto = proyecto.id_proyecto
		WHERE proyecto.id_proyecto = '".$idProyecto."'";

	$resultado = $conn->query($sql);

	return $resultado;
}*/

// Listar requisitos por proyecto
function listarRequisitoProyectoEsfuerzo($idProyecto){
    global $conn;

    $sql = "SELECT requisito.nombre_requisito, requisito.esfuerzo_requisito,
    FROM requisito
		INNER JOIN proyecto_has_requisito
		ON requisito.id_requisito = proyecto_has_requisito.requisito_id_requisito
		INNER JOIN Proyecto
		ON proyecto_has_requisito.proyecto_id_proyecto = proyecto.id_proyecto
		WHERE proyecto.id_proyecto = '".$idProyecto."'
		ORDER BY requisito.esfuerzo_requisito";

    $resultado = $conn->query($sql);

    return $resultado;
}
function borrarRequisitoGeneral($idRequisito){

  global $conn;
  $sql = "DELETE FROM requisito WHERE id_requisito= '" .$idRequisito ."'";

  $resultado = $conn->query($sql);
}

function borrarRequisito($idRequisito, $idProyecto){

  global $conn;
  $sql = "DELETE FROM proyecto_has_requisito WHERE requisito_id_requisito= '" .$idRequisito ."'
  AND proyecto_id_proyecto ='" .$idProyecto. "'";

  $resultado = $conn->query($sql);
}

//Obtenemos el id ultimo requisito creado
function getLastIDRequisito(){
  global $conn;

	$sql = "SELECT id_requisito FROM requisito ORDER BY id_requisito DESC LIMIT 1";
  $resultado = $conn->query($sql);

	return $resultado;
}

function verEsfuerzoImportancia($idRequisito){
	global $conn;

	$sql = "SELECT esfuerzo_requisito, importancia_requisito FROM requisito WHERE id_requisito = '" .$idRequisito."'";

	$resultado = $conn->query($sql);
  return $resultado;
}

function asignarImportanciaNula($idRequisito, $idUsuario) {
	global $conn;

	$sql = "INSERT INTO requisito_has_usuario (requisito_id_requisito, usuario_id_usuario, importancia_usuario)
	VALUES ('".$idRequisito."', '".$idUsuario."', '0')";

	$resultado = $conn->query($sql);

}

function asignarImportancia($idRequisito, $idUsuario, $importancia) {
	global $conn;

	$sql = "UPDATE requisito_has_usuario
	SET importancia_usuario = '".$importancia."'
	WHERE requisito_id_requisito = '".$idRequisito."' AND usuario_id_usuario = '".$idUsuario."'";

	$resultado = $conn->query($sql);

}

function obtenerImportanciaRequisito($idRequisito, $idUsuario) {

	global $conn;

	$consulta = "SELECT importancia_usuario
	FROM requisito_has_usuario
	WHERE requisito_id_requisito = '".$idRequisito."' AND usuario_id_usuario = '".$idUsuario."'";


	$resultado = $conn->query($consulta);

	return $resultado;
}

/*function obtenerImportanciaRequisito($idProyecto, $idRequisito, $idUsuario) {

	global $conn;

	$consulta = "SELECT importancia_usuario
	FROM requisito_has_usuario
		/*INNER JOIN requisito
		ON requisito_has_usuario.id_requisito = requisito.id_requisito
		INNER JOIN requisito_has_usuario
		ON requisito.id_requisito = requisito_has_usuario.requisito_id_requisito
		INNER JOIN usuario
		ON requisito_has_usuario.usuario_id_usuario = usuario.id_usuario
		INNER JOIN usuario_has_proyecto
		ON usuario.id_usuario = usuario_has_proyecto.usuario_id_usuario
		INNER JOIN proyecto
		ON usuario_has_proyecto.proyecto_id_proyecto = proyecto.id_proyecto
    WHERE requisito_has_usuario.id_requisito = '".$idRequisito."'
    AND proyecto_has_requisito.proyecto_id_proyecto = '".$idProyecto."'
    AND usuario_has_proyecto.usuario_id_usuario = '".$idUsuario."'";

	$resultado = $conn->query($consulta);

	return $resultado;
}*/
/*
function satisfaccionRequisito($idRequisito, $idUsuario, $idProyecto) {

	$satisfaccion = 0;
	$listaSat;
	$pesos = getPesos($idProyecto);
	$rowPesos = mysqli_fetch_all($pesos);
	$importancias = obtenerImportanciaUsuario($idProyecto, $idRequisito);
	$rowImportancias = mysqli_fetch_all($importancias);
	$requisitos = listarRequisitoProyecto2($idProyecto);
	$rowRequisitos = mysqli_fetch_all($requisitos);

	foreach ($rowRequisitos as $r) {
	 	foreach ($rowPesos as $p) {
	 		foreach ($rowImportancias as $i) {
	 		$satisfaccion = ($p * $i) + $satisfaccion;
	 		echo $satisfaccion;
			}
		}
		array_push($listaSat, $satisfaccion);
		$satisfaccion = 0;
	}
	return $listaSat;
}*/

function asignarSatisfaccionNula($idProyecto, $idRequisito){
  global $conn;

	$sql = "INSERT INTO proyecto_has_requisito (Proyecto_id_proyecto, Requisito_id_requisito, satisfaccion)
	VALUES ('".$idProyecto."', '".$idRequisito."', '0')";

	$resultado = $conn->query($sql);
}

function asignarSatisfaccion($idProyecto, $idRequisito, $satisfaccion) {
	global $conn;

	$sql = "UPDATE proyecto_has_requisito
	SET satisfaccion = '".$satisfaccion."'
	WHERE Proyecto_id_proyecto = '".$idProyecto."' AND Requisito_id_requisito = '".$idRequisito."'";

	$resultado = $conn->query($sql);

}

function mostrarSatisfaccion($idProyecto){
  global $conn;

  $sql = "SELECT requisito.id_requisito, requisito.nombre_requisito ,requisito.esfuerzo_requisito, proyecto_has_requisito.satisfaccion
  FROM proyecto_has_requisito
  INNER JOIN requisito
  ON proyecto_has_requisito.Requisito_id_requisito = requisito.id_requisito
  WHERE proyecto_has_requisito.Proyecto_id_proyecto = '".$idProyecto."'
  ORDER BY proyecto_has_requisito.satisfaccion DESC";

  $result = $conn->query($sql);

  return $result;
}


 ?>
