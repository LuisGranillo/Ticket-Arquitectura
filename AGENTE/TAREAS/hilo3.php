<?php
$est=$_POST["estados"];
$id_tarea=$_POST["id_tarea"];
$id_cola=$_POST["id_cola"];
$id_archivo=$_POST["id_archivo"];
$id_usuario=$_POST["id_usuario"];

$integer = (int)$id_usuario;

include("conexion1.php");
$t="Cerrado";
$c="Completado";
if($est==$t)
{
$query="UPDATE colas_de_tareas SET tipo_de_estado='$c',estado='$c' WHERE id_cola='$id_cola'";

$resultado=$conexion->query($query);
$query6="DELETE FROM aclaraciones WHERE idTarea='$id_tarea'";
$resultado6=$conexion->query($query6);
$query4="DELETE FROM tarea WHERE idTarea='$id_tarea'";
$resultado4=$conexion->query($query4);
$query3="DELETE FROM colas_de_tareas WHERE id_cola='$id_cola'";
$resultado3=$conexion->query($query3);
$query5="DELETE FROM archivo WHERE id_archivo='$id_archivo'";
$resultado5=$conexion->query($query5);


header("Location:/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer");

}
if($est!=$t){
$query2="UPDATE colas_de_tareas SET tipo_de_estado='$est',estado='$est' WHERE id_cola='$id_cola'";

$resultado2=$conexion->query($query2);
header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$id_usuario&id_cola=$id_cola&usur=$id_usuario");

}