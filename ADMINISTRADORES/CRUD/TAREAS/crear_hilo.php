
<?php
  $Titulo =$_POST['titulo'];
  $depart =$_POST['departamentos'];
  $creador_nombre =$_POST['creador_nombre'];
  $apellidos_creador=$_POST['apellidos_creador'];
  $id_cola=$_POST['id_cola'];
 // $responsable=$creador_nombre.$apellidos_creador;  
  //$responsable=$creador_nombre.$apellidos_creador;  
  $usuario_logeado=$_POST['idusuario'];
$logeo_sesion = (int)$usuario_logeado;


$id_tarea=$_POST["id_tarea"];
$tarea = (int)$id_tarea;

$titulo=$_POST['titulo'];
$desc=$_POST['comentarios'];
$hora="";
if(@$_POST["hora"]!=null){
    $hora=$_POST["hora"];
}
if(@$_POST["hora"]==null){
    $hora="";

    echo "No hay nada en la variable";

}
$dateofbirth="";
if(@$_POST["dateofbirth"]!=null){
    $dateofbirth=$_POST["dateofbirth"];
}
if(@$_POST["dateofbirth"]==null){
    $dateofbirth="";

    echo "No hay nada en la variable";

}
$Procurador=$_POST['procurador'];
$id_proc = intval(preg_replace("/[^0-9]+/", "", $Procurador), 10);


$usrw='';
include("../conexion.php");
$query12="SELECT *FROM usuario where id_usuario='$id_proc'";
$resultado_user=$conexion->query($query12);
if($resultado_user){
    while ($valores12=$resultado_user->fetch_assoc()) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.

$usrw=''.$valores12['nombre'].'\n'.$valores12['apellidos'].'';

 }
}
include("../conexion_ticket.php");

$tarea_nueva="SELECT *FROM hilo where tarea_anterior='$tarea'";
$busqueda_tar=$conexion->query($tarea_nueva);
if($busqueda_tar){
    while ($encotr_tar=$busqueda_tar->fetch_assoc()) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.

$tare_nv=$encotr_tar["idTarea"];
 }
}
$departarea="SELECT*FROM  colas_de_tareas WHERE idTarea='$tarea'";
$resultadodepart=$conexion->query($departarea);
$cuenta=0;                  

if($resultadodepart){ 
while($rowdepart=$resultadodepart->fetch_assoc()){

$id_cola=$rowdepart['id_cola'];



  }
}
// get details of the uploaded file


$r = rand(0,10000);




 

include("../conexion_ticket.php");
        if($_FILES["uploadedFile"]!=null)
        { 
       $id_tarea=$_POST["id_tarea"];
         $nombre_archivo=$_FILES['uploadedFile'] ['name'];
         $tipo_archivo=$_FILES['uploadedFile']['type'];
         $tamaño_archivo=$_FILES['uploadedFile']['size'];
         $ruta_archivo=$_FILES['uploadedFile']['tmp_name'];
         $destino_archivo="subir_archivos/$nombre_archivo";

         if($nombre_archivo!=""){
          if(copy($ruta_archivo,$destino_archivo)){
            $Titulo=$_POST['Titulo'];
            $descripcion=$_POST['descripcion'];
            include("../conexion_ticket.php");
            $query="INSERT INTO archivo (Titulo,descripcion,tamaño ,nombre_archivo,tipo,id_cola) VALUES ('$Titulo','$descripcion','$tamaño_archivo','$nombre_archivo','$tipo_archivo','$id_cola')";
            $resultado=$conexion->query($query);

          } 
          else{
             }
         }
        }else{
            

        }
        if($_FILES['uploadedFile'] ['name']!=null){  
          $nombre_archivo=$_FILES['uploadedFile'] ['name'];
      
      
         }
        if($nombre_archivo==null){
          $nombre_archivo="sin documentacion ,descripcion temp $r";
          $nada="INSERT INTO archivo (Titulo,descripcion,tamaño ,nombre_archivo,tipo,id_cola) VALUES ('','','','$nombre_archivo','','')";
          $sin_elemnts=$conexion->query($nada);    
        }
 
        include("../conexion_ticket.php");

    
           if($_FILES['imagen']!=null){ 
           $nombre_imagen=$_FILES['imagen'] ['name'];
           $tipo_imagen=$_FILES['imagen']['type'];
           $tamaño_imagen=$_FILES['imagen']['size'];
           $rutav=$_FILES['imagen']['tmp_name'];
           $destino_imagen="subir_archivos/$nombre_imagen";
         
           if($nombre_imagen!=""){
            if(copy($rutav,$destino_imagen)){
           
              include("../conexion_ticket.php");
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

      echo $nombre_archivo;
      echo $nombre_imagen;
      $query_img="SELECT*FROM archivo WHERE nombre_archivo='$nombre_archivo'";
      $imagenes_cr=$conexion->query($query_img);
      while($ciclos=$imagenes_cr->fetch_assoc()){
   
        $id_archivo=$ciclos['id_archivo'];

        }
        include("../conexion_ticket.php");
                      
        $pr = (int)$id_proc;
        
        $query="INSERT INTO tarea (Titulo,Descripcion,hora,id_usuario,procurador,Vencimiento,id_archivo,Departamento,pr) VALUES ('$titulo','$desc','$hora','$logeo_sesion','$usrw','$dateofbirth','$id_archivo','$depart','$pr')";
        
        $resultado=$conexion->query($query);
        
        $query20="SELECT*FROM tarea WHERE id_archivo='$id_archivo'";
        $resultado20=$conexion->query($query20);
        while($row12=$resultado20->fetch_assoc()){
        
          $id_tarea_hilo=$row12['idTarea'];
        
          }
          $hilos_creacion = (int)$id_tarea_hilo;
        $hilo="INSERT INTO hilo (idTarea,descripcion,usuario,id_cola,tarea_anterior,titulo) VALUES ('$hilos_creacion','Tarea Creada Desde el Hilo de Entrada','$logeo_sesion','$id_cola','$tarea','$titulo')";
        $creacion_hilo=$conexion->query($hilo);
        
          
                 echo "<script> 
                 alert('Se creo la tarea de manera correcta'); 
                 window.location.href='detalles_tareas.php?cod=$logeo_sesion&detalles=$tarea'; 
                 </script>";
        
        
          
          /*
        
        
          
        
        */
   
?>