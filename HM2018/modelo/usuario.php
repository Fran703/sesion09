<?php

// Metodo para dar de alta a un usuario

function altaUsuario($usuario, $contraseña, $correo, $fechaCreacion, $fechaUltimoAcceso, $contraseña2){
	global $conn;
	if(empty($correo)) {
  	?>
        <div class="alert alert-danger" role="alert">El email no puede ser vacío</div>
    <?php
    return 0;
	}
    if(empty($usuario)) {
    ?>
    	<div class="alert alert-danger" role="alert">El usuario no puede ser vacío</div>
    <?php
    return 0;
    }
    if(empty($contraseña)) {
    ?>
    	<div class="alert alert-danger" role="alert">La contraseña no puede ser vacía</div>
    <?php
    return 0;
    }
    $buscarCorreo = "SELECT * FROM usuario WHERE email = '$correo'";
    $resultado = $conn->query($buscarCorreo);
    $contador = mysqli_num_rows($resultado);

    if($contador == 1) {
    ?>
    	<div class="alert alert-danger" role="alert">El correo ya existe</div>
    <?php
    return 0;
    }

    $buscarUsuario = "SELECT * FROM usuario WHERE Username = '$usuario'";
    $resultado2 = $conn->query($buscarUsuario);
    $contador2 = mysqli_num_rows($resultado2);

    if($contador2 == 1) {
    ?>
    	<div class="alert alert-danger" role="alert">El usuario ya existe</div>
    <?php return 0;
    }
    if($contraseña != $contraseña2) {
    ?>
    	<div class="alert alert-danger" role="alert">Las contraseñas no coinciden</div>
    <?php return 0;
    }


  	else {

	global $conn;

	$sql = "INSERT INTO usuario (username, password, email, activo, rol, fechaCreacion, fechaUltimoAcceso)
	VALUES ( '" . $usuario . "' , '" . $contraseña . "' , '" . $correo . "' , '0' , 'usuario' , '" . $fechaCreacion . "' , '" . $fechaUltimoAcceso. "')";

	if ($conn->query($sql) === TRUE)
		return (true);
	return (false);
  return 1;
	}
}

function altaUsuarioAdmin($usuario, $contraseña, $correo, $activo, $rol, $fechaCreacion, $fechaUltimoAcceso, $contraseña2){
	global $conn;
	if(empty($correo)) {
  	?>
        <div class="alert alert-danger" role="alert">El email no puede ser vacío</div>
    <?php
	}
    if(empty($usuario)) {
    ?>
    	<div class="alert alert-danger" role="alert">El usuario no puede ser vacío</div>
    <?php
    }
    if(empty($contraseña)) {
    ?>
    	<div class="alert alert-danger" role="alert">La contraseña no puede ser vacía</div>
    <?php
    }
    $buscarCorreo = "SELECT * FROM usuario WHERE email = '$correo'";
    $resultado = $conn->query($buscarCorreo);
    $contador = mysqli_num_rows($resultado);

    if($contador == 1) {
    ?>
    	<div class="alert alert-danger" role="alert">El correo ya existe</div>
    <?php
    }

    $buscarUsuario = "SELECT * FROM usuario WHERE Username = '$usuario'";
    $resultado2 = $conn->query($buscarUsuario);
    $contador2 = mysqli_num_rows($resultado2);

    if($contador2 == 1) {
    ?>
    	<div class="alert alert-danger" role="alert">El usuario ya existe</div>
    <?php
    }
    if($contraseña != $contraseña2) {
    ?>
    	<div class="alert alert-danger" role="alert">Las contraseñas no coinciden</div>
    <?php
    }

    else {

	global $conn;

	$sql = "INSERT INTO usuario (username, password, email, activo, rol, fechaCreacion, fechaUltimoAcceso)
	VALUES ( '" . $usuario . "' , '" . $contraseña . "' , '" . $correo . "' , '" . $activo. "' , '" . $rol . "' , '" 
	. $fechaCreacion . "' , '" . $fechaUltimoAcceso. "')";

	if ($conn->query($sql) === TRUE)
		return (true);
	return (false);
	}
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
		$sql = "UPDATE usuario SET password = '".$contraseñaNueva."' WHERE Username = ".$idUsuario."" ;
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
		$sql = "UPDATE usuario SET email = '".$correoNuevo."' WHERE Username = ".$idUsuario."";
		$resultado = $conn->query($sql);

		if($resultado === true)
			return (true);
		return (false);
	}
}

