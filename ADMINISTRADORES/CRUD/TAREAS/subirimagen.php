<?php 
       $codigo=$_POST["codigo"];
       $id_tarea=$_POST["id_tarea"];
       $id_archivo=$_POST['id_archivo'];
       $id_cola=$_POST['id_cola'];
       if(isset($_POST['subir'])){
         $nombre=$_FILES['archivo_select'] ['name'];
         $tipo=$_FILES['archivo_select']['type'];
         $tamaño=$_FILES['archivo_select']['size'];
         $ruta=$_FILES['archivo_select']['tmp_name'];
         $destino="subir_archivos/$nombre";

         if($nombre!=""){
          if(copy($ruta,$destino)){
         
            include("../conexion_ticket.php");
            $query20="UPDATE archivo SET imagen='$nombre' WHERE id_archivo='$id_archivo'";
$resultado20=$conexion->query($query20);
if($resultado20){
    echo "se actualizo correctamente";
}
else{
    echo "error al actualizar";
}
          } 
          else{
            echo "error";
          }
         }
       }
       echo "<script> 
       alert('Se subio la imagen correctamente'); 
       window.location.href='detalles_tareas.php?cod=$codigo&detalles=$id_tarea'; 
       </script>"; 
       ?>