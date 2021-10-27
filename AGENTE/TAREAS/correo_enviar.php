<?php
 $n=$_GET['codigo'];
 $usur=$_GET['usur'];
 $idTarea=$_GET['idTarea'];
 $id_cola=$_GET['id_cola'];
 include("conexion4.php");

 $query4="SELECT*FROM  colaborador WHERE id_tarea='$idTarea'";
 $resultado4=$conexion->query($query4);
 while($row4=$resultado4->fetch_assoc()){
 
 $id=$row4['id_colab'];
 
 
   }
 include("conexion1.php");
$procurador="SELECT*FROM  tarea WHERE idTarea='$idTarea'";
$resultadopr=$conexion->query($procurador);
while($rows=$resultadopr->fetch_assoc()){

$id_pr=$rows['procurador'];
$pr=$rows['pr'];

$titulo=$rows['Titulo'];

  }
  
  $integer = (int)$n;




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
      include("conexion4.php");

      $correos="SELECT*FROM usuario WHERE id_usuario='$pr'";
    $resultado_cor=$conexion->query($correos);
    while($rowactc=$resultado_cor->fetch_assoc()){
    
    $correo=$rowactc['correo'];
    $nombre_usuario2=$rowactc['nombre'];
    $apellido_usuario2=$rowactc['apellidos'];
      }
      include("conexion4.php");

      $correos3="SELECT*FROM usuario WHERE id_usuario='$id'";
      $resultado_cor3=$conexion->query($correos3);
      while($rowactc3=$resultado_cor3->fetch_assoc()){
      
      $correo3=$rowactc3['correo'];
      $nombre_usuario3= $rowactc3['nombre'];
      $apellido_usuario3=$rowactc3['apellidos'];
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
    $mail->CharSet = 'UTF-8';                           //Set email format to HTML
    $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 ) se ha agregado como colaborador a: $nombre_usuario3 $apellido_usuario3";//Asunto
    $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha agregado un colaborador en el numero de tarea :$idTarea , con el titulo : $titulo por el usuario : $nombre_usuario .Favor de estar atento en su vencimiento y verificar dentro de la plataforma gracias.</p></b>
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
$id_usuario=$_GET['codigo'];


    echo "<script> 
        alert('Se ha añadido de forma correcta un colaborador .Colaborador agregado : $nombre_usuario3 $apellido_usuario3'); 
        window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
        </script>";


