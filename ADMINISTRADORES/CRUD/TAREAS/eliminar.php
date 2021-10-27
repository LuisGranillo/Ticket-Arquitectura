<?php

   
    $tareas_select="";

    if(@$_POST["TAREAS"]!=null){
        $tareas_select=$_POST['TAREAS'];

    }else{


    }

             include("../conexion_ticket.php");
    if($tareas_select!=null) // Esto es para los checkbox que seleccionaste
    {
        foreach ($_POST['TAREAS'] as  $id_tarea)

        { // este ciclo recorre cada usuario en tu caso serian las tareas
            $integer2 = (int)$id_tarea;

            include("../conexion_ticket.php");
            $id_archivo=0;
                $query3 = "SELECT *FROM tarea  WHERE idTarea='$id_tarea'";
                $buscar_archivos=mysqli_query($conexion,$query3);

                if($buscar_archivos){
                    while($valores3=$buscar_archivos->fetch_assoc()){                
                  $id_archivo=$valores3['id_archivo'];
            
                
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
  

        }
   
        echo "se elimino la tarea correctamente espere que se actualice la pagina";
        if($id_tarea==null) {
            ?>
            <?php
       echo "No has seleccionada ninguna";
       }
     }
   
   
    
     ?>
     