<?php
include("../conexion_ticket.php");
$id_tarea=$_POST["id_tarea"];
$cod=$_POST["cod"];
$id_archivo=$_POST["id2"];
$ver_pdf="SELECT*FROM archivo WHERE id_archivo='$id_archivo'";
$si2=mysqli_query($conexion,$ver_pdf);
$fin=mysqli_fetch_array($si2);

 $ruta="subir_archivos/".$fin['imagen']."";
 unlink($ruta);
 
  $query20="UPDATE archivo SET imagen ='' WHERE id_archivo='$id_archivo'";
 $resultado20=$conexion->query($query20);
 echo "<script> 
alert('Se borro la imagen correctamente'); 
window.location.href='detalles_tareas.php?cod=$cod&detalles=$id_tarea'; 
</script>"; 
?>