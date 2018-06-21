<?php
  include_once "./modelo/usuario.php";

  echo "<h1>Borrando usuario</h1>";
  if(isset($_POST["user"])){
    $usuarioEliminado = $_POST["user"];
    borrarUsuario($usuarioEliminado);
    ?>
    <div class="alert alert-success">
      <h6><strong>¡Usuario eliminado!</strong> Usuario con nombre =<?php echo $usuarioEliminado ?> ha sido borrado.</h6>
    </div>
    <?php
  }else{
    $row = verUsuario($_GET['id']);
    $row = mysqli_fetch_assoc($row);
?>
    <div class="margin">
            <hr>
            <form id="borrarInformacion" action="usuario.borrar.php" method="post">
           <h5>¿Desea borrarlo?</h5>
           <div class="input-group margin">      
           <span class="input-group-addon default-addon" id="email">Email</span>
           <input type="text" class="form-control" name="user" value="<?php echo $row['email']; ?>" READONLY>
           </div>
           <div class="input-group margin"> 
           <span class="input-group-addon default-addon" id="user">Usuario</span>
           <input type="text" class="form-control" name="user" value="<?php echo $row['Username']; ?>" READONLY>
           </div>
         <button name="borrarUsuario" type="submit" class="btn btn-secondary">Eliminar</button>
          <td>
          <a href="<?php echo URL_INDEX; ?>" class="btn btn-secondary" role="button">Cancelar</a>
         </td>
        </form>
    </div>

<?php
  }
?>