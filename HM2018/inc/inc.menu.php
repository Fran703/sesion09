<!--Si el usuario está logueado-->
<div class="list-group">
  <a href="index.php" type="button" class="list-group-item">Inicio</a>
  <!--<a href="foro/index.php" type="button" class="list-group-item" target="_blank">Foro</a>-->
</div>
<!-- -->

<!--Si el usuario está logueado y es administrador-->
<?php
if(isset($_SESSION['usuario'])){
?>
  <h4>Acciones</h4>
  <div class="list-group">
    <a href="usuario.listar.php" type="button" class="list-group-item">Listar Usuarios</a>
    <a href="usuario.nuevo.admin.php" type="button" class="list-group-item">Crear Usuario</a>
    
  </div>
<?php
}
?>
<!-- USUARIO NORMAL
<?php
if(isset($_SESSION['idUsuario'])){
?>
  <h4>Proyecto</h4>
  <div class="list-group">
    <a href="proyecto.nuevo.php" type="button" class="list-group-item">Crear proyecto</a>
    <a href="proyecto.nuevo.php" type="button" class="list-group-item">Crear requisito</a>
    <a href="proyecto.listar.php" type="button" class="list-group-item">Mis proyectos</a>
  </div>-->
  <h4>Perfil</h4>
  <div class="list-group">
    <a href="perfil.modificar.php" class="list-group-item">Modificar perfil</a>

  </div><!--
<?php
}
?>
-->
<!-- -->
