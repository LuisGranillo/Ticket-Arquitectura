<?php
include ('../conexion.php');
$id_pregunta = $_GET["id"];
$cod = $_GET["cod"];
$eliminar = "DELETE FROM pregunta WHERE id_pregunta = '$id_pregunta'";
$resultado = mysqli_query($conexion,$eliminar);
echo "<script> window.location=' ./Preguntas.php?cod=$cod'</script>";
?>