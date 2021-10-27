<?php
include ('../conexion_ticket.php');
$cod = $_POST['cod'];
$id_ticket = $_POST["id"];
$id_status = $_POST["estado"];
$campo = $_POST["campo"];
$id_asignado = $_POST["asignado"];
$actualizar = "UPDATE Ticket SET Id_status = '$id_status', $campo = '$id_asignado' WHERE Id_Ticket = '$id_ticket'";
$resultado = mysqli_query($conexion,$actualizar);
echo "<script> window.location=' ./Tickets.php?cod=$cod'</script>";
?>