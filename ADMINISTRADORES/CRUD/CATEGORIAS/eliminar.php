<?php
include ('../conexion.php');
$cod = $_GET["cod"];
$id_categoria = $_GET["id"];
$eliminar = "CALL eliminar_categoria('$id_categoria')";
$resultado = mysqli_query($conexion,$eliminar);
echo "<script> window.location=' ./Categorias.php?cod=$cod'</script>";
?>