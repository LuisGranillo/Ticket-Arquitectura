<?php
                                                                        
             $id=$_POST['id_cola'];
             $respuesta=$_POST['respuesta'];
             
             $id_tarea=$_POST['id_tarea'];
             $codigo=$_POST['codigo'];
             
           $integer = (int)$codigo;
       
        include("conexion1.php");


  $departarea="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
  $resultadodepart=$conexion->query($departarea);
  while($rowdepart=$resultadodepart->fetch_assoc()){
  
  $departamento=$rowdepart['Departamento'];
  $id_pr=$rowdepart['procurador'];
  $Titulo=$rowdepart['Titulo'];
  $pr=$rowdepart['pr'];
  $id=$rowdepart['id_cola'];
  $id_creador=$rowdepart['id_usuario'];

  
    }
if($id_creador==$integer){
  include("conexion1.php");

$query="UPDATE colas_de_tareas SET Respuesta='$respuesta',tipo_de_estado='Completado',estado='Completado' WHERE id_cola='$id'";

$resultado=$conexion->query($query);
}
else{

  echo "<script> 
  alert('No puedes cambiar el estdo de la tarea'); 
  window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
  </script>"; 
} 
        //Server settings
        include("conexion4.php");
      $queryact="SELECT*FROM usuario WHERE id_usuario='$integer'";
      $resultadoact=$conexion->query($queryact);
      while($rowact=$resultadoact->fetch_assoc()){
      
      $n=$rowact['nombre'];
      $ap=$rowact['apellidos'];
      
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


$consulta= mysqli_query($conexion, "SELECT correo, (aes_decrypt(contraseña,'AES')) AS  RECUPERAR FROM enviocorreo;");
if ($consulta) {
    $c3=mysqli_fetch_assoc($consulta);
    $zc=$c3['correo'];
    $zcc=$c3['RECUPERAR'];

 }
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
        $mail->Subject = " Hola agente  se ha cambiado el estado de tarea a: completado ";//Asunto
        $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha cambiado el estado de la tarea: $id_tarea ,a completaado
     y la razón por el cambio del estado es por lo siguiente: $respuesta , responsable: $n $ap .Favor de estar atento en su vencimiento y verificar dentro de la plataforma gracias.</p></b>
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
    
   
    
        echo "<script> 
        alert('Se cambio el estado de la tarea a completado'); 
        window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
        </script>"; 