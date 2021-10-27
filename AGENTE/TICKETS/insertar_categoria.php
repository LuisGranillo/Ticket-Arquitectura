<?php

require "conexion_2.php";

$id = $_GET["id"];

$nombre = $_POST['nombre'];

$descripcion = $_POST['descripcion'];

//terminar variables...

$insertar = "INSERT INTO categoria (id_usuario, tema, descripcion) values('$id', '$nombre', '$descripcion')";
$resultado = mysqli_query($conexion,$insertar);

//terminar snetencia sql 

header("location:./base_de_conocimientos.php?id=$id")

?>