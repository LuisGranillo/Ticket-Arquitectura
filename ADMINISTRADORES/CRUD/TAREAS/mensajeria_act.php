<?php

$correo=$_POST['correo_actualizar'];
$contraseña=$_POST['contraseña_actual'];
$id_usuario=$_POST['id_usuario'];

$nueva1=$_POST['nueva1'];
$nueva2=$_POST['nueva2'];

include("../conexion.php");

$consulta= mysqli_query($conexion, "SELECT cast(aes_decrypt(contraseña, 'AES') as char) as RECUPERAR ,correo FROM enviocorreo");
if ($consulta) {
    $c3=mysqli_fetch_assoc($consulta);
    $zcc=$c3['RECUPERAR'];
    $zc=$c3['correo'];
    echo $zc;
   
    if("$zcc"=="$contraseña")
    {
        if ("$nueva1"=="$nueva2") {
            
            $actualizar= mysqli_query($conexion, "UPDATE enviocorreo SET contraseña=AES_ENCRYPT('$nueva2', 'AES' ),correo='$correo' WHERE  correo='$zc'");

            if($actualizar)
            {
                echo "<script>alert('Correo actualizado correctamente');
                window.history.go(-1);

                </script>";
            }
            else
            {
                echo "<script>alert('Algo falló');
                window.history.go(-1);

                </script>";

            }
        }

    }
    else
    {
        echo "<script>alert('Las contraseñas no coincideni');
        window.history.go(-1);

        </script>";


    }


    echo $nueva1 ."<br>" . $nueva2;
    
}

 ?>

 
    
    