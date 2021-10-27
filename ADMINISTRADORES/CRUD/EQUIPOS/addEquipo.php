<?php


include("../conexion.php");


$Nombre=$_POST['a'];
$Lider=$_POST['b'];
$Descripcion=$_POST['c'];
 
$inserta= "INSERT INTO equipo (nombre,idUsuario,Descripcion) VALUES ('$Nombre',$Lider,'$Descripcion')";
$inserta2=mysqli_query($conexion, $inserta);

if ($inserta2!=null) {
    ?>
    <script> 
alert('Equipo añadido correctamente');
window.history.go(-1);</script>
<?php
}
else 
{?>
    <script> 
    alert('Matricula no encontrada, intentalo de nuevo');
    window.history.go(-1);</script>
    <?php
}
 
 
?>