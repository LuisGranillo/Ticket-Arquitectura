
<?php
$email=$_POST['email'];
$nomb=$_POST['nombre_usuario'];
$tel=$_POST['telefono'];
$ext=$_POST['ext'];
$id_tarea=$_POST['id_tarea'];
$id_cola=$_POST['id_cola'];
$codigo=$_POST['codigo'];
$notas=$_POST['notas'];
$colab=$_POST['colab'];
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

  

                  include("conexion2.php");

                  $query4 = $mysqli -> query ("SELECT *FROM usuario");
                  if ($query4) {
                      while ($valores4 = mysqli_fetch_array($query4)) {
                          $correo=$valores4['correo'];
                          $telefono=$valores4['Telefono_celular'];
                      }
                  }
                                  
                        
                             
if($id_creador==$integer){
  

  include("conexion4.php");


if($correo==$email||$telefono==$tel){

  echo "<script> 
  alert('Correo y telefono existentes'); 
  window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
    </script>"; 



}
else{
$query2="INSERT INTO usuario (id_estatus,id_rol,id_departamento,nombre,correo,telefono_celular,Ext,Notas_externas) VALUES (3,1,2505,'$nomb','$email','$tel','$ext','$notas')";

$resultado=$conexion->query($query2);
}
}
else{

  echo "<script> 
  alert('No puedes agregar un colaborador'); 
  window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
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
    $queryact="SELECT*FROM usuario WHERE id_usuario='$codigo'";
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
    
  
      if($correo==$email||$telefono==$tel||$integer!=$id_creador){
        echo "<script> 
        alert('No se pudo realizar la accion'); 
        window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$codigo&id_cola=$id_cola&usur=$codigo'; 
          </script>"; 
      }
    
else{


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
    $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 ) se ha creado e agregado nuevo colaborador en la tarea";//Asunto
    $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha creado e agregado un agente ,en la tarea :$id_tarea , con el titulo : $titulo2 por: $nombre_usuario , favor de verificar ,
    el nuevo colaborador : $nomb , la razón de crearlo es : $notas .Favor de estar atento en su vencimiento y verificar dentro de la plataforma gracias.</p></b>
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
  }

} catch (Exception $e) {

}

if($correo!=$email||$telefono!=$tel){

  echo "<script> 
  alert('Se agregado como colaborador a $nomb'); 
  
  window.location.href='/UTP/AGENTE/TAREAS/crear_agregar.php?idTarea=$id_tarea&codigo=$codigo&telefono=$email'; 
  </script>";


}




    
?>