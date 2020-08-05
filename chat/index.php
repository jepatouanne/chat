<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="APLICACION CHAT">
    <meta name="keywords" content="HTML,CSS,PHP,JQUERY">
    <meta name="author" content="JEAN PAUL BIGOT">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
     <title>CHAT</title>
     <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani&display=swap" rel="stylesheet">
     <script>
     function ajax(){
       var req = new XMLHttpRequest();
       req.onreadystatechange = function(){
         if(req.readyState == 4 && req.status == 200){
           document.getElementById('chat').innerHTML = req.responseText;
         }
         }
         req.open('GET', 'chat.php', true);
         req.send();
     }
     //linea que hace se refresque el chat cada segundo
     setInterval(function(){ajax();},1000);
     </script>

  </head>
  <body onload="ajax();">
    <div id="contenedor">
      <div id="caja-chat">
        <div id="chat">
                    </div>
        </div>
        <form method="POST" action="index.php">
          <input type="text" name="nombre" placeholder="Ingrese su nombre">
          <textarea name="mensaje" placeholder="Ingresa tu mensaje">
          </textarea>
          <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
        if(isset($_POST['enviar']))
        {
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
$ejecutar = $conexion->query($consulta);
if($ejecutar){
  echo "<embed loop = 'false' src= 'beep.mp3' hidden= 'true' autoplay = 'true'>";
}
        }
        ?>
    </div>

  </body>
</html>
