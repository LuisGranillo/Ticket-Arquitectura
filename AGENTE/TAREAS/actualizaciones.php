
  
<?php

$id_usuario =$_GET['codigo'];
$id_tarea =$_GET['idTarea'];
$aclaracion =$_GET['aclaracion'];
$fecha =$_GET['fecha'];


$id=$_GET['id_cola'];

$codigo=$_GET['codigo'];

$integer = (int)$id_usuario;



include("conexion1.php");


  $procurador="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
$resultadopr=$conexion->query($procurador);
while($rows=$resultadopr->fetch_assoc()){

$id_pr=$rows['procurador'];
$pr=$rows['pr'];

$titulo=$rows['Titulo'];

  }
 



  $query3="UPDATE tarea SET Vencimiento='$fecha' where idTarea='$id_tarea'";

  $resultado3=$conexion->query($query3);



    $query1="UPDATE tarea SET Vencimiento='$fecha' where idTarea='$id_tarea'";

    $resultado1=$conexion->query($query1);
    $query6="INSERT INTO aclaraciones (id_usuario,Motivo,idTarea) VALUES ('$integer','$aclaracion','$id_tarea')";

    $resultado6=$conexion->query($query6);
 
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
    $mail->CharSet = 'UTF-8';                           //Set email format to HTML
    $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 )  se ha modificado la fecha de la tarea";//Asunto
    $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha cambiado la fecha de la tarea :$id_tarea , con el titulo : $titulo por: $nombre_usuario , favor de verificar.
    La fecha de vencimiento nueva es : $fecha  y la razón por la que se cambio la fecha es por lo siguiente: $aclaracion .Verificar dentro de la plataforma gracias.</p></b>
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
        alert('La fecha se ha actualizado correctamente , ahora la fecha es $fecha'); 
        window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$integer&id_cola=$id&usur=$integer'; 
        </script>";


