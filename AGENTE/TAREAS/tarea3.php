
<?php
  $Titulo =$_POST['titulos_creacion'];
  $desc =$_POST['comentarios'];
  $depart =$_POST['departamentos'];
  $creador_nombre =$_POST['creador_nombre2'];
  $apellidos_creador=$_POST['apellidos_creador2'];
 // $responsable=$creador_nombre.$apellidos_creador;  
  //$responsable=$creador_nombre.$apellidos_creador;  
  $usuario_logeado=$_POST['idusuario'];

  $integer = (int)$usuario_logeado;
$titulos_creacion=$_POST['titulos_creacion'];

$fecha=$_POST['fech'];
$hora=$_POST['hora'];

$procurador=$_POST['procurador'];
$id_proc = intval(preg_replace("/[^0-9]+/", "", $procurador), 10);
include("conexion2.php");
                                         
$query12 = $mysqli -> query ("SELECT *FROM usuario where id_usuario='$id_proc'");
if ($query12) {
    while ($valores12 = mysqli_fetch_array($query12)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.

        $usrw=''.$valores12['nombre'].'\n'.$valores12['apellidos'].'';
    }
}

$id_tarea=$_POST["id_tarea"];
$id_cola=$_POST["id_cola"];
$id_archivos=$_POST["id_archivo"];
$id_usuario=$_POST["id_usuario"];

include("conexion1.php");

$departarea="SELECT*FROM  tarea  WHERE idTarea='$id_tarea'";
$resultadodepart=$conexion->query($departarea);
while($rowdepart=$resultadodepart->fetch_assoc()){

$departamento=$rowdepart['Departamento'];
$id_pr=$rowdepart['procurador'];
$Titulo=$rowdepart['Titulo'];
$pr=$rowdepart['pr'];


  }
  $r = rand(0,10000);

  if($_FILES["uploadedFile"]!=null)
  { 
 $id_tarea=$_POST["id_tarea"];
   $nombre_archivo=$_FILES['uploadedFile'] ['name'];
   $tipo_archivo=$_FILES['uploadedFile']['type'];
   $tamaño_archivo=$_FILES['uploadedFile']['size'];
   $ruta_archivo=$_FILES['uploadedFile']['tmp_name'];
   $destino_archivo="subir_archivos/$nombre_archivo";

   if($nombre_archivo!=""){
    if(copy($ruta_archivo,$destino_archivo)){
      $Titulo=$_POST['Titulo'];
      $descripcion=$_POST['descripcion'];
      include("conexion1.php");
      $query="INSERT INTO archivo (Titulo,descripcion,tamaño ,nombre_archivo,tipo) VALUES ('$Titulo','$descripcion','$tamaño_archivo','$nombre_archivo','$tipo_archivo')";
      $resultado=$conexion->query($query);

    } 
    else{
       }
   }
  }else{
      

  }
  if($_FILES['uploadedFile'] ['name']!=null){  
    $nombre_archivo=$_FILES['uploadedFile'] ['name'];


   }
  if($nombre_archivo==null){
    $nombre_archivo="sin documentacion ,descripcion temp $r";
    $nada="INSERT INTO archivo (Titulo,descripcion,tamaño ,nombre_archivo,tipo) VALUES ('','','','$nombre_archivo','')";
    $sin_elemnts=$conexion->query($nada);    
  }

  include("conexion1.php");


     if($_FILES['imagen']!=null){ 
     $nombre_imagen=$_FILES['imagen'] ['name'];
     $tipo_imagen=$_FILES['imagen']['type'];
     $tamaño_imagen=$_FILES['imagen']['size'];
     $rutav=$_FILES['imagen']['tmp_name'];
     $destino_imagen="subir_archivos/$nombre_imagen";
   
     if($nombre_imagen!=""){
      if(copy($rutav,$destino_imagen)){
     
        include("conexion1.php");
        $query20="UPDATE archivo SET imagen='$nombre_imagen' WHERE nombre_archivo='$nombre_archivo'";
   $resultado20=$conexion->query($query20);

      } 
      else{
        echo "error";
      }
     }
    }else{
    
    }
    if($nombre_imagen==null){  
      $nombre_imagen="sin documentacion ,descripcion temp $r";
      $sin_imagen="UPDATE archivo SET imagen='$nombre_imagen' WHERE nombre_archivo='$nombre_archivo'";
      $nada_img=$conexion->query($sin_imagen);
    }
    

$query_img="SELECT*FROM archivo WHERE nombre_archivo='$nombre_archivo'";
$imagenes_cr=$conexion->query($query_img);
while($ciclos=$imagenes_cr->fetch_assoc()){

  $id_archivo=$ciclos['id_archivo'];

  }
             
  include("conexion1.php");


    $query2="INSERT INTO tarea (Titulo,Descripcion,hora,id_usuario,procurador,Vencimiento,id_archivo,Departamento,pr) VALUES ('$titulos_creacion','$desc','$hora','$integer','$usrw','$fecha','$id_archivo','$depart','$id_proc')";

$resultado2=$conexion->query($query2);
$query20="SELECT*FROM tarea  WHERE id_archivo='$id_archivo'";
$resultado20=$conexion->query($query20);
while($row12=$resultado20->fetch_assoc()){

  $id_tarea_hilo=$row12['idTarea'];

  }
  $hilos_creacion = (int)$id_tarea_hilo;

    include("conexion3.php");


    $query8 = $mysqli -> query ("INSERT INTO hilo (idTarea,descripcion,usuario,id_cola,tarea_anterior) VALUES ('$hilos_creacion','Tarea Creada Desde el Hilo de Entrada','$integer','$id_cola','$id_tarea')");


      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      
      require 'PHPMailer/Exception.php';
      require 'PHPMailer/PHPMailer.php';
      require 'PHPMailer/SMTP.php';
      $mail = new PHPMailer(true);
      
       
      try {
      
          include("conexion4.php");
          $queryact="SELECT*FROM usuario WHERE id_usuario='$usuario_logeado'";
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
          $mail->Subject = " Hola agente ( $nombre_usuario2 $apellido_usuario2 ) se ha creado una tarea dentro de la tarea donde estas asignado tarea";//Asunto
          $mail->Body    = "<p style='text-align: justify;'> Hola agente se ha creado una tarea dentro de la tarea:$id_tarea , el titulo de la tarea creada es : $Titulo , descripcion : $desc, departamento asignado: $depart  y el responsable de la tarea es: $usrw ,  de vencimiento es:$fecha  y hora de vencimiento es :$hora  por: $nombre_usuario .Favor de estar atento en su vencimiento y verificar dentro de la plataforma gracias.</p></b>
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
              alert('La tarea fue creada de manera exitosa'); 
              window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$id_tarea&codigo=$usuario_logeado&id_cola=$id_cola&usur=$usuario_logeado'; 
              </script>";
      
    
  
  /*


  

*/
?>
