<?php
 
 include("../conexion.php");
 //Seguridad de sesiones paginacion

 $nombre='';
$id=0;
$si2=0;
 
                                   if(@$_POST['correo']!=null | @$_GET['cod']!=null)
                                     {
                                        session_start();
                                        $varsesion=$_SESSION['correo'];
                                        $n=$_GET['cod'];
                                        $si= "SELECT * FROM usuario where correo ='$varsesion' and id_usuario = $n";
                                        $si2=mysqli_query($conexion,$si);
         

                                        if($si2)
                                        {
                                        $fin=mysqli_fetch_array($si2);
        
                                        $id=$fin['id_usuario'];
                                        $nombre=$fin['nombre'];
                                        $correito= $fin['correo'];
                                        }


                                        if($n!= $id || $varsesion!=$correito)
                                        {
                                                header("Location:/UTP/AGENTE/cerrar_sesion.php");
                                        }
                                     }
                                       
                                        else {
                                                if( $id==null )
                                                {   
                                                        $id=0;
                                                        $n=0;

                                                }
                                                else{
                                                        ob_start();   
                                                        }
           
                                        }
                               
?>
<!DOCTYPE html>
        <head>   
                <meta charset="UTF-8">
                <title>SubDirección de Educación a distancia</title>
                <link rel="stylesheet" type="text/css" href="../CSS/Style.css">
                <script type="text/javascript" src="~/Scripts/bootstrap.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
                <link type="text/css" rel="stylesheet" href="~/Content/bootstrap.min.css"/>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        </head>
        <body>      
                     <header>
                        <div class="logotipo">
                                <img  class="imgheader"src="../IMAGES/LOGOUTP.png" alt="Logo" width="250px">
                                <div style="float: right; font-size: 50px;">
                                        <?php 
                                        if($nombre==null || $nombre=='')
                                        {
                                               
                                                echo"<p>Usuario Invitado | <a href='/UTP/Login'>Inicia sesión</a></p>";
                                                
                                
                                        }
                                        else
                                        {
                                                echo"<p>" .  $nombre . " | <a href='/UTP/AGENTE/cerrar_sesion.php'>Cerrar sesión</a></p>";
                                
                                        }
                                        ?>
                                        
                                       
                                     </div>
                             </div>
                        
                        <nav>
                                <ul class="menu">
                                        

                                        <?php 
                                        if($id!=0)
                                        {
                                              echo "  <li>";
                                                ?>
                                        <?php echo " <a href='Index.php?cod=$n'><span class='glyphicon glyphicon-home'></span> Inicio</a>";?>
                                        </li>
                                        <li>
                                              <?php echo " <a href='FAQ.php?cod=$n'><span class='glyphicon glyphicon-question-sign'></span>  Lista FAQ</a>";?>
                                        </li>
                                        <li>
                                                <?php 
                                                echo " <a href='NewTicket.php?cod=$n'> <span class='glyphicon glyphicon-envelope'></span> Abrir nuevo Ticket</a>";?>                                        </li>
                                        </li>
                                       <li>
                                                <?php echo "<a href='ViewTicket.php?cod=$n'><span class='glyphicon glyphicon-eye-open'></span> Ver estado del ticket</a>"?>
                                        </li>
                                        <?php
                                        }

                                        else {
                                                echo "  <li>";
                                                ?>
                                        <?php echo " <a href='Index.php'><span class='glyphicon glyphicon-home'></span> Inicio</a>";?>
                                        </li>
                                        <li>
                                              <?php echo " <a href='FAQ.php'><span class='glyphicon glyphicon-question-sign'></span>  Lista FAQ</a>";?>
                                        </li>
                                        <li>
                                                <?php 
                                                echo " <a href='NewTicket.php'> <span class='glyphicon glyphicon-envelope'></span> Abrir nuevo Ticket</a>";?>                                        </li>
                                        </li>
                                       <li>
                                                <?php echo "<a href='ViewTicket.php'><span class='glyphicon glyphicon-eye-open'></span> Ver estado del ticket</a>"?>
                                        </li><?php
                                        }
                                        ?>
                                </ul>
                         </nav>
                     </header>
                     <section class="main">
                             <section class="articles">

                                <article>
                                        
                                <?php 
                                if ($id!=0) {
                                    ?>
                                        <form method="GET" action="BuscarConocimientos.php">

                                        <input type="text" name="Search"  id="index" placeholder="Buscar en nuestra base de conocimientos">
                                        <?php echo " <input type='hidden' name='cod' value ='$n'>"; ?>
                                        <input type="submit" class="btn btn-success formularios" name="S" value="BUSCAR">
                                      

                                        </form>
                                        <?php
                                }

                                else {
                                        ?>
                                         <form method="GET" action="BuscarConocimientos.php">

                                <input type="text" name="Search"  id="index" placeholder="Buscar en nuestra base de conocimientos">
 
                                <input type="submit" class="btn btn-success formularios" name="S" value="BUSCAR">


</form>
                                        <?php

                                }
                                        ?>
                                       
                                </article>
                                <article>
                                <button class="btn btn-info mensajeConstruccion" data-toggle="modal" data-target="#miventana">
				Aviso de privacidad
			</button>
                                        <h2> ¡BIENVENIDO AL CENTRO DE SOPORTE !</h2>
                                           <p>El objetivo del sistema de Centro de Soporte es llevar un registro detallado de las problemáticas y solicitudes de los usuarios de la Subdirección de Educación a Distancia, como parte del soporte técnico que brindan cada una de las áreas que la integran, para ofrecer una respuesta y/o solución de ellos a la brevedad posible o en su defecto gestionar su solución con la persona responsable del tema en cuestión.

                                           </p>
                             
			<center>

			<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" data-hidden="true">
								&times;
							</button>
							<h4>Aviso de privacidad integral</h4>
						</div>
						<div class="modal-body"  style='text-align:left align=center'  >
						
