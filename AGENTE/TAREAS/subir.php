<?php 
       $codigo=$_POST["codigo"];
       $id_tarea=$_POST["id_tarea"];
       $id_archivo=$_POST['id_archivo'];
       $id_cola=$_POST['id_cola'];
       $nombre_archivo=$_POST["nombre_archivo"];

       if(isset($_POST['subir'])){
         $nombre=$_FILES['archivo_select'] ['name'];
         $tipo=$_FILES['archivo_select']['type'];
         $tamaño=$_FILES['archivo_select']['size'];
         $ruta=$_FILES['archivo_select']['tmp_name'];
         $destino="subir_archivos/$nombre";
         if($nombre_archivo==null){ 
          if($nombre!=""){
            if(copy($ruta,$destino)){
              $titulo=$_POST['titulo'];
              $descripcion=$_POST['descripcion'];
              include("conexion1.php");
              $query20="UPDATE archivo SET id_cola='$id_cola',Titulo='$titulo',descripcion='$descripcion',tamaño='$tamaño',tipo='$tipo',nombre_archivo='$nombre' WHERE id_archivo='$id_archivo'";
  $resultado20=$conexion->query($query20);
  if($resultado20){
  }
  else{
  }
            } 
            else{
              echo "error";
            }
           }
         }
      }
        if($nombre_archivo==null){
          echo "<script> 
          alert('Se subio el archivo  correctamente'); 
          window.location.href='/UTP/ADMINISTRADORES/CRUD/TAREAS/detalles_tareas.php?cod=$codigo&detalles=$id_tarea'; 
          </script>"; 
        }else{
          echo "<script> 
          alert('no puedes subir archivo , necesitas borrar el actual para subir el que deseas'); 
          window.location.href='/UTP/ADMINISTRADORES/CRUD/TAREAS/detalles_tareas.php?cod=$codigo&detalles=$id_tarea'; 
          </script>"; 
        }
    
       ?>