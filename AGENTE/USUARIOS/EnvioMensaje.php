
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require '../USUARIOS/Exception.php';
 require '../USUARIOS/PHPMailer.php';
 require '../USUARIOS/SMTP.php';

 include("../conexion.php");
 

$Agente=$_POST['Agente'];
$Comun=$_POST['Comun'];
$Envia=$_POST['Envia'];
$Nota=$_POST['Nota'];


$NOTA=mysqli_query($conexion,"INSERT INTO notas (Agente,Comun,nota,ENVIA) VALUES ($Agente,$Comun,'$Nota',$Envia)");
if($NOTA)
{

    $Emisor=mysqli_query($conexion,"SELECT DISTINCT u.id_usuario AS id, u.nombre as nombre , u.apellidos as apellidos , u.correo as correoo  FROM usuario u INNER JOIN notas n  on u.id_usuario=n.ENVIA where n.ENVIA=$Envia LIMIT 0,1");
    $Receptor=mysqli_query($conexion,"SELECT DISTINCT u.id_usuario AS id, u.nombre as nombre , u.apellidos as apellidos , u.correo as correo FROM usuario u INNER JOIN notas n on u.id_usuario=n.Agente where n.Agente=$Agente LIMIT 0,1");
    if ($Receptor && $Emisor) 
    {
          $Electronico=mysqli_fetch_array($Emisor);
            $NombreCompleto=$Electronico['nombre']." " . $Electronico['apellidos'];
            $CorreoEnvia=$Electronico['correo'];


            $Electronico2=mysqli_fetch_array($Receptor);
            $NombreCompleto2=$Electronico2['nombre']." " . $Electronico2['apellidos'];
            $CorreoEnvia2=$Electronico2['correo'];
     


            
     $consulta= mysqli_query($conexion, "SELECT correo, (aes_decrypt(contraseña,'AES')) AS  RECUPERAR FROM enviocorreo;");
     if ($consulta) {
         $c3=mysqli_fetch_assoc($consulta);
         $zc=$c3['correo'];
         $zcc=$c3['RECUPERAR'];

      }
             $mail = new PHPMailer(true);
        try {
            //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   =   "$zc";               //SMTP username
        $mail->Password   = "$zcc";                                //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
            $mail->setFrom("$CorreoEnvia",$NombreCompleto);
            $mail->addAddress("$CorreoEnvia2", $NombreCompleto2);     //Add a recipient
        
        
            //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet='UTF-8';
            $mail->Subject = 'Nuevo mensaje CON CORREO DE PRUEBA';
            $mail->Body    = '<p style="text-align:justify;">Estimado usuario : ' . $NombreCompleto2 . '.<br> 
            Tiene un nuevo mensaje de  : <b>' .$NombreCompleto. '</b>.<br><br><br>'. $Nota . 

      ' <br><br><br> <img src="https://mir-s3-cdn-cf.behance.net/projects/404/7a3bbf33243463.Y3JvcCw4NDYsNjYyLDE5Miww.jpg">'  .'
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
    
            $mail->send(); ?>
      <script>
                             
                           
                             
                          
                    
      </script>
      <?php
       echo $CorreoEnvia;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; ?>
            <script>
                             
                             alert("Correo no enviado");
                                        
                             window.history.go(-1);
                          
                            
                    
      </script>
        <?php
        }
    }
    
}
else
{
    ?>
    <script>
        alert("Mensaje no enviado");
         

    </script>
    <?php

}
?>