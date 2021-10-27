<?php

include("../conexion.php");

if(@$_POST['ide']!=null)
{ 

    
  try{

     $id= $_POST['ide'];
     if($id==1 | ($id==2 | $id==3)  )
     {
        ?>
        <script>alert("Este rol no se puede eliminar ");
        window.history.go(-1);
    </script>
        <?php
     }


     else   {
        
        $A=mysqli_query($conexion,"UPDATE usuario set id_rol=3 WHERE id_rol=$id");
        $B=mysqli_query($conexion,"DELETE FROM rol WHERE   idRol=$id");
        if($A) 
        {
            if ($B) {
                ?>
            <script>alert("Todo lo que existia del Rol que seleccionó , fue eliminado de este sistema");
            window.history.go(-1);
        </script>
            <?php
            }
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