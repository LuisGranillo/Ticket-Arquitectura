<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);

 
try {

    $correo_proc=$_GET['correo_proc'];
    include("conexion4.php");
$queryact="SELECT*FROM usuario WHERE correo='$correo_proc'";
$resultadoact=$conexion->query($queryact);
while($rowact=$resultadoact->fetch_assoc()){

$nombre_usuario=$rowact['nombre'];
$apellido_usuario=$rowact['apellidos'];

  }
  $proc=$_GET['proc'];
  $procuradores="SELECT*FROM usuario WHERE id_usuario='$proc'";
$resultprr=$conexion->query($procuradores);
while($rowacte=$resultprr->fetch_assoc()){

$nom_prc=$rowacte['nombre'].'&nbsp;'.$rowacte['apellidos'];   

  }
  include("conexion1.php");

  $tareas="SELECT*FROM tarea WHERE pr='$proc'";
  $tareas_pr=$conexion->query($tareas);
  while($rowactee=$tareas_pr->fetch_assoc()){
  
  $id_tarea=$rowactee['idTarea'];
  $titulo_tarea=$rowactee['Titulo'];
  $Vencimiento=$rowactee['Vencimiento'];
  $Departamento=$rowactee['Departamento'];

  $Descripcion=$rowactee['Descripcion'];

    }
 

     include("./conexion4.php");
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
    $mail->addAddress("$correo_proc");     //Add a recipient




    //Content
    $mail->isHTML(true);       
    $mail->CharSet = 'UTF-8';                           //Set email format to HTML
    $mail->Subject = " Hola agente ( $nombre_usuario $apellido_usuario ) tienes una tarea asignada";//Asunto
    $mail->Body    = "<p style='text-align: justify;'> Hola agente tienes una tarea asignada por: $nom_prc , favor de verificar , el numero de tarea es : $id_tarea , su titulo es: $titulo_tarea y  tiene  una 
    fecha de vencimiento: $Vencimiento, como descripcion : $Descripcion  y el departamento asignado por la tarea es : $Departamento . Favor de estar atento en su vencimiento y verificar dentro de la plataforma gracias.</p></b>
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
    echo 'El mensaje se envio correctamente';

} catch (Exception $e) {
    echo "error al enviar: {$mail->ErrorInfo}";

}
$id_usuario=$_GET['codigo'];

header("Location:/UTP/AGENTE/TAREAS/exicto_envio.php?codigos=$id_usuario");
