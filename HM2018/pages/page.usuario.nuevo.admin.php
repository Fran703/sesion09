<?php
include_once "./modelo/usuario.php";

/*
if($_SESSION["conectado"]){

  ?>

  <p> No puedes realizar esta acción</p>

  <?php

} else{*/
  if( isset($_GET['clave']) && isset($_GET['usuario']) && isset($_GET['email'])  && isset($_GET['clave2'])){
    $rol;
    $fechaC = date("y-m-d");
    $fechaUltAcc = date("y-m-d");
    $validar = altaUsuarioAdmin($_GET['usuario'], $_GET['clave'], $_GET['email'], $_GET['activo'], $_GET['rol'], 
                                        $fechaC, $fechaUltAcc, $_GET['clave2']);
    //if() {
        if($validar){
?>
<div class="alert alert-success" role="alert"><h2>Se ha registrado el usuario con éxito.</h2></div>
      <?php
    } else{
      ?>
      <h2>No se ha podido realizar el registro de usuario</h2>
      <?php
    }
  }
//}
  else {
?>



  <h3>Crear Usuario</h3>

  <form id="nuevoUsuario" action="usuario.nuevo.php" method="get">
     <div class="input-group margin">
      <span class="input-group-addon default-addon" id="email">Email</span>
      <input type="text" class="form-control" name="email" aria-describedby="email" id="email">
    </div>
    <div class="input-group margin">
      <span class="input-group-addon default-addon" id="usuario">Usuario</span>
      <input type="text" class="form-control" name="usuario" aria-describedby="usuario" id="usuario">
    </div>
    <div class="input-group margin">
      <span class="input-group-addon default-addon" id="clave">Password</span>
      <input type="text" class="form-control" name="clave" aria-describedby="clave" id="clave">
    </div>
        <div class="input-group margin">
      <span class="input-group-addon default-addon" id="clave2">Repetir Password</span>
      <input type="text" class="form-control" name="clave2" aria-describedby="clave2" id="clave2">
    </div>
    <div class="form-check"><?php
      echo "<br><input type='checkbox' name='activo'/> Activo<br>";
  ?></div><br>
      </div>
    <div class="input-group margin">
      <input type="radio" name = "rol"
      <?php
      if(isset($rol) && $rol == 'admin') echo 'checked'; ?>
      value = 'admin'>Admin
    <input type="radio" name = "rol"
      <?php
      if(isset($rol) && $rol == 'usuario') echo 'checked'; ?>
      value = 'usuario'>Usuario

    </div>
    <input type="submit" class="btn btn-secondary" value="Registrarse">
    <a href="index.php" class="btn btn-secondary">Cancelar</a><br>
  </form>


  <?php
  }

//}
?>
