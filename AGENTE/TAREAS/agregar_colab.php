<?php
$id_usuario=$_POST['id_usuario'];
$id_tarea=$_POST['id_tarea'];
$id_cola=$_POST['id_cola'];
$codigo=$_POST['codigos'];

$colab=$_POST['colab'];

$integer = (int)$id_usuario;
$integer3 = (int)$codigo;

$integer2 = (int)$id_cola;

include("conexion2.php");

$query5 = $mysqli -> query ("SELECT *FROM usuario WHERE id_usuario='$integer'");
                  
                if($query5)
                { while ($valores5 = mysqli_fetch_array($query5)) {
                    $id_colaab=$valores5['id_usuario'];
                }
              }
                $integer4= (int)$id_colaab;
                include("conexion4.php");

                $id_cc='';
                $queryact="SELECT*FROM  actualizaciones WHERE idtarea='$id_tarea'";
                $resultadoact=$conexion->query($queryact);
                while($rowact=$resultadoact->fetch_assoc()){
                
                $id_cc=$rowact['id_actualizacion'];
                
                
                  }

include("conexion1.php");

$procurador="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
$resultadopr=$conexion->query($procurador);
while($rows=$resultadopr->fetch_assoc()){

$id_pr=$rows['procurador'];
$pr=$rows['pr'];
$id_creador=$rows['id_usuario'];
$titulo=$rows['Titulo'];

  }
  include("conexion4.php");

if($id_creador==$integer3){
  $query="INSERT INTO colaborador (id_tarea,id_colab,id_usuario,id_actualizaciones) VALUES ('$id_tarea','$integer','$codigo','$id_cc')";
$resultado=$conexion->query($query);

    

           
$query7="INSERT INTO actualizaciones (id_usuario,id_colaborador,descripcion,idtarea) VALUES ('$id_colaab','$integer','agrego como colaborador a:','$id_tarea')";

$resultado7=$conexion->query($query7);
//header("Location:/UTP/AGENTE/TAREAS/correo_enviar.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo");
}

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
  if($integer3!=$id_creador){
         
    echo "<script> 
    alert('No puedes agregar colaboradores no eres el creador de la tarea'); 
    window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
    </script>"; 
   // header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer");

} 
else{
  echo "<script> 
  window.location.href='/UTP/AGENTE/TAREAS/correo_enviar.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
  </script>"; 
} 

