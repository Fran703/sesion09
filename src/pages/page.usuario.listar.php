<?php
include_once "./modelo/usuario.php";
echo "<h1>Lista de todos los miembros </h1>";

$resultado = listarUsuarios();
$resultado1 = mysqli_fetch_all($resultado);

?>
<div class="cuerpoInformacion">
  <table class="table table-hover">
  	<thead>
  		<tr>
  			<th>Nombre</th>
        <th>Email</th>
        <th>Activo</th>
        <th>Acciones</th>
  		</tr>
  	</thead>
  	<tbody>
<?php
    foreach ($resultado1 as $row){
      ?>
        <tr>
          <td><?php echo $row[0]?></td>
          <td><?php echo $row[1]?></td>
          <?php 
          if($row[2] == 0) {
            ?>
            <td><?php echo "No"?></td>
            <?php
          }
          else {
            ?>
          <td><?php echo "Sí"?></td>
          <?php
        } ?>
          <td> <a href="usuario.modificar.php?id2=<?php echo $row[0]; ?>" class="btn btn-tercero btn-xs" role="button"><b>Modificar</b></a>
          </td>
          <td>
          <a href="usuario.borrar.php?id=<?php echo $row[0]; ?>" class="btn btn-secondary btn-xs" role="button"><b>Borrar</b></a>
          </td>
        </tr>
        <?php
    }
  ?>
     </tbody>
   </table>
 </div>