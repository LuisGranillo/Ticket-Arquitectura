<?php
include("../conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../USUARIOS/Exception.php';
require '../USUARIOS/PHPMailer.php';
require '../USUARIOS/SMTP.php';


$correonota=$_POST['correo'];
$Equipo=$_POST['equipo'];
$Usuario=$_POST['usuario'];





 
$Emisor=mysqli_query($conexion,"SELECT * FROM usuario WHERE id_usuario=$Usuario");

$DatosUsuario=mysqli_fetch_assoc($Emisor);

$Receptor= mysqli_query($conexion,"SELECT DISTINCT usuario.nombre, usuario.apellidos, usuario.correo from usuario inner JOIN trabaja ON usuario.id_usuario=trabaja.id_usuario where trabaja.idEquipo=$Equipo");
if($Emisor && $Receptor)
{
   $Ecompleto=$DatosUsuario['nombre'] . " " . $DatosUsuario['apellidos'];
   $Ecorreo= $DatosUsuario['correo'];


    while ($Rec=mysqli_fetch_array($Receptor)) {
        $Dcompleto=$Rec['nombre'] . " " .$Rec['apellidos']. "";
        $Dcorreo=$Rec['correo'];
          

     


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
    $mail->Username   =  "$zc";               //SMTP username
    $mail->Password   =     "$zcc";                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
            $mail->setFrom("$Ecorreo", "$Ecompleto");
            $mail->addAddress("$Dcorreo", "$Dcompleto");     //Add a recipient
            
    
            //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet='UTF-8';
            $mail->Subject = 'Nuevo mensaje';
            $mail->Body    = '<p style="text-align:justify;">Estimado usuario : ' . $Dcompleto . '.<br> 
        Tiene un nuevo mensaje de  : <b>' .$Ecompleto. '</b>.<br><br><br>'. $correonota .
    
    ' <br><br><br> <img src="https://mir-s3-cdn-cf.behance.net/projects/404/7a3bbf33243463.Y3JvcCw4NDYsNjYyLDE5Miww.jpg">'  .'
                                  <br>
    <br>
    <br>
    <p style="text-align:justify;">
    Atentamente Centro de Soporte, Subdirección de Educación a Distancia 
    <br>
    <hr>
    Esperamos haber atendido satisfactoriamente a su duda. De lo contrario, responda al ticket que tiene abierto.Ingrese a su cuenta o envia un correo a ' . $Ecorreo .'
    </p>' ;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send(); ?>
    <script>
         
                      
         window.history.go(-1);      
                         
                      
                
    </script>
    <?php
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
    ?>


