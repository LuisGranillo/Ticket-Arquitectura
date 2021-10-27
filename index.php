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
                <link rel="stylesheet" type="text/css" href="USUARIO COMUN/CSS/Style.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>
                <script type="text/javascript" src="~/Scripts/bootstrap.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
                <link type="text/css" rel="stylesheet" href="~/Content/bootstrap.min.css"/>
        </head>
        <body>      
                     <header>
                        <div class="logotipo">
                                <img  class="imgheader"src="USUARIO COMUN/IMAGES/LOGOUTP.png" alt="Logo" width="250px">
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
                                        <li>
                                        <?php echo " <a href='USUARIO COMUN/TICKETS/index.php?cod=$n'><span class='glyphicon glyphicon-home'></span> Inicio</a>";?>
                                        </li>
                                        <li>
                                              <?php echo " <a href='USUARIO COMUN/TICKETS/FAQ.php?cod=$n'><span class='glyphicon glyphicon-question-sign'></span>  Lista FAQ</a>";?>
                                        </li>
                                        <li>
                                                <?php 
                                                echo " <a href='USUARIO COMUN/TICKETS/NewTicket.php?cod=$n'> <span class='glyphicon glyphicon-envelope'></span> Abrir nuevo Ticket</a>";?>                                        </li>
                                        </li>
                                       <li>
                                                <?php echo "<a href='USUARIO COMUN/TICKETS/ViewTicket.php?cod=$n'><span class='glyphicon glyphicon-eye-open'></span> Ver estado del ticket</a>"?>
                                        </li>
                                        <?php
                                        }

                                        else {
                                                echo "  <li>";
                                                ?>
                                        <?php echo " <a href=USUARIO COMUN/TICKETS/index.php'><span class='glyphicon glyphicon-home'></span> Inicio</a>";?>
                                        </li>
                                        <li>
                                              <?php echo " <a href='USUARIO COMUN/TICKETS/FAQ.php'><span class='glyphicon glyphicon-question-sign'></span>  Lista FAQ</a>";?>
                                        </li>
                                        <li>
                                                <?php 
                                                echo " <a href='USUARIO COMUN/TICKETS/NewTicket.php'> <span class='glyphicon glyphicon-envelope'></span> Abrir nuevo Ticket</a>";?>                                        </li>
                                        </li>
                                       <li>
                                                <?php echo "<a href='USUARIO COMUN/TICKETS/ViewTicket.php'><span class='glyphicon glyphicon-eye-open'></span> Ver estado del ticket</a>"?>
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
                                        <form method="GET" action="USUARIO COMUN/TICKETS/BuscarConocimientos.php">

                                        <input type="text" name="Search"  id="index" placeholder="Buscar en nuestra base de conocimientos">
                                        <?php echo " <input type='hidden' name='cod' value ='$n'>"; ?>
                                        <input type="submit" class="btn btn-success formularios" name="S" value="BUSCAR">
                                      

                                        </form>
                                        <?php
                                }

                                else {
                                        ?>
                                         <form method="GET" action="USUARIO COMUN/TICKETS/BuscarConocimientos.php">

                                <input type="text" name="Search"  id="index" placeholder="Buscar en nuestra base de conocimientos">
 
                                <input type="submit" class="btn btn-success formularios" name="S" value="BUSCAR">


</form>
                                        <?php

                                }
                                        ?>
                                       
                                </article>
                                <article>

                                        <h2> ¡BIENVENIDO AL CENTRO DE SOPORTE !</h2>
                                           <p>El objetivo del sistema de Centro de Soporte es llevar un registro detallado de las problemáticas y solicitudes de los usuarios de la Subdirección de Educación a Distancia, como parte del soporte técnico que brindan cada una de las áreas que la integran, para ofrecer una respuesta y/o solución de ellos a la brevedad posible o en su defecto gestionar su solución con la persona responsable del tema en cuestión.

                                           </p>

                                </article>
                             </section>

                             <aside>

                             <?php if($id!=0)
                                {?>
                                   <?php  echo "<form action='USUARIO COMUN/TICKETS/NewTicket.php'>";?>
                                     <input type="submit"  class="btn btn-info  inputa" name="Open" value="Abrir nuevo ticket">
                                     <?php echo "<input type='hidden' name='cod' value=$n > ";?>
                                     <br>
                                     </form>
                                     <?php echo " <form action='USUARIO COMUN/TICKETS/ViewTicket.php'>";?>
                                      <input type="submit" class="btn btn-success inputa" name="View" value="Ver el estado del ticket">
                                      <?php echo "<input type='hidden' name='cod' value=$n > ";?>
                                      
                                      <br>
                                      </form>
                                     <br>
                                     <?php
                                     }
                                     else
                                     {?>
                                        <?php  echo "<form action='USUARIO COMUN/TICKETS/NewTicket.php'>";?>
                                        <input type="submit"  class="btn btn-info  inputa" name="Open" value="Abrir nuevo ticket">
                                         <br>
                                        </form>
                                        <?php echo " <form action='USUARIO COMUN/TICKETS/ViewTicket.php'>";?>
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
                                                 
                                                  echo "<a href='USUARIO COMUN/TICKETS/Pregunta.php?cod=$n&search=".$p3['id_pregunta']."'>" .$p3['pregunta']."</a>";
                                                }
                                                        

                                              }
                                              else
                                               {
                                                while($p3=mysqli_fetch_array($p2))
                                                {
                                                 
                                                  echo "<a href='USUARIO COMUN/TICKETS/Pregunta.php?search=".$p3['id_pregunta']."'>" .$p3['pregunta']."</a>";
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