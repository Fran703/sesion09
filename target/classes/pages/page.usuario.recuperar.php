<h3>Recuperar contraseña</h3>
<?php if(isset($_POST["usuario"]) && isset($_POST["email"])){

    $resultado = recuperarClave($_POST["usuario"]);
    $resultado1 = mysqli_fetch_assoc($resultado);

    ?> <b>Usuario:</b> <?php  echo $resultado1['nombre_usuario'];
    ?> <br><b>Contraseña:</b> <?php  echo $resultado1['contraseña_usuario'];

} else{?>

  <form id="recuperarClave" action="usuario.recuperar.php" method="post">
    <div class="input-group margin">
      <span class="input-group-addon" id="usuario">Usuario</span>
      <input type="text" class="form-control" name="usuario" aria-describedby="usuario">
    </div>
    <div class="input-group margin">
      <span class="input-group-addon" id="email">Email</span>
      <input type="text" class="form-control" name="email" aria-describedby="email">
    </div>
    <input type="submit" class="btn btn-primary" value="Recuperar">
  </form>
<?php
}
?>