Universidad Tecnológica de Puebla, con domicilio en Antiguo Camino a La
Resurrección 1002 - A, Zona Industrial, 72300 Puebla, Pue. y portal de internet
http://evirtual.utpuebla.edu.mx/tickets/, es el responsable del uso y protección de sus
datos personales, y al respecto le informamos lo siguiente:
<h4>¿Para qué fines utilizaremos sus datos personales?</h4> 
Los datos personales que recabamos de usted, los utilizaremos para las siguientes
finalidades que son necesarias para el servicio que solicita:
Respuesta a mensajes del formulario de contacto, Prestación de cualquier servicio
solicitado
Solicitar correo electrónico para la verificación de su ticket reportado., Medio de
comunicación sobre situaciones relacionadas al sistema al usuario.
<h4>¿Qué datos personales utilizaremos para estos fines?</h4>
Para llevar a cabo las finalidades descritas en el presente aviso de privacidad,
utilizaremos los siguientes datos personales:
Datos de identificación y contacto

<h4>¿Cómo puede acceder, rectificar o cancelar sus datos
personales, u oponerse a su uso o ejercer la revocación de
consentimiento?</h4>
Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los
utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su
derecho solicitar la corrección de su información personal en caso de que esté
desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de
nuestros registros o bases de datos cuando considere que la misma no está siendo
utilizada adecuadamente (Cancelación); así como oponerse al uso de sus datos
personales para fines específicos (Oposición). Estos derechos se conocen como
derechos ARCO.
Para el ejercicio de cualquiera de los derechos ARCO, debe enviar una petición vía
correo electrónico a evirtual@utpuebla.edu.mx y deberá contener:
<li>Nombre completo del titular.</li> 
<li>Domicilio.</li> 
<li>Teléfono.</li> 
<li> Correo electrónico usado en este sitio web.</li>
<li>Asunto «Derechos ARCO»</li>
Descripción el objeto del escrito, los cuales pueden ser de manera enunciativa más
no limitativa los siguientes: Revocación del consentimiento para tratar sus datos
personales; y/o Notificación del uso indebido del tratamiento de sus datos personales;
y/o Ejercitar sus Derechos ARCO, con una descripción clara y precisa de los datos a
Acceder, Rectificar, Cancelar o bien, Oponerse. En caso de Rectificación de datos
personales, deberá indicar la modificación exacta y anexar la documentación soporte;
es importante en caso de revocación del consentimiento, que tenga en cuenta que no
en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata,
ya que es posible que por alguna obligación legal requiramos seguir tratando sus
datos personales. Asimismo, usted deberá considerar que para ciertos fines, la
revocación de su consentimiento implicará que no le podamos seguir prestando el
servicio que nos solicitó, o la conclusión de su relación con nosotros.
<h4>¿En cuántos días le daremos respuesta a su solicitud?</h4>
5 días
<h4>d) ¿Por qué medio le comunicaremos la respuesta a su solicitud?</h4>

