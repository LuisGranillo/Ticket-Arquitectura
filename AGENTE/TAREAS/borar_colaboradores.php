<?php
  $id_usuario=$_POST['usuarios'];
  $id_tarea=$_POST['id_tarea'];
  $id_cola=$_POST['id_cola'];
  $codigo=$_POST['codigos'];
  $colab=$_POST['colab'];

  $integer = (int)$id_usuario;
  $integer2 = (int)$codigo;

  include("conexion4.php");

    $query="DELETE FROM colaborador where id_colab='$integer'";
    $resultado=$conexion->query($query);

                      include("conexion4.php");

$query7="INSERT INTO actualizaciones (id_usuario,id_colaborador,descripcion,idtarea) VALUES ('$integer2','$integer','Elimino a:',$id_tarea)";

$resultado7=$conexion->query($query7);
echo "<script> 
window.location.href='/UTP/AGENTE/TAREAS/correo.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
</script>";
