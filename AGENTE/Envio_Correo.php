

<?php
include("Mailer/src/PHPMailer.php");
include("Mailer/src/SMTP.php");
include("Mailer/src/Exception.php");

try{

    $emailTo = $_POST["correo"];
    $subject = $_POST["asunto"];
    $bodyEmail = $_POST["mensaje"];
    $files = $_FILES["Archivos"];
    

    $fromemail = "utp0139968@alumno.utpuebla.edu.mx";
    $fromname = "francisco";
    $host = "smtp.gmail.com"; // gmail";
    $port = "587";
    $SMTPAuth = "true";
    $SMTPSecure = "tls";
    $Password = "platanito12";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();

    $mail->SMTPDebug = 2;
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->SMTPAuth = $SMTPAuth;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->Username = $fromemail;
    $mail->Password = $Password;

    $mail->setFrom($fromemail, $fromname);
    $mail->addAddress($emailTo);

    // asunto
    $mail->isHTML(true);
    $mail->Subject = $subject;

    //cuerpo 

    $mail->Body = $bodyEmail;

    if (!$mail->send()){
        echo "no se envio"; die();
    }
    else{
        echo "correo enviado con exito!!"; die();

    }

}
catch (Exception $e) {

}

?>
