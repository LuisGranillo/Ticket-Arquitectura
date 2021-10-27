<?php
$n=$_GET['codigo'];
 $usur=$_GET['usur'];
 $idTarea=$_GET['idTarea'];
 $id_cola=$_GET['id_cola'];
 $integer = (int)$n;

  

     
 include("conexion1.php");
 $tareas="SELECT*FROM tarea WHERE idTarea='$idTarea'";
 $tareas_pr=$conexion->query($tareas);
 while($rowactee=$tareas_pr->fetch_assoc()){
     
 
 $pr=$rowactee['pr'];

 $idequipo=$rowactee['idequipo'];
}
 
  

   
   include("conexion4.php");
   $queryact="SELECT*FROM usuario WHERE id_usuario='$integer'";
   $resultadoact=$conexion->query($queryact);
   while($rowact=$resultadoact->fetch_assoc()){
   
   $nombre_usuario=$rowact['nombre'];
   $apellido_usuario=$rowact['apellidos'];
     }

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    $mail = new PHPMailer(true);
    
    
   
    try {

  include("conexion4.php");
  $correos="SELECT*FROM usuario WHERE id_usuario='$pr'";
  $resultado_cor=$conexion->query($correos);
  while($rowactc=$resultado_cor->fetch_assoc()){
    $nombre_usuario2=$rowactc['nombre'];
     $correo=$rowactc['correo'];

  $nombre_usuario2=$rowactc['nombre'];
  $apellido_usuario2=$rowactc['apellidos'];
    }
   
    include("conexion4.php");

    $lider="SELECT*FROM usuario WHERE id_usuario='$idequipo'";
    $lider_equipo=$conexion->query($lider);
    while($lir=$lider_equipo->fetch_assoc()){
    
    $nombre_usuario3=$lir['nombre'];
    $apellido_usuario3=$lir['apellidos'];
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
        $mail->CharSet = 'UTF-8';                        //Set email format to HTML
        $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 ) se ha colocado un jefe de equipo por : $nombre_usuario  $apellido_usuario en la tarea";//Asunto
        $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha dado una respuesta en la tarea : $idTarea . El lider del equipo seleccionado es: $nombre_usuario3  $apellido_usuario3 .Favor de verificar  dentro de la plataforma</p></b>
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
    window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
    </script>";
    
        
    

