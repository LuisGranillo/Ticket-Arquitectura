<?php
include ('../conexion_ticket.php');
$cod= $_GET['cod'];
$id_tema = $_GET["id"];
$eliminar = "CALL eliminar_tema('$id_tema')";
$resultado = mysqli_query($conexion,$eliminar);
echo "<script> window.location=' ./Temas.php?cod=$cod'</script>";
?>