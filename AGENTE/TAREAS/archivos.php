
  
<?php

    $id_usuario =$_GET['id_usuario'];
    $id_proc =$_GET['id_proc'];
    $procurador =$_GET['procurador'];

    
    if($id_usuario!=null){
include("conexion4.php");

    $query="SELECT*FROM  usuario WHERE id_usuario='$id_proc'";
    $resultado=$conexion->query($query);
    while($row=$resultado->fetch_assoc()){
 
   $correo=$row['correo'];

      }

      header("Location:/UTP/AGENTE/TAREAS/enviar.php?codigo=$id_usuario&correo_proc=$correo&proc=$procurador");

    }
      
/*
if($id_departamento!=null){
      $servername = "localhost";
  $username = "root";
  $password = "toor2019.";
  $dbname = "base_de_datos_ticket";
  $conexion = new mysqli($servername, $username, $password, $dbname);

  
$query="UPDATE TAREA SET id_departamento='$id_departamento' where Creador='$responsable'";

  $resultado=$conexion->query($query);
    if($resultado){
        echo "se actualizo correctamente";
      // header("Location:/UTP/AGENTE/TAREAS/tareas.php?id_archivo=$id_archivO&departamento=$depart");

  
      }
      else{
        echo "fallas al isertar";
        printf("Errormessage: %s\n", mysqli_error($conexion));
           }
    
          }
  
         */
          ?>







      




  



  
