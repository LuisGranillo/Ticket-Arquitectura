<?php
$resp=$_POST["resp"];
$id_resp=$_POST["id_respuesta"];
$imagen= $_FILES['foto']['name'];
$id_usuario=$_POST["cod"];
$intenger=(int)$id_usuario;
$id=$_POST["detalles"];
if($_FILES['foto']['name']!=""){


  $imagen=addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));

}
else{
  $imagen='';

}

include("../conexion_ticket.php");
$resp="UPDATE respuesta SET descripcion='$resp',imagen='$imagen' WHERE id_respuesta='$id_resp'";
$hilorep=$conexion->query($resp);
echo "<script> 
alert('Se actualizo la respuesta correctamente'); 
window.location.href='detalles_tareas.php?cod=$id_usuario&detalles=$id'; 
</script>"; 