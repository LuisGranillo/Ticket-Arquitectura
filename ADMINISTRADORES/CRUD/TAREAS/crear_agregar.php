<?php
    $idTarea =$_GET['idTarea'];
   
    $codigo =$_GET['codigo'];
    $telefono =$_GET['telefono'];


    $integer = (int)$codigo;

    include("../conexion.php");

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
    include("../conexion_ticket.php");

    $queRYTAR="SELECT*FROM  tarea WHERE idTarea='$idTarea'";
    $resultado_tareas=$conexion->query($queRYTAR);
    while($rowactee=$resultado_tareas->fetch_assoc()){
    
    $id_colass=$rowactee['id_cola'];
    
    
      }

  if($id!=null){
    include("../conexion.php");

    $query7="INSERT INTO actualizaciones (id_usuario,id_colaborador,descripcion,idtarea) VALUES ('$integer','$id','A agregado como colaborador a:','$idTarea') " ;

    $resultado7=$conexion->query($query7) OR die("problemas al insertar");
$query="INSERT INTO colaborador (id_tarea,id_colab,id_actualizaciones,id_usuario) VALUES ('$idTarea','$id','$id_cc','$integer')";

$resultado=$conexion->query($query) OR die("problemas al insertar");



if($resultado){

  include("../conexion_ticket.php");


$query4 ="SELECT *FROM tarea WHERE idTarea='$idTarea'";
$resultcomp=$conexion->query($query4);

if($resultcomp){                    
    while($valores4=$resultcomp->fetch_assoc()){

                   
                      $id_cola=$valores4['id_cola'];


                  }
                }
                echo "<script> 
            
                window.location.href='detalles_tareas.php?cod=$integer&detalles=$idTarea'; 
                </script>"; 

}
else{

    printf("Errormessage: %s\n", mysqli_error($conexion));
     }
}
if($id==null){
    echo "<script> 
    alert('Se completo el proceso de manera correctamente'); 
    window.location.href='detalles_tareas.php?cod=$integer&detalles=$idTarea'; 
    </script>"; 

}