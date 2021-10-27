<?php
include ('../conexion_ticket.php');
$cod = $_GET['cod'];
$id_ticket = $_GET["id"];
$eliminar = "CALL eliminar_ticket('$id_ticket')";
$resultado = mysqli_query($conexion,$eliminar);
echo "<script> window.location=' ./Tickets.php?cod=$cod'</script>";
?>