<?php
include ('../conexion.php');
$cod = $_GET['cod'];
$id_zona = $_POST["id"];
$nombre = $_POST["nombre"];
$actualizar = "UPDATE zona_horaria SET id_zona = '$id_zona', zona = '$nombre' WHERE id_zona = '$id_zona'";
$resultado = mysqli_query($conexion,$actualizar);
echo "<script> window.location=' ./Zonas.php?cod=$cod'</script>";
?>