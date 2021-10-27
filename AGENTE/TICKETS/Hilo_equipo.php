<?php
include ('conexion.php');

$id_T=$_GET['id_T'];
$id=$_GET['id'];
$ticket = $_POST["ticket"];
$id_equipo = $_POST["equipo"];
$nombre = $_POST["nombre"];
$MSJ = $_POST["mensaje"];
$nombre_archi=$_FILES['Archivo']['name'];
$guardado=$_FILES['Archivo']['tmp_name'];
$route = "Public/img/".$nombre_archi;
	
move_uploaded_file($guardado,$route);

$insertar = "INSERT INTO Hilo_Ticket(Id_Ticket,Remitente,Mensaje,Archivo) VALUES ('$ticket','$nombre','$MSJ','$nombre_archi')";

//terminar snetencia sql 
$resultado = mysqli_query($conexion,$insertar);

echo "<a href='./MostrarTicket_equipo.php?id_T=$id_T&id_equipo=$id_equipo&id=$id'></a>";
header("location:./MostrarTicket_equipo.php?id_T=$id_T&id_equipo=$id_equipo&id=$id")

?>