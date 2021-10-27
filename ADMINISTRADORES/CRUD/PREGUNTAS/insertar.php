<?php
include ('../conexion.php');
$cod = $_GET["cod"];
$id_categoria = $_POST["categoria"];
$pregunta = $_POST["pregunta"];
$respuesta = $_POST["respuesta"];
$insertar = "INSERT INTO pregunta (id_categ, pregunta, respuesta) VALUES ('$id_categoria', '$pregunta', '$respuesta')";
$resultado = mysqli_query($conexion,$insertar);
echo "<script> window.location=' ./Preguntas.php?cod=$cod'</script>";
?>