<?php

require ('conexion.php');

$id = $_GET["id"];

$id_s = $_POST["id_s"];

$id_Equipo = $_GET['id_equipo'];

$status = $_POST["status"];

//terminar variables...

$actualizar = "UPDATE Ticket set Id_status='$status', Fecha_Update= CURRENT_TIMESTAMP where Id_Ticket = '$id_s'";
$resultado = mysqli_query($conexion,$actualizar);

//terminar snetencia sql 
echo "<a href='./tickets_equipo_get2.php?id_equipo=$id_Equipo&id=$id'></a>";
header("location:./tickets_equipo_get2.php?id_equipo=$id_Equipo&id=$id")

?>