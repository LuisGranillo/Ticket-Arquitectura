<?php

$id_usuario =$_POST['id_usuario'];
$id_tarea =$_POST['id_tarea'];
$aclaracion =$_POST['aclaracion'];
$departamentos =$_POST['departamentos'];


$id=$_POST['id_cola'];


$integer = (int)$id_usuario;


include("conexion1.php");


  $procurador="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
$resultadopr=$conexion->query($procurador);
while($rows=$resultadopr->fetch_assoc()){

$id_pr=$rows['procurador'];
$pr=$rows['pr'];

$titulo=$rows['Titulo'];
$id_creador=$rows['id_usuario'];

  }
 




  if($integer!=$id_creador){
         
    echo "<script> 
    alert('No puedes cambiar la fecha no eres el creador de la tarea'); 
    window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id&usur=$integer'; 
    </script>"; 
   // header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer");

} else{
echo "<script> 
window.location.href='/UTP/AGENTE/TAREAS/actualizaciones2.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id&usur=$integer&departamentos=$departamentos&aclaracion=$aclaracion'; 
</script>";

}