<?php

  include("../conexion.php");
 if(@$_POST['Eliminar'])
 {

      $procedimiento_almacenado=0;
     if(@$_POST['Usuarios']!=null)
     {
         foreach ($_POST['Usuarios'] as  $Id) {        
        
             if($Id==4 ||($Id==2 || $Id==3))
             {
              
                echo "<script> alert('No se puede borrar este estatus');
    
                </script>";
             }
             else {
                $llamar="CALL Estatus($Id)";
                $procedimiento_almacenado= mysqli_query($conexion,$llamar);
                
             }
            
         }

         if($procedimiento_almacenado)
         {
     
             ?>
             <script>alert("Todo lo que existia de el estatus que seleccionó , fue modificado de este sistema");
             window.history.go(-1);
         </script>
             <?php
         }
         else {
             
             ?>
             <script>alert("Proceso erroneo");
             window.history.go(-1);
         </script>
             <?php
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