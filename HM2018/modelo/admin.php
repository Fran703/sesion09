<?php

// Metodo para dar de alta a un usuario
function altaUsuario($usuario, $contraseña, $correo, $peso){
	global $conn;

	$sql = "INSERT INTO usuario (nombre_usuario, contraseña_usuario, correo_usuario, peso_usuario, rol_usuario)
	VALUES ( '" . $usuario . "' , '" . $contraseña . "' , '" . $correo . "' , '" . $peso. "', 'Cliente')";

	if ($conn->query($sql) === TRUE)
		return (true);
	return (false);
}

// Metodo para recuperar clave usuario.
function recuperarClave($usuario){
	global $conn;

	$sql = "SELECT usuario.nombre_usuario, usuario.contraseña_usuario FROM usuario WHERE nombre_usuario = '" .$usuario."'";

	$resultado = $conn->query($sql);

	return $resultado;
}

// Metodo para modificar la contraseña
function modificarContraseña($idUsuario, $contraseña, $contraseñaNueva){
	global $conn;

	if($contraseña == $contraseñaNueva)
		return (0);
	else{
		$sql = "UPDATE usuario SET contraseña_usuario = '".$contraseñaNueva."' WHERE id_usuario = ".$idUsuario."" ;
		$resultado = $conn->query($sql);

		if($resultado === true)
			return (1);
		return (0);
	}
}

// Metodo para cambiar el correo
function modificarCorreo($idUsuario, $correoAntiguo, $correoNuevo){
	global $conn;

	if($correoAntiguo == $correoNuevo)
		return (false);
	else{
		$sql = "UPDATE usuario SET correo_usuario = '".$correoNuevo."' WHERE id_usuario = ".$idUsuario."";
		$resultado = $conn->query($sql);

		if($resultado === true)
			return (true);
		return (false);
	}
}

// Metodo que modifica el rol del usuario
function modificarRol($idUsuario, $rolNuevo){
  global $conn;

  $sql = "UPDATE usuario SET rol_usuario = '".$rolNuevo."' WHERE id_usuario = ".$idUsuario."";
  $resultado = $conn->query($sql);

  if($resultado === true)
    return (true);
  return (false);
}

// Metodo que modifica el rol del usuario
function modificarPeso($idUsuario, $pesoNuevo){
  global $conn;

  $sql = "UPDATE usuario SET peso_usuario = '".$pesoNuevo."' WHERE id_usuario = ".$idUsuario."";
  $resultado = $conn->query($sql);

  if($resultado === true)
    return (true);
  return (false);
}

function getPesos($idProyecto){
  global $conn;

  $sql = "SELECT peso_usuario
  FROM usuario
  INNER JOIN usuario_has_proyecto
		ON proyecto.id_proyecto = usuario_has_proyecto.proyecto_id_proyecto
		INNER JOIN usuario
		ON usuario_has_proyecto.usuario_id_usuario = usuario.id_usuario
 WHERE proyecto.id_proyecto = '".$idProyecto."'";

  $resultado = $conn->query($sql);

  return $resultado;
}

// Metodo para modificar el admin del Usuario
function modificarAdmin($idUsuario, $adminNuevo){
  global $conn;

  $sql = "UPDATE usuario SET admin_usuario = '".$adminNuevo."' WHERE id_usuario = ".$idUsuario."";
  $resultado = $conn->query($sql);

  if($resultado === true)
    return (true);
  return (false);
}

//Metodo para buscar un usuario por su nombre
function añadirUsuario($nombre){
	global $conn;

	$sql = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '" .$id_usuario."'";

	$resultado = $conn->query($sql);

		return $resultado;
}

//Listar todos los usuarios
function listarUsuarios(){
	global $conn;

	$sql = "SELECT id_usuario, nombre_usuario, peso_usuario, correo_usuario  FROM usuario WHERE rol_usuario = 'Cliente'
	ORDER BY peso_usuario DESC";

	$resultado = $conn->query($sql);
	//$resultado = mysqli_query($conn, $sql);
	return $resultado;
	/*if($resultado === true)
		return $resultado;*/
}

//Metodo de login
function login($usuario, $contraseña){
	global $conn;

	$sql = "SELECT * FROM usuario WHERE nombre_usuario = '" .$usuario."' AND contraseña_usuario = '" .$contraseña."'";

	$resultado = $conn->query($sql);

	$row = mysqli_fetch_assoc($resultado);

			//Iniciar sesion
			//session_start();
			//Guardamos el usuario
			$_SESSION["usuario"] = $row["nombre_usuario"];
			//Guardamos el estado
			$_SESSION["conectado"] = true;
			//Guardamos el idUsuario
			$_SESSION["idUsuario"] = $row["id_usuario"];
			//Guardamos el correo
			$_SESSION["correo"] = $row["correo_usuario"];
			//Guardamos el peso
			$_SESSION["peso"] = $row["peso_usuario"];
			//Rol del usuario
			$_SESSION["rol"] = $row["rol_usuario"];
}

function verRolPeso($idUsuario){
	global $conn;

	$sql = "SELECT rol_usuario, peso_usuario FROM usuario WHERE id_usuario = '" .$idUsuario."'";

	$resultado = $conn->query($sql);

	return $resultado;
}

// Metodo de logout
function logout(){

	// ELimina todas las variables
	session_unset();
	// destruye la sesion.
	session_destroy();
}

?>
