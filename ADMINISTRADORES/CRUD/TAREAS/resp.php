<?php

$respuesta=$_POST["comentario"];
$id=$_POST["id_tarea"];
$cod=$_POST["cod"];
include ("../conexion_ticket.php");
      
$colas="SELECT*FROM colas_de_tareas WHERE idTarea ='$id'";
$encontrar_colas=$conexion->query($colas);
if($encontrar_colas){ 
    while ($col=$encontrar_colas->fetch_assoc()) {
       $id_cola=$col["id_cola"];

    }
}

$integer=(int)$cod;
include("../conexion_ticket.php");


$imagen= $_FILES['foto']['name'];

if($_FILES['foto']['name']!=""){


  $imagen=addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));

}
else{
  $imagen='';

}
$resp="INSERT INTO respuesta (descripcion,imagen,id_usuario,id_cola) VALUES ('$respuesta','$imagen','$integer','$id_cola')";
$hilorep=$conexion->query($resp);


echo "<script> 
alert('Se enviado la respuesta correctamente'); 
window.location.href='detalles_tareas.php?cod=$integer&detalles=$id'; 
</script>"; 