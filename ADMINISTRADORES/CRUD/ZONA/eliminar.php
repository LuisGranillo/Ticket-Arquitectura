<?php
include ('../conexion.php');
$cod = $_GET['cod'];
$id_zona = $_GET["id"];
$eliminar = "CALL eliminar_zona('$id_zona')";
$resultado = mysqli_query($conexion,$eliminar);
echo "<script> window.location=' ./Zonas.php?cod=$cod'</script>";
?>