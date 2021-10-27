
<?php
  $Titulo =$_POST['titulo'];
  $depart =$_POST['departamentos'];
  $creador_nombre =$_POST['creador_nombre'];
  $apellidos_creador=$_POST['apellidos_creador'];
 // $responsable=$creador_nombre.$apellidos_creador;  
  //$responsable=$creador_nombre.$apellidos_creador;  
  $usuario_logeado=$_POST['idusuario'];
$logeo_sesion = (int)$usuario_logeado;

$id_usuario_prc=$_POST['id_usuario'];


$titulo=$_POST['titulo'];
$desc=$_POST['comentarios'];
$fecha=$_POST['fech'];
$hora=''.$fecha[0].''.$fecha[1].''.$fecha[2].''.$fecha[3].''.$fecha[4].'';
$fechas_establecidas=''.$fecha[5].''.$fecha[6].''.$fecha[7].''.$fecha[8].''.$fecha[9].''.$fecha[10].''.$fecha[11].''.$fecha[12].''.$fecha[13].''.$fecha[14].''.$fecha[15].'';

$nombre = $_FILES['imagen']['name'];
$procurador=$_POST['procurador'];
$id_proc = intval(preg_replace("/[^0-9]+/", "", $procurador), 10);

$usrw='';
include("conexion2.php");
$query12 = $mysqli -> query ("SELECT *FROM usuario where id_usuario='$id_proc'");
while ($valores12 = mysqli_fetch_array($query12)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.

$usrw=''.$valores12['nombre'].'\n'.$valores12['apellidos'].'';

}

// get details of the uploaded file



include("conexion1.php");

$r = rand(0,10000);




 

        if($_FILES["uploadedFile"]!=null)
        { 
         $nombre_archivo=$_FILES['uploadedFile'] ['name'];
         $tipo_archivo=$_FILES['uploadedFile']['type'];
         $tamaño_archivo=$_FILES['uploadedFile']['size'];
         $ruta_archivo=$_FILES['uploadedFile']['tmp_name'];
         $destino_archivo="subir_archivos/$nombre_archivo";

         if($nombre_archivo!=""){
          if(copy($ruta_archivo,$destino_archivo)){
            $Titulo=$_POST['Titulo'];
            $descripcion=$_POST['descripcion'];
            include("conexion1.php");
            $query="INSERT INTO archivo (Titulo,descripcion,tamaño ,nombre_archivo,tipo) VALUES ('$Titulo','$descripcion','$tamaño_archivo','$nombre_archivo','$tipo_archivo')";
            $resultado=$conexion->query($query);

          } 
          else{
             }
         }
        }else{
            

        }
        if($nombre_archivo==null){
          include("conexion1.php");

          $nombre_archivo="sin documentacion ,descripcion temp $r";
          $nada="INSERT INTO archivo (Titulo,descripcion,tamaño ,nombre_archivo,tipo) VALUES ('','','','$nombre_archivo','')";
          $sin_elemnts=$conexion->query($nada);    
        }
 

    
           if($_FILES['imagen']!=null){ 
           $nombre_imagen=$_FILES['imagen'] ['name'];
           $tipo_imagen=$_FILES['imagen']['type'];
           $tamaño_imagen=$_FILES['imagen']['size'];
           $rutav=$_FILES['imagen']['tmp_name'];
           $destino_imagen="subir_archivos/$nombre_imagen";
           if($nombre_imagen!=""){
            if(copy($rutav,$destino_imagen)){
              include("conexion1.php");
              $query20="UPDATE archivo SET imagen='$nombre_imagen' WHERE nombre_archivo='$nombre_archivo'";
         $resultado20=$conexion->query($query20);

            } 
            else{
              echo "error";
            }
           }
          }else{
          
          }
          if($nombre_imagen==null){  
            $nombre_imagen="sin documentacion ,descripcion temp $r";
            $sin_imagen="UPDATE archivo SET imagen='$nombre_imagen' WHERE nombre_archivo='$nombre_archivo'";
            $nada_img=$conexion->query($sin_imagen);
          }

      $query_img="SELECT*FROM archivo WHERE nombre_archivo='$nombre_archivo'";
      $imagenes_cr=$conexion->query($query_img);
      while($ciclos=$imagenes_cr->fetch_assoc()){
   
        $id_archivo=$ciclos['id_archivo'];

        }
include("conexion1.php");
                      
$pr = (int)$id_proc;

$query="INSERT INTO tarea (Titulo,Descripcion,hora,id_usuario,procurador,Vencimiento,id_archivo,Departamento,pr) VALUES ('$titulo','$desc','$hora','$logeo_sesion','$usrw','$fechas_establecidas','$id_archivo','$depart','$pr')";

$resultado=$conexion->query($query);

  if($resultado){
      echo "se inserto correctamente";
     
    header("Location:/UTP/AGENTE/TAREAS/archivos.php?id_proc=$pr&id_usuario=$id_usuario_prc&procurador=$id_proc");


    }
    else{
      echo "fallas al isertar";
      printf("Errormessage: %s\n", mysqli_error($conexion));
         }
  

      


  
  /*


  

*/
?>
