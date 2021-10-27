<?php

  include("../conexion.php");
 if(@$_POST['Eliminar'])
 {

     if (@$_POST['Usuarios']!=null) {
         foreach ($_POST['Usuarios'] as  $id) {
            if($id!=894)
                {
                   
                    $A=mysqli_query($conexion,"call Equipo($id)");
                    
                }
                else
                {
                    echo "<script>alert('No se puede borrar este equipo');
                    window.history.go(-1);
                    </script>";
                }
         }

         if($A)
        {
         
                ?>
            <script>alert("Todo lo que existia de el equipo que seleccionó , fue modificado de este sistema");
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