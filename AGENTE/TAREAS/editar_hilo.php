<?php

$imagen= $_FILES['imagen']['name'];

if($imagen!=""){


  $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

}
else{
  $imagen='';

}
$re=$_POST["comentarios"];
$id_tarea=$_POST["id_tarea"];
$id_cola=$_POST["id_cola"];
$id_archivo=$_POST["id_archivo"];
$id_usuario=$_POST["id_usuario"];
$usuario_logeado=$_POST["usuario_logeado"];
$id_rep=$_POST["id_rep"];


$integer = (int)$id_rep;
$integer2 = (int)$usuario_logeado;

echo $id_tarea;
echo "----------";
echo $id_cola;
echo "----------";

echo $id_archivo;
echo "----------";

echo $id_usuario;

include("conexion1.php");



  $query2="UPDATE respuesta SET descripcion='$re',imagen='$imagen' WHERE id_respuesta='$integer'";

$resultado2=$conexion->query($query2);

header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer2&id_cola=$id_cola&usur=$integer2");
