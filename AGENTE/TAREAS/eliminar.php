<?php

include("./conexion4.php");

if(@$_POST['ide']!=null)
{ 

    
  try{

     $id= $_POST['ide'];
     $llamar="CALL Borrar($id)";
     $procedimiento_almacenado= mysqli_query($conexion, $llamar);
     if ($procedimiento_almacenado) {
         include("./conexion1.php");
         $query="SELECT*FROM tarea WHERE id_usuario=$id";
         $resultado=$conexion->query($query);
         while ($row=$resultado->fetch_assoc())
          {
              
             $archivo= $row['id_archivo'];
             $ver_pdf="SELECT*FROM archivo WHERE id_archivo=$archivo";
              $si2=mysqli_query($conexion,$ver_pdf);
            $fin2=mysqli_fetch_array($si2);
             $ruta="subir_archivos/".$fin2['nombre_archivo']."";
             unlink($ruta);
             $fin= mysqli_query($conexion, " DELETE FROM archivo WHERE id_archivo=$archivo");
            
         }
         
         $ticket="CALL BorrarUsuario($id)";
         $procedimiento2= mysqli_query($conexion, $ticket);
       
         
         
     }
     if($procedimiento_almacenado && $procedimiento2)
         {
             echo "<script>alert('Todo lo que existia de ese usuario, ha sido eliminado de este sistema');
             window.history.go(-1);
             </script>";
         }

    
    else {
        
        ?>
        <script>alert("Proceso erroneo");
        window.history.go(-1);
    </script>
        <?php
    }
        
    



    }
    catch(Exception $e)
    {
        echo "Ocurrió un problema al intentar procesar su petición: $e";
        ?>
        <script>
            window.history.go(-1);
        </script>

            <?php
    }


}

else{

    echo "<script>alert('No haz seleccionado ningun usuario')</script>";
    ?>
    <script>
    window.history.go(-1);
</script>

    <?php
}


?>