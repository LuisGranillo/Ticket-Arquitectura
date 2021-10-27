<?php
  include("../Login/conexion.php");
   /* crear la conexión */
   $conexion = new mysqli($servername, $username, $password, $dbname);
   $correo=$_POST['correo'];
   $contra=$_POST['contra'];
   session_start();
   $_SESSION['correo']=$correo;
   
   //Autenticar
   $acceso = "SELECT count(*) as contar FROM usuario WHERE correo='$correo' and contraseña= MD5('$contra')";
   $resultado= mysqli_query($conexion,$acceso);
   $filas2=mysqli_fetch_assoc($resultado);

   //mysqli_num_rows
 if($filas2['contar']==1) 
 {
  $accesos = "SELECT * FROM usuario WHERE correo='$correo' and contraseña= MD5('$contra')";
   $resultados= mysqli_query($conexion,$accesos);
   $filas=mysqli_fetch_assoc($resultados);
     if ($filas['id_rol']==1) {
         if ($filas['id_estatus']!=2) {
             ?>
         <script> alert(" ¡ Bienvenido Agente !");</script>

         <?php
          $id=$filas['id_usuario'];
             header("Location:/UTP/AGENTE/PANEL DE CONTROL/panel_control.php?cod=$id");
         } elseif ($filas['id_estatus']==2) {
             ?>
         <script> alert(" ¡ Error , no fue posible encontrar tu usuario, comunicate con agencia  !");
            window.history.go(-1);
         </script>
           <?php
         }
     }
   
     if ($filas['id_rol']==2) {
         if ($filas['id_estatus']!=2) {
             ?>
         <script> alert(" ¡ Bienvenido Administrador !");</script>
      <?php
      $id=$filas['id_usuario'];
             header("Location:/UTP/AGENTE/PANEL DE CONTROL/panel_control.php?cod=$id");
         } elseif ($filas['id_estatus']==2) {
             ?>
         <script> alert(" ¡ Error , no fue posible encontrar tu usuario, comunicate con agencia  !");
         window.history.go(-1);
         </script>
           
           <?php
         }
     }

     if ($filas['id_rol']==3) {
         if ($filas['id_estatus']!=2) {
             ?>
       <script> alert(" ¡ Bienvenido joven !");</script>
    <?php
    $id=$filas['id_usuario'];
             header("location:../USUARIO COMUN/TICKETS/Index.php?cod=$id");
         } else if ($filas['id_estatus']==2) {
             ?>
       <script> alert(" ¡ Error , no fue posible encontrar tu usuario, comunicate con agencia  !");
        window.history.go(-1);
       </script>      
         <?php
         }
     }
 }
 
   else  {
          ?>
            <script> alert("¡Usuario o contraseña no validos!");
            window.history.go(-1);
            </script>
         <?php
   }
  mysqli_free_result($resultado);
  mysqli_close($conexion);
?>