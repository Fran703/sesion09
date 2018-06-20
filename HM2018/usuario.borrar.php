<?php require_once 'init.php';
require_once URL_CONTROL;
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once URL_HEAD; ?>
  </head>
  <body>
    <div class="container-fluid contenedorCabecera">
        <?php require_once URL_HEADER; ?>
    </div>
    <div class="container-fluid contenedorCuerpo">
        <div class="container contenedorCuerpoCentral">
          <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12 cuerpoIzquierda">
                <?php require_once URL_LEFT; ?>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12 cuerpoDerecha">
                <ol class="breadcrumb">
                  <li><a href="<?php echo URL_INDEX; ?>">Inicio</a></li>
                  <li>Borrar Usuario</li>
                </ol>
                <?php require_once URL_USUARIO_BORRAR; ?>
                <br>
              </div>
          </div>
        </div>
    </div>
    <div class="container-fluid contenedorPie">
        <?php require_once URL_FOOTER; ?>
    </div>
    <?php require_once URL_SCRIPTS; ?>
  </body>
</html>
