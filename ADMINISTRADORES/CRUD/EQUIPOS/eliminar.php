<?php

include("../conexion.php");

if(@$_POST['ide']!=null)
{ 

    
  try{

     $id= $_POST['ide'];
     if($id!=894)
     {
        $A=mysqli_query($conexion,"call Equipo($id)");
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

    echo "<script>alert('No haz seleccionado ningun equipo')</script>";
    ?>
    <script>
    window.history.go(-1);
</script>

    <?php
}


?>