<?php


include("../conexion.php");


$Nombre=$_POST['n'];
 $Equipo=$_POST['e'];

 $CLON= mysqli_query($conexion,"SELECT count(*) as cuenta  FROM trabaja WHERE id_usuario = $Nombre AND idEquipo = $Equipo");
 $data=mysqli_fetch_assoc($CLON);
 
 if($data['cuenta']>0)
 {
     
        echo "<script>alert('El usuario ya había sido agregado anteriormente a este equipo');
        window.history.go(-1);
        </script>";


       
    
 }


 if($data['cuenta']==0){
    $inserta= "INSERT INTO trabaja (id_usuario,idEquipo) VALUES ($Nombre,$Equipo)";
$inserta2=mysqli_query($conexion, $inserta);

if($inserta2)
{
    echo "<script>alert('Miembro agregado correctamente al equipo');
    window.history.go(-1);
    </script>";
}
else {
    echo "<script>alert('Proceso erroneo');
    window.history.go(-1);
    </script>";
}
 }

     
   
 

?>