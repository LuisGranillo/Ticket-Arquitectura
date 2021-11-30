<?php
include('conexion.php');
$correo=$_POST['mail'];
$nombre=$_POST['nom'];
$apellidos=$_POST['apellid'];  
$password=$_POST['contr'];  
$password2=$_POST['contr2'];  
 
$acceso = "SELECT count(correo) as Repite  FROM usuario WHERE correo='$correo'";
$resultado2= mysqli_query($conexion,$acceso);
$filas=mysqli_fetch_assoc($resultado2);
//mysqli_num_rows


        if ($filas['Repite']>0) {       
        ?>
        <script> alert(" ¡El correo ingresado ya está registrado en el sistema ,por favor ingrese otro nuevamente!");
         window.history.go(-1);
        </script>
        <?php
        include("registro.php");
        }
       if($filas['Repite']==0)
        {
         $imagen= $_FILES['imagen']['name'];

         if($imagen!=""){
         
         
           $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
         
         }
         else{
           $imagen='';
         
         }
           
         
            if ($password==$password2) {

               include ("cesar.php");
               $regresado = Cifrar("$password","$password2");
                $query="INSERT INTO usuario(foto,id_rol,nombre,apellidos,id_departamento,contraseña,correo,id_zona,id_estatus) VALUES ('$imagen', 3, '$nombre','$apellidos',2505,'$regresado','$correo',1,3)";
               

                $resultado=$conexion->query($query);
                if($resultado){
                    ?>
                     <script>
                    
                    alert(" Su registro fue exitoso , ahora puede iniciar sesión");
                    window.history.go(-1);
                      </script>
                      <?php
                }
                else{
                   ?>
                   <script>
                    window.history.go(-1);
                    alert ("Fallas al intentar registrarse");
                   </script>
                    
                <?php
                printf("Errormessage: %s\n", mysqli_error($conexion));
        
                }
               }
            else
            {
               echo "<script>alert('Las contraseñas no coinciden vuelve a intentarlo');
               window.history.go(-1);
               </script>";
            }
         
     
        }
        ?> 

 <?php

mysqli_close($conexion);
?>
