<?php

$codigo=$_POST['codigos'];

$respuesta=$_POST['respuesta'];
$id_tarea=$_POST['id_tarea'];

$id_archivo=$_POST['id_archivo'];

$integer = (int)$codigo;

include("conexion1.php");

$procurador="SELECT*FROM  tarea WHERE idTarea='$id_tarea'";
$resultadopr=$conexion->query($procurador);
while($rows=$resultadopr->fetch_assoc()){

$id_pr=$rows['procurador'];
$pr=$rows['pr'];
$id_creador=$rows['id_usuario'];

$titulo2=$rows['Titulo'];
}
if($integer==$id_creador){
    $query2="DELETE FROM aclaraciones where idTarea='$id_tarea'";
    $resultado2=$conexion->query($query2);

    $query="DELETE FROM tarea where idTarea='$id_tarea'";
    $resultado=$conexion->query($query);
    $querytar="DELETE FROM colaborador where id_tarea='$id_tarea'";
    $resultadotar=$conexion->query($querytar);
    $actualizaciones="DELETE FROM actualizaciones where idtarea='$id_tarea'";
    $resultado_actualizacion=$conexion->query($actualizaciones);
    $tareaanterior="DELETE FROM hilo where tarea_anterior='$id_tarea'";
    $tareaanterior=$conexion->query($tareaanterior);
    $query3="DELETE FROM archivo where id_archivo='$id_archivo'";
    $resultado3=$conexion->query($query3);
    $query4="DELETE FROM colas_de_tareas where idTarea='$id_tarea'";
    $resultado4=$conexion->query($query4);

    $aclaraciones="DELETE FROM aclaraciones where idTarea='$id_tarea'";
    $resultado_aclaracion=$conexion->query($aclaraciones);
    include("conexion1.php");

$nombre_archivo=$_POST["nombre_archivo"];
$imagen=$_POST["imagen"];
if($nombre_archivo!=null){
  $ruta="subir_archivos/$nombre_archivo";
  unlink($ruta);
}
if($nombre_archivo==null){
  $nombre_archivo="";
}
if($imagen!=null){
  $ruta2="subir_archivos/$imagen";
  unlink($ruta2);
}
    if($imagen==null){
      $imagen="";
    }
}
else{

    echo "<script> 
    alert('No puedes eliminar la tarea'); 
    window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
    </script>"; 
  }
    
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
        
        
    
    
      
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'correodepruebasutp@gmail.com';                     //SMTP username
        $mail->Password   = 'Gamino2001';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom("correodepruebasutp@gmail.com", 'Subdirección de Educación a Distancia');
        $mail->addAddress("$correo");     //Add a recipient
    
    
    
    
        //Content
        $mail->isHTML(true);       
        $mail->CharSet = 'UTF-8';                           //Set email format to HTML
        $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 ) se ha eliminado la tarea";//Asunto
        $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha eliminado la tarea :$id_tarea , con el titulo : $titulo2 por: $nombre_usuario 
      .Favor de estar atento en su vencimiento y verificar dentro de la plataforma gracias.</p></b>
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
            alert('La tarea se ha eliminado correctamente'); 
            window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
            </script>";
    
    

   
