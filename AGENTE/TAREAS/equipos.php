
<?php


$id_tarea=$_POST['id_tarea'];
$id_usuario=$_POST['id_usuario'];
$asignar_equipo=$_POST['asignar_equipo'];


$id_cola=$_POST['id_cola'];

$equipos_selec=$_POST['equipos_selec'];
$aclaracion_equipo=$_POST['aclaracion_equipo'];


$integer = (int)$id_usuario;

$id_equipo = intval(preg_replace("/[^0-9]+/", "", $equipos_selec), 10);

$equipos_seleccionados = (int)$id_equipo;

include("conexion1.php");
$tareas="SELECT*FROM tarea WHERE idTarea='$id_tarea'";
$tareas_pr=$conexion->query($tareas);
while($rowactee=$tareas_pr->fetch_assoc()){

$pr=$rowactee['pr'];


  }
  include("conexion4.php");
  $correos="SELECT*FROM usuario WHERE id_usuario='$pr'";
  $resultado_cor=$conexion->query($correos);
  while($rowactc=$resultado_cor->fetch_assoc()){
  
  $nombre_usuario2=$rowactc['nombre'];
  $apellido_usuario2=$rowactc['apellidos'];
    }

    if($id_usuario!=$pr){ 
 if($asignar_equipo=='equpo')
 {           
   include("conexion1.php");

$procuradores="UPDATE tarea SET idequipo='$equipos_seleccionados' where idTarea = '$id_tarea'"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
$asignacion=mysqli_query($conexion,$procuradores);

include("conexion4.php");
$aclarar2="INSERT INTO actualizaciones (id_usuario,descripcion,idtarea) VALUES ('$integer','El motivo de transferir la tarea fue :$aclaracion_equipo','$id_tarea')"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
$comentario_de_eliminacion2=mysqli_query($conexion,$aclarar2);

echo "<script> 
alert('Se ha asignado el equipo en las  tareas seleccioandas de manera correcta'); 
window.location.href='/UTP/AGENTE/TAREAS/aviso_equipo.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
</script>";

    }
  }
else  {  
  echo "<script> 
  alert('No puedes asignar un equipo ya que no eres el creador de esta tarea'); 
  window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
  </script>";

  }



