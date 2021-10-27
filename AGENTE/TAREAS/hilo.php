<?php
$imagen= $_FILES['fileUpload']['name'];

if($imagen!=""){


  $imagen=addslashes(file_get_contents($_FILES["fileUpload"]["tmp_name"]));

}
else{
  $imagen='';

}
$re=$_POST["comentarios2"];
$id_tarea=$_POST["id_tarea"];
$id_cola=$_POST["id_cola"];
$id_archivo=$_POST["id_archivo"];
$id_usuario=$_POST["id_usuario"];


$integer = (int)$id_usuario;


include("conexion1.php");



$departarea="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
$resultadodepart=$conexion->query($departarea);
while($rowdepart=$resultadodepart->fetch_assoc()){

$departamento=$rowdepart['Departamento'];
$id_pr=$rowdepart['procurador'];
$Titulo=$rowdepart['Titulo'];
$pr=$rowdepart['pr'];
$titulo=$rowdepart['Titulo'];
$id_creador=$rowdepart['id_usuario'];

  }

if($id_usuario==$id_creador){
  $query2="UPDATE tarea SET Descripcion='$re'WHERE idTarea='$id_tarea'";

$resultado2=$conexion->query($query2);
if($_FILES['fileUpload']!=null){ 
  $nombre_imagen=$_FILES['fileUpload'] ['name'];
  $tipo_imagen=$_FILES['fileUpload']['type'];
  $tamaño_imagen=$_FILES['fileUpload']['size'];
  $rutav=$_FILES['fileUpload']['tmp_name'];
  $destino_imagen="subir_archivos/$nombre_imagen";

  if($nombre_imagen!=""){
   if(copy($rutav,$destino_imagen)){
  
     include("conexion1.php");
     $query3="UPDATE archivo SET imagen='$nombre_imagen'WHERE id_archivo='$id_archivo'";
     $resultadoar=$conexion->query($query3);
     

   } 
   else{
     echo "error";
   }
  }
}
}
else{

  echo "<script> 
  alert('No puedes editar la tarea no eres el creador'); 
  window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
  </script>"; 
}
include("conexion4.php");
$queryact="SELECT*FROM usuario WHERE id_usuario='$integer'";
$resultadoact=$conexion->query($queryact);
while($rowact=$resultadoact->fetch_assoc()){

$nombre_usuario=''.$rowact['nombre'].'&nbsp;'.$apellido_usuario=$rowact['apellidos'].'';

  }
  $correos="SELECT*FROM usuario WHERE id_usuario='$pr'";
$resultado_cor=$conexion->query($correos);
while($rowactc=$resultado_cor->fetch_assoc()){

$correo=$rowactc['correo'];
$nombre_usuario2=$rowactc['nombre'];
$apellido_usuario2=$rowactc['apellidos'];
  }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);

 
try {

    include("conexion4.php");
    $queryact="SELECT*FROM usuario WHERE id_usuario='$integer'";
    $resultadoact=$conexion->query($queryact);
    while($rowact=$resultadoact->fetch_assoc()){
    
    $nombre_usuario=''.$rowact['nombre'].'&nbsp;'.$apellido_usuario=$rowact['apellidos'].'';
    
      }

      $correos="SELECT*FROM usuario WHERE id_usuario='$pr'";
    $resultado_cor=$conexion->query($correos);
    while($rowactc=$resultado_cor->fetch_assoc()){
    
    $correo=$rowactc['correo'];
    $nombre_usuario2=$rowactc['nombre'];
    $apellido_usuario2=$rowactc['apellidos'];
      }
    
  


      $consulta= mysqli_query($conexion, "SELECT correo, (aes_decrypt(contraseña,'AES')) AS  RECUPERAR FROM enviocorreo;");
      if ($consulta) {
          $c3=mysqli_fetch_assoc($consulta);
          $zc=$c3['correo'];
          $zcc=$c3['RECUPERAR'];
 
       }
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "$zc";                     //SMTP username
    $mail->Password   = "$zcc";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("$zc", 'Subdirección de Educación a Distancia');
    $mail->addAddress("$correo");     //Add a recipient




    //Content
    $mail->isHTML(true);       
    $mail->CharSet = 'UTF-8';    


                      //Set email format to HTML
    $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 ) se ha modificado la tarea";//Asunto
    $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha modificado la tarea : $id_tarea , con el titulo : $titulo por: $nombre_usuario , favor de verificar ,
    ahora las indicaciones son: $re .Favor de verificar dentro de la plataforma gracias.</p></b>
    <br>
    <br>
    <img src='https://mir-s3-cdn-cf.behance.net/projects/404/7a3bbf33243463.Y3JvcCw4NDYsNjYyLDE5Miww.jpg'>
    <br>
    <br>
    CONTACTO:
  
    <p style='text-align: justify;'> Dirección de la Universidad Tecnologica de Puebla : Antiguo Camino a la Resurreción 1002-A Zona Industrial Oriente 72300 Puebla. <br>
    Correo electrónico : evirtual@utpuebla.edu.mx <br>
    teléfono: (222) 309 88 36</p>

</html>";


    $mail->send();

} catch (Exception $e) {

}


    echo "<script> 
        alert('Se ha actualizado la tarea de manera correcta'); 
        window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
        </script>";



