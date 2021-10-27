<?php

require ('conexion_2.php');

$id = $_GET["id"];

$categoria = $_POST['categoria'];

$pregunta = $_POST['pregunta'];

$respuesta = $_POST["respuesta"];

//terminar variables...

$insertar = "INSERT INTO pregunta (id_categ, Respuesta, pregunta) values ('$categoria', '$respuesta', '$pregunta')";
$resultado = mysqli_query($conexion,$insertar);

//terminar snetencia sql 

header("location:./base_de_conocimientos.php?id=$id")

?>