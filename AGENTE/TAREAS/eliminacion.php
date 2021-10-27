<?php


    $tareas=$_POST['TAREAS'];
    $id_usuario=$_POST['id_usuario'];
    $comentarios=$_POST['comentarios'];
    $explicacion=$_POST['explicacion'];
    
    $departa=$_POST['departamentos'];
    $explicacion_nuevamente=$_POST['explicacion_nuevamente'];
    $equipos_selec=$_POST['equipos_selec'];
    $aclaracion_equipo=$_POST['aclaracion_equipo'];

    
    $integer = (int)$id_usuario;

    $procurador=$_POST['procurador'];
$id_proc = intval(preg_replace("/[^0-9]+/", "", $procurador), 10);
$id_equipo = intval(preg_replace("/[^0-9]+/", "", $equipos_selec), 10);

$equipos_seleccionados = (int)$id_equipo;
$activar='';
if(@$_POST['asignar_agente']!=null){
    $activar=$_POST['asignar_agente'];


}
if(@$_POST['asignar_agente']==null){
  $activar='';
}
$asignar_equipo='';
if(@$_POST['asignar_equipo']!=null){
    $asignar_equipo=$_POST['asignar_equipo'];


}
if (@$_POST['asignar_equipo']==null){
  $asignar_equipo='';
}
$borrar='';
if(@$_POST['borrar']!=null){
    $borrar=$_POST['borrar'];


}
if (@$_POST['borrar']==null){
  $borrar='';
}
$asignar_departamento='';
if(@$_POST['asignar_departamento']!=null){
    $asignar_departamento=$_POST['asignar_departamento'];


}
if (@$_POST['asignar_departamento']==null){
  $asignar_departamento='';
}

include("conexion2.php");
$query12 = $mysqli -> query ("SELECT *FROM usuario where id_usuario='$id_proc'");
if ($query12) {
    while ($valores12 = mysqli_fetch_array($query12)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        $usrw=''.$valores12['nombre'].'\n'.$valores12['apellidos'].'';
    }
}
$integer3 = (int)$id_proc;


             include("conexion1.php");
    if($tareas!=null) // Esto es para los checkbox que seleccionaste
    {
        foreach ($_POST['TAREAS'] as  $id_tarea)

        { // este ciclo recorre cada usuario en tu caso serian las tareas
            $integer2 = (int)$id_tarea;

            if ($borrar=='Eliminar tarea'){
                include("conexion1.php");
                $id_archivo=0;
                $query3 = $mysqli -> query ("SELECT *FROM tarea WHERE idTarea='$id_tarea'");
                if($query3){
                while ($valores3 = mysqli_fetch_array($query3)) {
                
                  $id_archivo=$valores3['id_archivo'];
            
                
                } 
                include("conexion3.php");
                $informes = $mysqli -> query ("SELECT *FROM archivo  WHERE id_archivo='$id_archivo'");
                if($informes){
                while ($informes = mysqli_fetch_array($query3)) {
                
                  $imagen=$informes['imagen'];
                    $nombre_archivo=$informes['nombre_archivo'];
                    if($nombre_archivo!=null){
                      $ruta="subir_archivos/$nombre_archivo";
                      unlink($ruta);
                    }
                    if($nombre_archivo==null){
                      $nombre_archivo="";
                    }
                    if($imagen!=null){
                      $ruta2="subir_archivos/$imagen";
                      unlink($ruta2);
                    }
                        if($imagen==null){
                          $imagen="";
                        }
                } 
              } 
            }
            $query2="DELETE FROM aclaraciones where idTarea='$id_tarea'";
    $resultado2=$conexion->query($query2);

   
    $ELIMINAR='DELETE FROM tarea where idTarea = ' . $id_tarea; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
    $eliminacion=mysqli_query($conexion,$ELIMINAR);
    $querytar="DELETE FROM colaborador where id_tarea='$id_tarea'";
    $resultadotar=$conexion->query($querytar);
    $actualizaciones="DELETE FROM actualizaciones where idtarea='$id_tarea'";
    $resultado_actualizacion=$conexion->query($actualizaciones);
    $tareaanterior="DELETE FROM hilo where tarea_anterior='$id_tarea'";
    $tareaanterior=$conexion->query($tareaanterior);
    $query3="DELETE FROM archivo where id_archivo='$id_archivo'";
    $resultado3=$conexion->query($query3);
    $query4="DELETE FROM colas_de_tareas where idTarea='$id_tarea'";
    $resultado4=$conexion->query($query4);

    $aclaraciones="DELETE FROM aclaraciones where idTarea='$id_tarea'";
    $resultado_aclaracion=$conexion->query($aclaraciones);
            include("conexion4.php");

            $aclarar="INSERT INTO actualizaciones (id_usuario,descripcion,idtarea) VALUES ('$integer','El motivo de eliminacion de tarea fue :$comentarios','$integer2')"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
            $comentario_de_eliminacion=mysqli_query($conexion,$aclarar);
  
                   
            echo "<script> 
            alert('Se elimino de forma correcta'); 
            window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
            </script>";
           }
           
           if($activar=='Asignacion de agente')
           {           
                 include("conexion1.php");

              $procuradores="UPDATE tarea SET procurador='$usrw',pr='$integer3' where idTarea = '$id_tarea'"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
              $asignacion=mysqli_query($conexion,$procuradores);
    
              include("conexion4.php");
              $aclarar2="INSERT INTO actualizaciones (id_usuario,descripcion,idtarea) VALUES ('$integer','El motivo de asignarlo a cierta tarea fue :$explicacion','$integer2')"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
              $comentario_de_eliminacion2=mysqli_query($conexion,$aclarar2);
    
              echo "<script> 
              alert('Se ha asignado a la tarea de manera correcta'); 
              window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
              </script>";

          }
          if($asignar_departamento=='Departamento')
          {           
            include("conexion1.php");

         $procuradores="UPDATE tarea SET Departamento='$departa' where idTarea = '$id_tarea'"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
         $asignacion=mysqli_query($conexion,$procuradores);

         include("conexion4.php");
         $aclarar2="INSERT INTO actualizaciones (id_usuario,descripcion,idtarea) VALUES ('$integer','El motivo de transferir la tarea fue :$explicacion_nuevamente','$integer2')"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
         $comentario_de_eliminacion2=mysqli_query($conexion,$aclarar2);

         echo "<script> 
         alert('Se ha transferido la tarea de manera correcta'); 
         window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
         </script>";

     }
     if($asignar_equipo=='equpo')
     {           
       include("conexion1.php");

    $procuradores="UPDATE tarea SET idequipo='$equipos_seleccionados' where idTarea = '$id_tarea'"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
    $asignacion=mysqli_query($conexion,$procuradores);

    include("conexion4.php");
    $aclarar2="INSERT INTO actualizaciones (id_usuario,descripcion,idtarea) VALUES ('$integer','El motivo de transferir la tarea fue :$aclaracion_equipo','$integer2')"; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
    $comentario_de_eliminacion2=mysqli_query($conexion,$aclarar2);

    echo "<script> 
    alert('Se ha asignado el equipo en las  tareas seleccioandas de manera correcta'); 
    window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
    </script>";

}
        }

        
     }
     else  if($tareas==null) {
         ?>
         <script>
          alert("No haz seleccionado ningún usuario");
          window.history.go(-1);
         </script>
         <?php
     }
     ?>