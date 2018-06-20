<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!--Si usuario no está logueado-->
<?php
include_once "./modelo/usuario.php";

if(isset($_POST['usuario']) && isset($_POST['clave'])){
    login($_POST['usuario'], $_POST['clave']);
}


if(!isset($_SESSION['usuario'])){
 ?>

<h4>Acceso</h4>
<form class="clearfix" id="postLogin" action="./index.php" method="post">
  <p>
    <div class="input-group input-group-sm">
      <span class="input-group-addon"><i class="fa fa-user"></i></span>
      <input name="usuario" type="text" class="form-control" placeholder="Usuario">
    </div>
  </p>
  <p>
    <div class="input-group input-group-sm">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      <input name="clave" type="password" class="form-control" placeholder="Clave">
    </div>
  </p>
  <p>
    <button type="submit" class="btn btn-primary">Entrar</button>
  </p>
    <p>
      <?php
      echo "Si aun no tiene cuenta: ";
      ?>
    <a href="usuario.nuevo.php">Registrarse</a><br>
  </p>

</form>

<!--introducir usuario al dar al link -> recuperarClave.php?usuario=nombreusuario -> mandar nueva clave al email del usuario-->
<!-- -->
<?php
}
else if($_SESSION['rol'] == 'admin') {
  ?>
<!--Si el usuario está logueado-->
<p>
  <div class="reloj text-center"></div>
</p>
<p class="text-center">
  Bienvenido <b><?php echo $_SESSION['usuario'];?></b>
  <br><br>
  <!--añadir url php logout-->
  <a href="./salir.php"><i class="fa fa-power-off"></i> Salir del sistema</a>
</p>
<hr>
<h4>Menú</h4>
  <?php require_once URL_MENU; ?>
<hr>

<?php
}
else {
  ?>
  <p>
  <div class="reloj text-center"></div>
</p>
<p class="text-center">
  Bienvenido <b><?php echo $_SESSION['usuario'];?></b>
  <br><br>
  <!--añadir url php logout-->
  <a href="./salir.php"><i class="fa fa-power-off"></i> Salir del sistema</a>
</p>
<hr>
<h4>Menú</h4>
  <?php require_once URL_MENU2; ?>
<hr>
<!-- -->

<?php
}
?>
