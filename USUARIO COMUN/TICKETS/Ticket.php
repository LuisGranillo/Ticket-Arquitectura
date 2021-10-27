<?php

$Correo=$_POST['correo'];
$Nombre=$_POST['nombre'];
$Telefono= $_POST['telefono'];
$Ext = $_POST['ext'];
$Temas= $_POST['temas'];
$Comentarios=$_POST['comentarios'];
 

$Ticket= mysqli_connect("localhost","root","toor2019.","base_de_datos_ticket") or die ("Problemas al conectar la base ticket"); 
$Competencia= mysqli_connect("localhost","root","toor2019.","sistema_de_competencia") or die ("Problemas al conectar el sistema de competencia ");
 

       ?>