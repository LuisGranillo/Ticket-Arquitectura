<?php

  include("../conexion.php");
 if(@$_POST['Eliminar'])
 {

     if (@$_POST['Usuarios']!=null) {
         foreach ($_POST['Usuarios'] as  $id) {
             if ($id!=1 | ($id!=2 | $id!=3)) {
                 $A=mysqli_query($conexion, "UPDATE usuario set id_rol=3 WHERE id_rol=$id");
                 $B=mysqli_query($conexion, "DELETE FROM rol WHERE   idRol=$id");
                 if ($A && $B) {
                    
                         ?>
                   <script>alert("Todo lo que existia del Rol que seleccionó , fue eliminado de este sistema");
                   window.history.go(-1);
               </script>
                   <?php
                     
                 } else {
                     ?>
                   <script>alert("Proceso erroneo");
                   window.history.go(-1);
               </script>
                   <?php
                 }
             }

             else {
                ?>
                <script>alert("Este rol no se puede eliminar ");
                window.history.go(-1);
            </script>
                <?php
             }
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