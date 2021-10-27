<?php

$codigo=$_POST['codigos'];
$id_tarea=$_POST['id_tarea'];
$id_cola=$_POST['id_cola'];

include("conexion2.php");
                                         
$query3 = $mysqli -> query ("SELECT *FROM usuario  WHERE id_usuario='$codigo'");
if ($query3) {
    while ($valores3 = mysqli_fetch_array($query3)) {
        $nombre=$valores3['nombre'];
        $apellidos=$valores3['apellidos'];
        $correo=$valores3['correo'];
    }
}

require_once("conexion1.php");
$query3="SELECT*FROM colas_de_tareas WHERE id_cola='$id_cola'";
$resultado3=$conexion->query($query3);

while($row=$resultado3->fetch_assoc()){

  $estado=$row['estado'];


  
  }
  
  $query2="SELECT*FROM tarea WHERE idTarea='$id_tarea'";
  $resultado2=$conexion->query($query2);
  while($row=$resultado2->fetch_assoc()){
  
    $Titulo=$row['Titulo'];
    $Creacion_tarea=$row['Creacion_tarea'];
    $descripcion_tarea=$row['Descripcion'];

    $Creacion_tarea=$row['Creacion_tarea'];
    $Vencimiento=$row['Vencimiento'];
    $Departamento=$row['Departamento'];
    $procurador=$row['procurador'];
    $id_archivo=$row['id_archivo'];
    $idequipo=$row['idequipo'];

  }
$usuario='';
  $query21="SELECT*FROM hilo WHERE id_cola='$id_cola'";
  $resultado21=$conexion->query($query21);
  while($row2=$resultado21->fetch_assoc()){
  
    $publicado=$row2['fecha_creacion'];
    $tareaanterior_hilo=$row2['tarea_anterior'];
    $usuario=$row2['usuario'];
    $idTarea=$row2['idTarea'];

  
    
    }
    require_once("conexion2.php");
                                         
$query3 = $mysqli -> query ("SELECT *FROM usuario  WHERE id_usuario='$usuario'");
if ($query3) {
    while ($valores3 = mysqli_fetch_array($query3)) {
        $nombre2=$valores3['nombre'];
        $apellidos2=$valores3['apellidos'];
    }
}

require_once("conexion2.php");
$id_usuario_respuesta='';
                                     
  $query3 = $mysqli -> query ("SELECT *FROM usuario  WHERE id_usuario='$id_usuario_respuesta'");
  if ($query3) {
      while ($valores3 = mysqli_fetch_array($query3)) {
          $nombre3=$valores3['nombre'];
          $apellidos3=$valores3['apellidos'];
      }
  }
  require_once("conexion2.php");
$query22 = $mysqli -> query ("SELECT *FROM respuesta where id_cola ='$id_cola'");
 if($query22){ 
while ($valores22 = mysqli_fetch_array($query22)) {

 
 $id_usuario_respuesta=$valores22['id_usuario'];
  
  }
}
  $fechaActual = date('d-m-Y H:i:s');
  $numero_paginas = "{nb}";/*
$query21 = $mysqli -> query ("SELECT *FROM Hilo WHERE id_cola='$id_cola'");
while ($valores21 = mysqli_fetch_array($query21)) {
  $html=$html .'<b>'.$valores21['descripcion'] .'<b>';
  echo "<br/>";
  echo "Publicado : ". $valores21['fecha_creacion'] . "<br/>";
  echo "Tarea ". $valores21['idTarea'] . "<br/>";

  echo "Tarea creada desde # ". $valores21['tarea_anterior'] . "<br/>";

  echo "<p style=background: #f8ef9d; color: #0c92ac; font-weight: bold; padding: 20px; border: 10px solid #abecf9; border-radius: 6px;>";
  



  
 echo "</p>";
  
  
  }
  
  */
  
  $html=$html .'<h1>  Subdirección de
  Educación a Distancia  </h1>';
 
  $html=$html .'_____________________________________________________________________________________________________';
  $html=$html .'<b> '. $nombre3 .'&nbsp;'. $apellidos3 .'&nbsp;'. $fechaActual .' </b>';
  $html=$html .'<h2>  Trabajos </h2>';
$html=$html .'<h1> TAREA# '. $id_tarea .'  </h1>';
$html=$html .'<p> '. $nombre .'&nbsp;'. $apellidos .'  </p>';
$html=$html .'<p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">';

$html=$html .'<b>Estado '. $estado .'</b>';
$html=$html .'<br>';
$html=$html .'<b>Creado en: '. $Creacion_tarea .'</b>';
$html=$html .'<br>';
$html=$html .'<b>Fecha de Vencimiento: '. $Vencimiento .'</b>';
$html=$html .'</p>';
$html=$html .'<p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">';
$html=$html .'<b> Departamento: '. $Departamento .'</b>';
$html=$html .'<br>';
$html=$html .'<b> Asignado a: '. $procurador .'</b>';

$html=$html .'<br>';
$html=$html .'<b>Colaboradores</b>';

$html=$html .'</p>';
$html=$html .'<p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">';
$html=$html .'<b> '. $nombre2 .'&nbsp;'. $apellidos2 .'  </b>';
$html=$html .'<br>';
$html=$html .'<b> Publicado: '. $publicado .'</b>';
$html=$html .'</p>';
require_once("conexion1.php");

$query21="SELECT*FROM hilo WHERE id_cola='$id_cola'";
$resultado21=$conexion->query($query21);
while($row2=$resultado21->fetch_assoc()){

  $html=$html .'<br>';

  $html=$html .'<b> Tarea creada desde #'. $row2['tarea_anterior'] .'</b>';
  $html=$html .'<br>';
  $html=$html .'<b> Tarea creada #'. $row2['idTarea'] .'</b>';

  }


$html=$html .'<p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">';
$html=$html .'</p>';
$html=$html .'<p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">';

$html=$html .'<b> '. $nombre3 .'&nbsp;'. $apellidos3 .'  </b>';
$html=$html .'</p>';

$html=$html .'<center>';
require_once("conexion3.php");

$query22 = $mysqli -> query ("SELECT *FROM respuesta where id_cola ='$id_cola'");
if ($query22) {
    while ($valores22 = mysqli_fetch_array($query22)) {
        $html=$html .'<img align="center" style="border:  5px; border-radius: 50%;" width="150" height="150" src="data:image/jpeg;base64,'.base64_encode($imagen_res=$valores22['imagen']).'"/>';
        $html=$html .'<br>';
        $html=$html .'<b>'. $valores22['fecha_creacion'].'</b>';

        $html=$html .'<br>';

        $html=$html .'<b>'.   $valores22['descripcion'].'</b>';
        $html=$html .'<br>';
    }
}
$html=$html .'</center>';
$html=$html .'<p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">';
$html=$html .'</p>';
$html=$html .'<b>Tarea #'. $id_tarea .'&nbsp;impreso por&nbsp;'. $correo .'&nbsp;&nbsp;'. $fechaActual .'</b>';
$html=$html .'<br>';
$html=$html .'<b>Pagina:&nbsp;&nbsp;'. $numero_paginas .'</b>';

  //  $resultad->MoveNext();



 
require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new  \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output();

?>
