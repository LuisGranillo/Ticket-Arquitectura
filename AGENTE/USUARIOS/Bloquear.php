<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require '../USUARIOS/Exception.php';
   require '../USUARIOS/PHPMailer.php';
   require '../USUARIOS/SMTP.php';

   include("../conexion.php");

if(@$_POST['Bloquear'])
    {
        
        if(@$_POST['Usuarios']!=null)
        {
            foreach ($_POST['Usuarios'] as  $IdAlumno) {
                $Actualizar='UPDATE usuario SET id_estatus=2  WHERE id_usuario = ' . $IdAlumno;
                $Actualizar2=mysqli_query($conexion,$Actualizar);
            }

            echo "<script>alert('Usuario bloqueado');
            window.history.go(-1);
            
            </script>";
         }
         else  if(@$_POST['Usuarios']==null) {
             ?>
             <script>
              alert("No haz seleccionado ningún usuario");
              window.history.go(-1);
             </script>
             <?php
         }
    }

 if(@$_POST['Desbloquear'])
    {
       if(@$_POST['Usuarios']!=null)
       {
                foreach ($_POST['Usuarios'] as  $IdAlumno) {
                    $DActualizar='UPDATE usuario SET id_estatus=3 WHERE id_usuario = ' . $IdAlumno;
                    $DActualizar2=mysqli_query($conexion,$DActualizar);
                }

                echo "<script>alert('Usuario desbloqueado');
                window.history.go(-1);
                
                </script>";
        }
        else  if(@$_POST['Usuarios']==null) {
            ?>
            <script>
             alert("No haz seleccionado ningún usuario");
             window.history.go(-1);
            </script>
            <?php
        }
    }
     if(@$_POST['Eliminar'])
        {

            if(@$_POST['Usuarios']!=null)
            {
                foreach ($_POST['Usuarios'] as  $IdAlumno) {        

                    $llamar="CALL Borrar($IdAlumno)";
                     $procedimiento_almacenado= mysqli_query($conexion,$llamar);
                    
                }

                if($procedimiento_almacenado)
                {
                echo "<script>alert('Usuario eliminado');
                window.history.go(-1);
                
                </script>";
                }
                else if($procedimiento_almacenado==null)
                {
                    echo "<script>alert('Algo falló, revisa que el usuario no este agregado en un equipo, rol , categoria , departamento, etc ');
             
                    
                    </script>";
                }
            }

   
        

            else  if(@$_POST['Usuarios']==null) {
                ?>
                <script>
                 alert("No haz seleccionado ningún usuario");
                 window.history.go(-1);
                </script>
                <?php
            }
        }   
        if(@$_POST['Resetear'])
        {

               if(@$_POST['Usuarios']!=null)
           {
            
             foreach($_POST['Usuarios'] as $Resetea)
             {
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $cifrado=(substr(str_shuffle($permitted_chars), 0, 16));   
                 $update=mysqli_query($conexion,"UPDATE usuario SET contraseña=MD5('$cifrado') WHERE id_usuario=$Resetea");
                       
                     $DESTINO=mysqli_query($conexion,"SELECT * FROM usuario WHERE id_usuario=$Resetea");
                     if($DESTINO)
                    {
                        $DATOS=mysqli_fetch_array($DESTINO);
                        $Correo=$DATOS['correo'];
                        $Nombre=$DATOS['nombre'];
                        $Apellidos=$DATOS['apellidos'];
                         $n=$DATOS['id_usuario'];
                                                         
                            $Completo= $Nombre . " " . $Apellidos;
                            $mail = new PHPMailer(true);

                            
     $consulta= mysqli_query($conexion, "SELECT correo, (aes_decrypt(contraseña,'AES')) AS  RECUPERAR FROM enviocorreo;");
     if ($consulta) {
         $c3=mysqli_fetch_assoc($consulta);
         $zc=$c3['correo'];
         $zcc=$c3['RECUPERAR'];

      }
                            try {
                                //Server settings
                                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                                $mail->isSMTP();                                            //Send using SMTP
                                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                           $mail->Username   = "$zc";                     //SMTP username
                             $mail->Password   = "$zcc";                                //SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                            
                                //Recipients
                                $mail->setFrom("$zc", 'Subdirección de educación a distancia');
                                $mail->addAddress($Correo, $Completo);     //Add a recipient
                                 
                                
                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->CharSet='UTF-8';
                                $mail->Subject = 'Reseteo de contraseña';
                                $mail->Body    = '<p style="text-align:justify;">Estimado usuario : ' . $Completo . '.<br> Hemos reseteado su contraseña como lo solicitó. <br> Su nueva contraseña es : <b>' .$cifrado. '</b><br><br><br>'.
            
                              '  <img src="https://mir-s3-cdn-cf.behance.net/projects/404/7a3bbf33243463.Y3JvcCw4NDYsNjYyLDE5Miww.jpg">'  .'
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
                                                     window.history.go(-1);
                                                    
                                            
                              </script>
                              <?php
                            
                            }
                            catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

                                ?>
                                    <script>
                                                     
                                                     alert("Correo no enviado");
                                                     window.history.go(-2);
                                                    
                                            
                              </script>
                                <?php
                            }
                            
                                     
                 }
                 
                  else{
                     echo "<script>alert('Algo falló, revisa tu conexión y vuelve a intentarlo ');
                     window.history.go(-1);
                     
                     </script>";
                  }
            }
        
           }

           else  if(@$_POST['Usuarios']==null) {
            ?>
            <script>
             alert("No haz seleccionado ningún usuario");
             window.history.go(-1);
            </script>
            <?php
        }
     
        }
   ?>
