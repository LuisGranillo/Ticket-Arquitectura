<?php

include("../conexion.php");

if(@$_POST['ide']!=null)
{ 

    
  try{

     $id= $_POST['ide'];
     $llamar="CALL Depa($id)";
    $procedimiento_almacenado= mysqli_query($conexion,$llamar);
    if($procedimiento_almacenado)
    {

        ?>
        <script>alert("Todo lo que existia de el departamento que seleccionó , fue eliminado de este sistema");
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