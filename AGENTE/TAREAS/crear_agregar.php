<?php
    $idTarea =$_GET['idTarea'];
   
    $codigo =$_GET['codigo'];
    $telefono =$_GET['telefono'];


    $integer = (int)$codigo;

    include("conexion4.php");

$query4="SELECT*FROM  usuario WHERE correo='$telefono'";
$resultado4=$conexion->query($query4);
if($resultado4){
while($row4=$resultado4->fetch_assoc()){

$id=$row4['id_usuario'];


  }
}
$id_cc='';
  $queryact="SELECT*FROM  actualizaciones WHERE idtarea='$idTarea'";
  $resultadoact=$conexion->query($queryact);
  while($rowact=$resultadoact->fetch_assoc()){
  
  $id_cc=$rowact['id_actualizacion'];
  
  
    }
    include("conexion1.php");

    $queRYTAR="SELECT*FROM  tarea WHERE idTarea='$idTarea'";
    $resultado_tareas=$conexion->query($queRYTAR);
    while($rowactee=$resultado_tareas->fetch_assoc()){
    
    $id_colass=$rowactee['id_cola'];
    
    
      }

  if($id!=null){
    include("conexion4.php");

    $query7="INSERT INTO actualizaciones (id_usuario,id_colaborador,descripcion,idtarea) VALUES ('$integer','$id','A agregado como colaborador a:','$idTarea') " ;

    $resultado7=$conexion->query($query7) OR die("problemas al insertar");
$query="INSERT INTO colaborador (id_tarea,id_colab,id_actualizaciones,id_usuario) VALUES ('$idTarea','$id','$id_cc','$integer')";

$resultado=$conexion->query($query) OR die("problemas al insertar");



if($resultado){
  echo "se actualizo correctamente";

  include("conexion2.php");


$query4 = $mysqli -> query ("SELECT *FROM tarea WHERE idTarea='$idTarea'");
if($query4){                    
while ($valores4 = mysqli_fetch_array($query4)) {

                   
                      $id_cola=$valores4['id_cola'];


                  }
                }
  header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_colass&usur=$integer");


}
else{

    printf("Errormessage: %s\n", mysqli_error($conexion));
     }
}
if($id==null){
   header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_colass&usur=$integer");


}