Al mismo correo electrónico que se proporciona a generar un reporte o si está dentro
del sistema, mediante su correo electrónico de registro.
El uso de tecnologías de rastreo en nuestro portal de
internet
Le informamos que en nuestra página de internet utilizamos cookies, web beacons u
otras tecnologías, a través de las cuales es posible monitorear su comportamiento
como usuario de internet, así como brindarle un mejor servicio y experiencia al
navegar en nuestra página. Los datos personales que obtenemos de estas
tecnologías de rastreo son los siguientes:
Identificadores, nombre de usuario y contraseñas de sesión, Búsquedas realizadas
por un usuario
Estas cookies, web beacons y otras tecnologías pueden ser deshabilitadas. Para
conocer cómo hacerlo, consulte el menú de ayuda de su navegador. Tenga en cuenta
que, en caso de desactivar las cookies, es posible que no pueda acceder a ciertas
funciones personalizadas en nuestro sitio web.
<h4>¿Cómo puede conocer los cambios en este aviso de
privacidad?</h4>

El presente aviso de privacidad puede sufrir modificaciones, cambios o
actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias
necesidades por los productos o servicios que ofrecemos; de nuestras prácticas de
privacidad; de cambios en nuestro modelo de negocio, o por otras causas. Nos
comprometemos a mantener actualizado este aviso de privacidad sobre los cambios
que pueda sufrir y siempre podrá consultar las actualizaciones que existan en el sitio
web <a href="http://evirtual.utpuebla.edu.mx/tickets/"> http://evirtual.utpuebla.edu.mx/tickets/</a>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">
								cerrar
							</button>
						</div>				
					</div>
				</div>
			</div>
                                </article>
                             </section>

                             <aside>

                             <?php if($id!=0)
                                {?>
                                   <?php  echo "<form action='NewTicket.php'>";?>
                                     <input type="submit"  class="btn btn-info  inputa" name="Open" value="Abrir nuevo ticket">
                                     <?php echo "<input type='hidden' name='cod' value=$n > ";?>
                                     <br>
                                     </form>
                                     <?php echo " <form action='ViewTicket.php'>";?>
                                      <input type="submit" class="btn btn-success inputa" name="View" value="Ver el estado del ticket">
                                      <?php echo "<input type='hidden' name='cod' value=$n > ";?>
                                      
                                      <br>
                                      </form>
                                     <br>
                                     <?php
                                     }
                                     else
                                     {?>
                                        <?php  echo "<form action='NewTicket.php'>";?>
                                        <input type="submit"  class="btn btn-info  inputa" name="Open" value="Abrir nuevo ticket">
                                         <br>
                                        </form>
                                        <?php echo " <form action='ViewTicket.php'>";?>
                                         <input type="submit" class="btn btn-success inputa" name="View" value="Ver el estado del ticket">
                                          
                                         <br>
                                         </form>
                                        <br>
                                             
                                        <?php
                                     }
                                     
                                     ?>



                                    <div id="datos">
                                                <b>Detalles de ticket</b>
                                                <br>
                                                <p>Por favor describa su problema</p>
                                                <br>
                                                <b>Resumen de problemas</b>
                                                 <input type="text" size="59" maxlength="30"  name="resumen">        
                                            <br>
                                        <textarea name="comentarios" rows="10" cols="100" placeholder="Detalles sobre los motivos para abrir"></textarea>
                                      </div>
                                 <br>
                                         
                                 
                                     <div style="border:2px solid #000; padding:1%; text-align:center; margin:3%; word-break: break-all; background:#E0EFFE;">
                                             <h3>Preguntas destacadas </h3>
                                             <?php
                                             
                                              $Pregunta = "SELECT * FROM pregunta";
                                              $p2 = mysqli_query($conexion,$Pregunta);
                                              if($id!=0)
                                              {
                                                while($p3=mysqli_fetch_array($p2))
                                                {
                                                 
                                                  echo "<a href='Pregunta.php?cod=$n&search=".$p3['id_pregunta']."'>" .$p3['pregunta']."</a>";
                                                }
                                                        

                                              }
                                              else
                                               {
                                                while($p3=mysqli_fetch_array($p2))
                                                {
                                                 
                                                  echo "<a href='Pregunta.php?search=".$p3['id_pregunta']."'>" .$p3['pregunta']."</a>";
                                                }
                                                                
                                                }                                            
                                             
                                             ?>
                                     </div>
                             </aside>
                    </section>
                                                       

                     <footer>
                        Copyright © 2021 Universidad Tecnológica de Puebla - All rights reserved.

                        Helpdesk - desarrollado por osTicket
                     </footer>
            
        </body>

</html>
