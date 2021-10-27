<?php



$imagen='';
if(@$_POST['imagen']!=null){
    $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));


}
else{
  $imagen='';
}$imagen='';
if(@$_POST['imagen']!=null){
  $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));


}
else{
  $imagen='';
}
$re=$_POST["comentarios"];
$id_tarea=$_POST["idTarea"];
$id_cola=$_POST["id_cola"];
$id_archivo=$_POST["id_archivo"];
$id_usuario=$_POST["id_usuario"];
$id_rep=$_POST["id_resp"];
$id_usuario_resp=$_POST['id_usuario_res'];


$integer = (int)$id_rep;
$integer2 = (int)$id_usuario;

if($integer2!=$id_usuario_resp){
         
    echo "<script> 
    alert('No puedes eliminar esta respuesta ,no eres el propietario'); 
    window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer2&id_cola=$id_cola&usur=$integer2'; 
    </script>"; 
   // header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer2");

} else{
echo $id_tarea;
echo "----------";
echo $id_cola;
echo "----------";

echo $id_archivo;
echo "----------";

echo $id_usuario;

include("conexion3.php");
$procurador_tr = $mysqli -> query ("DELETE FROM respuesta WHERE id_respuesta='$id_rep'");

header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer2&id_cola=$id_cola&usur=$integer2");
}