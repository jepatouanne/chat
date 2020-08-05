<?php
include "db.php";
$consulta = "SELECT * FROM chat ORDER BY id DESC";
$ejecutar = $conexion->query($consulta);
while($fila = $ejecutar->fetch_array()):
?>
<div id="datos-chat">
  <span style="color:rgb(27,79,114);"><?php echo $fila['nombre']; ?>:</span>
  <span style="color:rgb(98,101,103);"><?php echo $fila['mensaje']; ?></span>
  <span style="float:right;"><?php echo formatearfecha($fila['fecha']); ?></span>
</div>
<?php endwhile; ?>
