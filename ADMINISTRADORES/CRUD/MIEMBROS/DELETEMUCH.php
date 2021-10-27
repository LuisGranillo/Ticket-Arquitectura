<?php

  include("../conexion.php");
 if(@$_POST['Eliminar'])
 {

      $procedimiento_almacenado=0;
     if(@$_POST['Usuarios']!=null)
     {
         foreach ($_POST['Usuarios'] as  $Id) {        
        
            $llamar="DELETE FROM trabaja where id_trabaja=$Id";
    $procedimiento_almacenado= mysqli_query($conexion,$llamar);
   
         }

                        if($procedimiento_almacenado)
                    {

                        ?>
                        <script>alert("Miembro eliminado");
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