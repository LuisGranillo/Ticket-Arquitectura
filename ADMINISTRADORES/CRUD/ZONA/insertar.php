<?php
include ('../conexion.php');
$cod = $_GET["cod"];
$nombre = $_POST["nombre"];
$insertar = "INSERT INTO zona_horaria (zona) VALUES ('$nombre')";
$resultado = mysqli_query($conexion,$insertar);
echo "<script> window.location=' ./Zonas.php?cod=$cod'</script>";
?>