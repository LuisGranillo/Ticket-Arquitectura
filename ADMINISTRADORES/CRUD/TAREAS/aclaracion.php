<?php
$id_tarea=$_POST["id_tarea"];
$cod=$_POST["cod"];
$aclar=$_POST["aclar"];
include("../conexion_ticket.php");
$resp="INSERT INTO aclaraciones (id_usuario,Motivo,idTarea) VALUES ('$cod','$aclar','$id_tarea')";
$hilorep=$conexion->query($resp);
echo "Respuesta enviada espere que se refresque la pagina";