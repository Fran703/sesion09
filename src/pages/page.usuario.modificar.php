<?php
  include_once "./modelo/usuario.php";

        $comprobar = false;

        echo "<h1>Modificar información</h1>";
        if(isset($_GET['id2']) && isset($_GET['email']) && isset($_GET['clave'])) {
          $resultado = modificarUsuario($_GET['id2'], $_GET["email"], $_GET["clave"], $_GET["clave2"]);
          if($resultado === true){
            ?><i class="fa fa-check" aria-hidden="true"></i>
            <div class="alert alert-success" role="alert"><h2>Se ha modificado la información con éxito</h2></div>
            <?php
            $comprobar = true;
            ?><br><?php
          }else{
            ?><i class="fa fa-times" aria-hidden="true"></i>
            <div class="alert alert-danger" role="alert"><h2>Ha habido un error y no se ha podido modificar la información del usuario con éxito</h2></div>
            <?php
            $comprobar = false;
            ?><br>
            <?php
          }
        }
        $row = verUsuario($_GET['id2']);
        $row = mysqli_fetch_assoc($row);
        
          if($comprobar == false) {?>
          <h3>Modificando Usuario</h3>
              <div class="margin">
            <hr>
            <form id2="modificarInformacion" action="usuario.modificar.php" method="get">
           <div class="input-group margin">      
           <span class="input-group-addon default-addon" id2="email">Email</span>
           <input type="text" class="form-control" name="email">
           </div>
           <div class="input-group margin"> 
           <span class="input-group-addon default-addon" id2="user">Usuario</span>
           <input type="text" class="form-control" name="id2" value="<?php echo $_GET['id2']; ?>" READONLY>
           </div>
           <div class="input-group margin"> 
           <span class="input-group-addon default-addon" id2="clave">Password</span>
           <input type="text" class="form-control" name="clave">
           </div>
           <div class="input-group margin"> 
           <span class="input-group-addon default-addon" id2="clave2">Repetir Password</span>
           <input type="text" class="form-control" name="clave2">
           </div>
         <button name="modificarUsuario" type="submit" class="btn btn-secondary">Modificar</button>
          <td>
          <a href="<?php echo URL_INDEX; ?>" class="btn btn-secondary" role="button">Cancelar</a>
         </td>
        </form>
    </div>
          <?php  
          }
          ?>