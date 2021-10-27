<?php

  include("../conexion.php");
 if(@$_POST['Eliminar'])
 {

     if(@$_POST['Usuarios']!=null)
     {
         foreach ($_POST['Usuarios'] as  $IdAlumno) {        
           
             $llamar="CALL Depa($IdAlumno)";
              $procedimiento_almacenado= mysqli_query($conexion,$llamar);
             
         }

         if($procedimiento_almacenado)
         {
         echo "<script>alert('Usuario eliminado');
         window.history.go(-1);
         
         </script>";
         }
         else if($procedimiento_almacenado==null)
         {
             echo "<script>alert('Algo falló, intentalo nuevamente ');
      
             window.history.go(-1);
             </script>";
         }
     }


 

     else  if(@$_POST['Usuarios']==null) {
         ?>
         <script>
          alert("No haz seleccionado ningún usuario");
          window.history.go(-1);
         </script>
         <?php
     }
 }   ?>