<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../USUARIOS/Exception.php';
require '../USUARIOS/PHPMailer.php';
require '../USUARIOS/SMTP.php';
$Nombre=$_POST['nombre'];
$Apellidos=$_POST['apellidos'];
$Correo=$_POST['correo'];
$Contraseña=$_POST['contraseña'];
$Completo= $Nombre . " " . $Apellidos;
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'leonardosainos@gmail.com';                     //SMTP username
    $mail->Password   = 'bboyleonardo2019';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('leonardosainos@gmail.com', 'Leonardo Sainos');
    $mail->addAddress($Correo, $Completo);     //Add a recipient
     
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet='UTF-8';
    $mail->Subject = 'Reseteo de contraseña';
    $mail->Body    = '<p style="text-align:justify;">Estimado usuario : ' . $Completo . '.<br> Hemos reseteado su contraseña como lo solicitó. <br> Su nueva contraseña es : <b>' .$Contraseña. '</b><br><br><br>
    
    <img src="https://lh3.googleusercontent.com/proxy/pZ2-tHFYg5S8JQgzElyEPYgiMj2GrUIzrneZ53k6c8s4iOb18HIpOepif7VZUnsZy22SQTOXwS_SjBD87afXg3dVA5HGSNyMTw">
    <br>
    <br>
    <br>
    <p style="text-align:justify;">
    Atentamente Centro de Soporte, Subdirección de Educación a Distancia 
    <br>
    <hr>
    Esperamos haber atendido satisfactoriamente a su duda. De lo contrario, responda al ticket que tiene abierto.Ingrese a su cuenta.
    </p>' ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  ?>
  <script>
                         
                         alert("Contraseña reseteada correctamente");
                         window.history.go(-2);
  </script>
  <?php
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    ?>
    <script>
               window.history.go(-2);
    </script>
    <?php
}
?>