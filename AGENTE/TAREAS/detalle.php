
<?php
$cread=$_GET['creador'];
$id=$_GET['id'];

$usur=$_GET['creador'];
$integer = (int)$usur;

include("conexion1.php");
      


  $query2="INSERT INTO aclaraciones (id_usuario,id_tarea) VALUES ('$cread','$id')";

$resultado2=$conexion->query($query2);

$query="INSERT INTO colas_de_tareas (tipo_de_estado,id_creador,estado,idTarea) VALUES ('Abierto','$integer','Abierto','$id')";
$resultado=$conexion->query($query);
if($resultado){
  echo "se inserto correctamente";
  header("Location:/UTP/AGENTE/TAREAS/tareas2.php?codigo=$integer&id=$id&usur=$integer");


}
else{

  echo "fallas al isertar";

  printf("Errormessage: %s\n", mysqli_error($conexion));
     }

?>
