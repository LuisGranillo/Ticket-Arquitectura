<?php
$id_usuario=$_POST['id_usuario'];
$id_tarea=$_POST['id_tarea'];
$id_cola=$_POST['id_cola'];
$codigo=$_POST['codigos'];

$colab=$_POST['colab'];

$integer = (int)$id_usuario;
$integer3 = (int)$codigo;

$integer2 = (int)$id_cola;
echo $integer;

include("../conexion.php");

$query5 ="SELECT *FROM usuario WHERE id_usuario='$integer'";
$userman=$conexion->query($query5);
          
                if($userman)
                { while($valores5=$userman->fetch_assoc()){

                    $id_colaab=$valores5['id_usuario'];
                }
              }
                $integer4= (int)$id_colaab;
                include("../conexion.php");

                $id_cc='';
                $queryact="SELECT*FROM  actualizaciones WHERE idtarea='$id_tarea'";
                $resultadoact=$conexion->query($queryact);
                while($rowact=$resultadoact->fetch_assoc()){
                
                $id_cc=$rowact['id_actualizacion'];
                
                
                  }

                  include("../conexion_ticket.php");

$procurador="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
$resultadopr=$conexion->query($procurador);
while($rows=$resultadopr->fetch_assoc()){

$id_pr=$rows['procurador'];
$pr=$rows['pr'];
$id_creador=$rows['id_usuario'];
$titulo=$rows['Titulo'];

  }
  include("../conexion.php");


  $query="INSERT INTO colaborador (id_tarea,id_colab,id_usuario,id_actualizaciones) VALUES ('$id_tarea','$integer','$codigo','$id_cc')";
$resultado=$conexion->query($query);

    

           
$query7="INSERT INTO actualizaciones (id_usuario,id_colaborador,descripcion,idtarea) VALUES ('$id_colaab','$integer','A agregado como colaborador a:','$id_tarea')";

$resultado7=$conexion->query($query7);
//header("Location:/UTP/AGENTE/TAREAS/correo_enviar.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo");


$query4="SELECT*FROM  colaborador WHERE id_colab='$integer'";
$resultado4=$conexion->query($query4);
while($row4=$resultado4->fetch_assoc()){

$id=$row4['id_colaborador'];


  }

$queryact="SELECT*FROM  actualizaciones WHERE idtarea='$id_tarea'";
$resultadoact=$conexion->query($queryact);
while($rowact=$resultadoact->fetch_assoc()){

$id_cc=$rowact['id_actualizacion'];


  }

  echo "<script> 
  window.location.href='correo_enviar.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
  </script>"; 
 

