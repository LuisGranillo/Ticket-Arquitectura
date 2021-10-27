<?php
include ('../conexion.php');
$cod = $_GET["cod"];
$id_categoria = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$actualizar = "UPDATE categoria SET tema = '$nombre', descripcion = '$descripcion' WHERE id_categ = '$id_categoria'";
$resultado = mysqli_query($conexion,$actualizar);
echo "<script> window.location=' ./Categorias.php?cod=$cod'</script>";
?>