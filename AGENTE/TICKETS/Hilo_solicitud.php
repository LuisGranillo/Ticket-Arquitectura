<?php
include ('conexion.php');

$id_T=$_GET['id_T'];
$id=$_GET['id'];
$ticket = $_POST["ticket"];
$nombre = $_POST["nombre"];
$MSJ = $_POST["mensaje"];
$nombre_archi=$_FILES['Archivo']['name'];
$guardado=$_FILES['Archivo']['tmp_name'];
$route = "Public/img/".$nombre_archi;
	
move_uploaded_file($guardado,$route);

$insertar = "INSERT INTO Hilo_Ticket(Id_Ticket,Remitente,Mensaje,Archivo) VALUES ('$ticket','$nombre','$MSJ','$nombre_archi')";

//terminar snetencia sql 
$resultado = mysqli_query($conexion,$insertar);


header("location:./MostrarTicket_solicitados.php?id_T=$id_T&id=$id")

?>