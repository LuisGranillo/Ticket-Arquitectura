
<?php
  include("../conexion.php");

/* crear la conexión */
$Nombre=$_POST['name'];
$Correo=$_POST['correo'];

 
$Estatus=$_POST['estatus'];
$Descripcion=$_POST['descri'];
$Lider=$_POST['lider'];
 
$inserta= "INSERT INTO departamento (nombre,correo,idEstatu,descripcion,idusuLider) VALUES('$Nombre','$Correo',$Estatus,'$Descripcion',$Lider)";
mysqli_query($conexion, $inserta) or die("<script>alert('Algo salió mal intentalo nuevamente')

window.history.go(-1);
</script>"); //cuenta con dos parametros 
echo"<script> 
alert('Departamento agregado de forma correcta');

window.history.go(-1);</script>";

?>
