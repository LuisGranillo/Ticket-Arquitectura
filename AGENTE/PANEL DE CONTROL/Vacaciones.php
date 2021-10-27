<?php

include("../conexion.php");
if(@$_POST['Vacaciones'])
{
    
    

    if(@$_POST['Usuarios']!=null)
    {
        foreach ($_POST['Usuarios'] as  $IdAlumno) {
            $Actualizar='UPDATE usuario set id_estatus=4  where id_usuario = ' . $IdAlumno;
            $Actualizar2=mysqli_query($conexion,$Actualizar);
        }

        echo "<script>alert('Tu estatus cambió, felices vacaciones ! ');
        window.history.go(-1);
        
        </script>";
     }
      

    if(@$_POST['Usuarios']==null || @$_POST['Usuarios']=='') 
      {
         
          $Vacio=$_POST['vacio'];

          
            $Actualizar3='UPDATE usuario set id_estatus=3  where id_usuario = ' . $Vacio;
            $Actualizar4=mysqli_query($conexion,$Actualizar3);
        
            echo "<script>alert('Tu estatus cambió, bienvenido Agente! ');
            window.history.go(-1);
            
            </script>";
     
     }



}
?>