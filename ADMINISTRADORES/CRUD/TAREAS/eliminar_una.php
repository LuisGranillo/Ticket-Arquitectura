<?php
include("../conexion_ticket.php");
$tareas="";
if(@$_POST["detalles"]!=null){
    $tareas=$_POST['detalles'];

}else{


}
    if($tareas!=null) // Esto es para los checkbox que seleccionaste
    {

            $integer2 = (int)$tareas;
            $query2="DELETE FROM aclaraciones where idTarea='$id_tarea'";
            $resultado2=$conexion->query($query2);
        
        
            $ELIMINAR='DELETE FROM tarea where idTarea = ' . $integer2; //Recuerda que lo que viene dentro del post que es ususarios es el nombre del input checkbox
            $eliminacion=mysqli_query($conexion,$ELIMINAR);
            
            $tareaanterior="DELETE FROM hilo where tarea_anterior='$integer2'";
            $tareaanterior=$conexion->query($tareaanterior);
            $query3="DELETE FROM archivo where id_archivo='$integer2'";
            $resultado3=$conexion->query($query3);
            $query4="DELETE FROM colas_de_tareas where idTarea='$integer2'";
            $resultado4=$conexion->query($query4);
        
            $aclaraciones="DELETE FROM aclaraciones where idTarea='$integer2'";
            $resultado_aclaracion=$conexion->query($aclaraciones);
    
    include("../conexion.php");
    $querytar="DELETE FROM colaborador where id_tarea='$integer2'";
    $resultadotar=$conexion->query($querytar);
    $actualizaciones="DELETE FROM actualizaciones where idtarea='$integer2'";
    $resultado_actualizacion=$conexion->query($actualizaciones);
    include("../conexion_ticket.php");
    $archivitos="SELECT*FROM tarea WHERE idTarea='$integer2'";
    $recorr=$conexion->query($archivitos);
    $id_archivo=0;
    if($recorr){
    while($ciclos=$recorr->fetch_assoc()){
 
      $id_archivo=$ciclos['id_archivo'];

      }
    }
    $borrar_archivos="DELETE FROM archivo WHERE id_archivo='$id_archivo'";
    $borrar_archiv=$conexion->query($borrar_archivos);
    if($borrar_archiv){

    }
     
     }
     echo "Se ha eliminado las tareas seleccionadas correctamente se vera reflejado en 45 segundos el cambio";
