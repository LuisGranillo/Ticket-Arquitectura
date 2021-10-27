<?php
$hilos=$_POST["hilos"];
include("../conexion_ticket.php");
$query2="SELECT*FROM hilo WHERE id_hilo='$hilos'";

$resultado2=$conexion->query($query2);
if($resultado2)
{ 
while($row=$resultado2->fetch_assoc()){

  $id_tarea=$row['idTarea'];

  }
}
$consulta="DELETE FROM hilo WHERE id_hilo='$hilos'";
$borrarhilo=$conexion->query($consulta);

 $integer2 = (int)$id_tarea;
            $borra_tarea="CALL Borrar_tarea($integer2)";
  
    $procedimiento=mysqli_query($conexion,$borra_tarea);
    
    include("../conexion.php");
    $borrar_colaboradores="CALL borra_colaboradores($integer2)";
  
    $procedimiento=mysqli_query($conexion,$borrar_colaboradores);
      echo "Se ha eliminado las tareas seleccionadas correctamente se vera reflejado en 300 segundos el cambio";