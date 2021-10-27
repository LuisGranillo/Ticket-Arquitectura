<?php
include("../Mailer/src/PHPMailer.php");
include("../Mailer/src/SMTP.php");
include("../Mailer/src/Exception.php");

try{
    $id = $_GET["id"];
    $emailTo = $_POST["correo"];
    $subject = $_POST["asunto"];
    $bodyEmail = $_POST["mensaje"];
    $files = $_FILES["Archivos"];
    $mypasword =$_POST['7'];
    

    $fromemail = $_POST['8'];
    $fromname = $_POST['nombre'];
    $host = "smtp.gmail.com"; // gmail";
    $port = "587";
    $SMTPAuth = "true";
    $SMTPSecure = "tls";
    $Password = $mypasword;

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();

    $mail->SMTPDebug = 0;
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
      echo "<script>alert('Tu Validacion fue erronea '); window.history.go(-1);</script>"; die();
    }
    else{
      echo "<script> window.location='tickets_mios.php?id=$id'</script>"; die();

    }

}
catch (Exception $e) {

}

?>
