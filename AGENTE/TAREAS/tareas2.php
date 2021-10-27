
<?php


$fecha=$_GET['fecha'];

$creador=$_GET['codigos'];
$codigos=$_GET['codigo'];
$idTarea=$_GET['id'];
$integer = (int)$codigos;

include("conexion1.php");

$query="SELECT*FROM  colas_de_tareas WHERE idTarea='$idTarea'";
$resultado=$conexion->query($query);
while($row=$resultado->fetch_assoc()){

$id_ticket=$row['id_cola'];
$tarea=$row['idTarea'];

  }

if($tarea==null){
    header("Location:/UTP/AGENTE/TAREAS/detalle.php?creador=$creador&id=$idTarea&usur=$integer&codigo=$integer");


}
if($tarea!=null){


    $query3="UPDATE tarea SET id_cola='$id_ticket' where idTarea='$tarea'";

    $resultado3=$conexion->query($query3);
    
    if($resultado3){
      echo " actualizo correctamente";

        header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_ticket&usur=$integer");

    }
    else{
    
      echo "fallas al actualizar";
      printf("Errormessage: %s\n", mysqli_error($conexion));
         }
    
}