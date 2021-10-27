<?php
include ('../conexion_ticket.php');
$cod = $_GET['cod'];
$id_status = $_POST["estado"];
$nombre = $_POST["nombre"];
$insertar = "INSERT INTO Tema (Id_status, Nombre) VALUES ('$id_status', '$nombre')";
$resultado = mysqli_query($conexion,$insertar);
echo "<script> window.location=' ./Temas.php?cod=$cod'</script>";
?>