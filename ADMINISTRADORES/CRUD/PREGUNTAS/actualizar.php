<?php
include ('../conexion.php');
$cod = $_GET["cod"];
$id_pregunta = $_POST["id"];
$id_categoria = $_POST["categoria"];
$pregunta = $_POST["pregunta"];
$respuesta = $_POST["respuesta"];
$actualizar = "UPDATE pregunta SET id_categ = '$id_categoria', pregunta = '$pregunta', respuesta = '$respuesta' WHERE id_pregunta = '$id_pregunta'";
$resultado = mysqli_query($conexion,$actualizar);
echo "<script> window.location=' ./Preguntas.php?cod=$cod'</script>";
?>