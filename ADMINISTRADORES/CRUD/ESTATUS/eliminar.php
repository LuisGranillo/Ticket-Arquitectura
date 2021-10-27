<?php

include("../conexion.php");

if(@$_POST['ide']!=null)
{ 

    
  try{

     $id= $_POST['ide'];
    


     if ($id==2 | ($id==3 | $id==4)){
        ?>
        <script>alert("Este estatus no se puede eliminar ");
        window.history.go(-1);
    </script>
        <?php
     }

   else 
     {
        $llamar="CALL Estatus($id)";
    $procedimiento_almacenado= mysqli_query($conexion,$llamar);
    if($procedimiento_almacenado)
    {

        ?>
        <script>alert("Todo lo que existia del estatus que seleccionó , fue modificado de este sistema");
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