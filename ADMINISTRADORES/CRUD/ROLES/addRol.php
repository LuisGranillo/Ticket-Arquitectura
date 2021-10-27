<?php


include("../conexion.php");


$Nombre=$_POST['nombre'];
 
 
$inserta= "INSERT INTO rol (Tipo) VALUES ('$Nombre')";
$inserta2=mysqli_query($conexion, $inserta);

if ($inserta2!=null) {
    ?>
    <script> 
alert('Rol creado correctamente correctamente');
window.history.go(-1);</script>
<?php
}
else 
{?>
    <script> 
    alert('Algo falló, intentalo de nuevo');
    window.history.go(-1);</script>
    <?php
}
 
 
?>