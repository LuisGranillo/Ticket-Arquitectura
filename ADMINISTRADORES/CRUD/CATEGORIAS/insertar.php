<?php
include ('../conexion.php');
$cod = $_GET["cod"];
$id_usuario = $_POST["usuario"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$insertar = "INSERT INTO categoria (id_usuario, tema, descripcion) VALUES ('$cod', '$nombre', '$descripcion')";
$resultado = mysqli_query($conexion,$insertar);
echo "<script> window.location=' ./Categorias.php?cod=$cod'</script>";
?>