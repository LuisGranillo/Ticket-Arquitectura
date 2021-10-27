<?php
include ('../conexion_ticket.php');
$cod= $_GET['cod'];
$id_tema = $_POST["id"];
$id_status = $_POST["estado"];
$nombre = $_POST["nombre"];
$actualizar = "UPDATE Tema SET Id_status = '$id_status', Nombre = '$nombre' WHERE Id_Tema = '$id_tema'";
$resultado = mysqli_query($conexion,$actualizar);
echo "<script> window.location=' ./Temas.php?cod=$cod'</script>";
?>