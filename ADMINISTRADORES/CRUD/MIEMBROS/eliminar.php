<?php

include("../conexion.php");

if(@$_POST['ide']!=null)
{ 

    
  try{

     $id= $_POST['ide'];
    
   

      
        $llamar="DELETE FROM trabaja where id_trabaja=$id";
    $procedimiento_almacenado= mysqli_query($conexion,$llamar);
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
     



    
    catch(Exception $e)
    {
        
        ?>
        <script>
                alert("Este rol no se puede eliminar, eliminarlo podria traer problemas <?php echo $e ?>");
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