// Metodo que modifica el rol del usuario
function modificarRol($idUsuario, $rolNuevo){
  global $conn;

  $sql = "UPDATE usuario SET rol = '".$rolNuevo."' WHERE Username = ".$idUsuario."";
  $resultado = $conn->query($sql);

  if($resultado === true)
    return (true);
  return (false);
}

//Listar todos los usuarios
function listarUsuarios(){
	global $conn;

	$sql = "SELECT Username, email, activo  FROM usuario
	ORDER BY Username DESC";

	$resultado = $conn->query($sql);
	//$resultado = mysqli_query($conn, $sql);
	return $resultado;
	/*if($resultado === true)
		return $resultado;*/
}

function borrarUsuario($user){

  global $conn;
  $sql = "DELETE FROM usuario WHERE Username= '" .$user ."'";
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
} else {
    echo "Error deleting record: " . $conn->error;
}
}

function verUsuario($user){
  global $conn;

	$sql = "SELECT * FROM usuario WHERE Username = '".$user."'";

	$resultado = $conn->query($sql);

	return $resultado;
}

function modificarUsuario($user, $email, $pass, $pass2){
	global $conn;
	if(empty($email)) {
  	?>
        <div class="alert alert-danger" role="alert">El email no puede ser vacío</div>
    <?php
	}
    if(empty($pass)) {
    ?>
    	<div class="alert alert-danger" role="alert">La contraseña no puede ser vacía</div>
    <?php
    }
    $buscarCorreo = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conn->query($buscarCorreo);
    $contador = mysqli_num_rows($resultado);

    if($contador == 1) {
    ?>
    	<div class="alert alert-danger" role="alert">El correo ya existe</div>
    <?php
    }

    if($pass != $pass2) {
    ?>
    	<div class="alert alert-danger" role="alert">Las contraseñas no coinciden</div>
    <?php
    }
    else {

	global $conn;

	$sql = "UPDATE usuario
	SET email = '".$email."', password = '".$pass."'
	WHERE Username = '".$user."'";

	$resultado = $conn->query($sql);

	if($resultado === true)
		return (true);
	return (false);
	}
}

//Metodo de login
function login($usuario, $contraseña){
  if(empty($usuario) || empty($contraseña)) {
  	?>
        <div class="alert alert-danger" role="alert">Usuario o contraseña vacíos</div>
        <?php
        return 0;
  }
  else {
	global $conn;

	$sql = "SELECT * FROM usuario WHERE username = '" .$usuario."' AND password = '" .$contraseña."'";

	$resultado = $conn->query($sql);

	$row = mysqli_fetch_assoc($resultado);

			//Iniciar sesion
			//session_start();
			//Guardamos el usuario
			$_SESSION["usuario"] = $row["Username"];
			//Guardamos el estado
			$_SESSION["conectado"] = true;
			//Guardamos el idUsuario
			//$_SESSION["idUsuario"] = $row["id_usuario"];
			//Guardamos el correo
			$_SESSION["correo"] = $row["email"];
						//Guardamos el correo
			$_SESSION["activo"] = $row["activo"];
			//Rol del usuario
			$_SESSION["rol"] = $row["rol"];
						//Rol del usuario
			$_SESSION["fechaCreacion"] = $row["fechaCreacion"];
						//Rol del usuario
			$_SESSION["fechaUltimoAcceso"] = date("y-m-d");
			//modficarFechaUltimoAcceso(date("y-m-d"));

      return 1;
		}
  }

    // Metodo de logout
    function logout(){

    // ELimina todas las variables
    session_unset();
    // destruye la sesion.
   session_destroy();
}
?>
