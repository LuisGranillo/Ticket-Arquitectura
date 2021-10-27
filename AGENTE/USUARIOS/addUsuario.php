 <?php


include("../conexion.php");

   
   $Nombre=$_POST['name'];
   $Apellidos=$_POST['apellidos'];
 
   $Correo=$_POST['correo'];
   $Zona=$_POST['zona'];
   $Depa=$_POST['departamento'];
   $Estatus=$_POST['estatus'];
   $Rol=$_POST['rol'];
   
    

   $inserta= "INSERT INTO usuario (nombre,apellidos,correo,id_estatus,id_rol,id_departamento,id_zona) VALUES ('$Nombre','$Apellidos','$Correo',$Estatus,$Rol,$Depa,$Zona)";
  $i= mysqli_query($conexion, $inserta) or die("<script> alert('Algo fallo intentalo de nuevo', verifica la conexión o que el correo no este duplicado); window.history.go(-1);</script> "); //cuenta con dos parametros
   
   if($i)
   {
       echo"<script> 
alert('Usuario agregado de forma correcta');
window.history.go(-1);</script>";
   }
   else {
      echo"<script> 
alert('Algo falló intentalo de nuevo ');
window.history.go(-1);</script>";  
   }

 
 ?>