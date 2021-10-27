<?php
include("../conexion_ticket.php");
$id_tarea=$_POST["id_tarea"];
$cod=$_POST["cod"];
$id_archivo=$_POST["id2"];
$ver_pdf="SELECT*FROM archivo WHERE id_archivo=".$_POST['id2'];
$si2=mysqli_query($conexion,$ver_pdf);
$fin=mysqli_fetch_array($si2);

 $ruta="subir_archivos/".$fin['nombre_archivo']."";
 unlink($ruta);
 $intenger=(int)$id_archivo;
  $query20="UPDATE archivo SET id_cola='',Titulo='',descripcion='',tamaño='',tipo='',nombre_archivo='' WHERE id_archivo='$intenger'";
 $resultado20=$conexion->query($query20);
 echo "<script> 
alert('Se borro el archivo  correctamente'); 
window.location.href='detalles_tareas.php?cod=$cod&detalles=$id_tarea'; 
</script>"; 
?>