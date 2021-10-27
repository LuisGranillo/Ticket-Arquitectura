<?php
 include("../conexion.php");
$nombre=$_POST['n'];
$apellidos=$_POST['a'];
$correo=$_POST['e'];
$Casa= $_POST['t'];
$Celular=$_POST['nc'];
$id=$_POST['id'];
 
 
$acceso = "SELECT count(correo) as Repite  FROM usuario WHERE correo='$correo' and id_usuario!=$id";
$resultado2= mysqli_query($conexion,$acceso);
$filas=mysqli_fetch_assoc($resultado2);


 if ($filas['Repite']==0) {
     $Update= "UPDATE usuario set nombre = '$nombre', apellidos= '$apellidos', correo='$correo',  Telefono_casa= '$Casa', Telefono_celular= '$Celular' where id_usuario = $id";
     $Ud2= mysqli_query($conexion, $Update);
     if ($Ud2) {
         ?>
  <script>
     alert("Información actualizada");
     window.history.go(-1);

  </script>
  <?php
     }
 }
 else
 {?>
   <script>
   alert("Algo fallo intentalo otra vez, verifica tu red o correo");
   window.history.go(-1);

</script>
<?php
 }
  ?>



