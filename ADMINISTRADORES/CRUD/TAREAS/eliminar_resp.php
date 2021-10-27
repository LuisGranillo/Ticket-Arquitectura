<?php
$id_respuesta=$_POST["id_respuesta"];
$usuario=$_POST["id_usuario"];
$intenger=(int)$id_respuesta;
$intenge2=(int)$usuario;
$detalles=$_POST["detalles"];
$intenge3=(int)$detalles;

include("../conexion_ticket.php");
$resp="DELETE FROM respuesta WHERE id_respuesta='$intenger'";
$hilorep=$conexion->query($resp);
echo "<script> 
alert('Se elimino la respuesta correctamente'); 
window.location.href='detalles_tareas.php?cod=$intenge2&detalles=$intenge3'; 
</script>"; 