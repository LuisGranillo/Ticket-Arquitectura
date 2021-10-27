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
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>
                <script type="text/javascript" src="~/Scripts/bootstrap.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
                <link type="text/css" rel="stylesheet" href="~/Content/bootstrap.min.css"/>

        </head>
        <body>
                     <header>
                        <div class="">
                                <img class="imgheader" src="../IMAGES/LOGOUTP.png" alt="Logo" width="250px">
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
                             <section class="verticket">
                                <article>
                                    
                                <?php
                                if($id!=0)
                                {?>
                                    <h1>Ver Estado de Ticket            <?php echo "<a style='float:right;' href='Chats.php?cod=$n'><span class='glyphicon glyphicon-eye-open'></span> Mensajes</a>"?></h1>  
                                    <h3>Por favor proporcione su dirección de e-mail y el número de ticket. Un enlace de acceso le será enviado.</h3>
                                      

                                <?php }
                                 
                                 else 
                                 {?>
                                        <h3>Por favor proporcione su dirección de e-mail y el número de ticket. Un enlace de acceso le será enviado.</h3>
                                    <?php
                                 }
                                ?>
                                </article>
                                        <article >
                                            <form id="clientLogin" method="post" action="Ticket.php"> 
                                                <input type="hidden" name="leo" value="a">
                                                <div style="display: table-row;">
                                                    <div class="login-box">

                                                        <div>
                                                            <strong></strong>
                                                        </div>
                                                        <div>
                                                            <label style="color:black;"for="lemail">Correo   electrónico :
                                                            </label>
                                                            <input placeholder="por ejemplo john.doe@osticket.com" class="form-control" type="text" name="lemail" size="30"   >
                                                              </div>
                                                        <div>
                                                            <label style="color:black;"for="ticketno">Número de Ticket  : <input placeholder="por ejemplo 051243"class="form-control"id="ticketno" type="text" name="lticket" size="30" >
                                                            </label>  
                                                        </div>
                                                        <p>
                                                            <input class="btn btn-danger" type="submit" value="Solicitar enlace de acceso">
                                                        </p>
                                                    </div>


                                                
                                                        <div style="align-items: center; justify-items: center;" class="instructions">
                                                            <?php 
                                                            
                                                            if($id==0)
                                                            {?>
                                                                <p>¿Tiene una cuenta con nosotros?</p>
                                                           
                                                                <a href="/UTP/Login/inicio.php" class="a" style="font-size: 15px;">Inicia sesión</a>
                                                                <br>
                                                                <br>
                                                                <p>¿No tienes una cuenta?</p>
                                                              
                                                              
                                                            
                                                                <a href="/UTP/Login/Registro.php" class="a">Registrese para acceder a todos sus tickets</a>
                                                                <?php
                                                            }
                                                            else
                                                            {

                                                            }
                                                            ?>
                                                         
                                                        </div>

                                                
                                                        <br>
                                                        <br>
                                                        <br>
                                                </div>
                                            </form>      
                                        </article>
                                        
                             </section>
                             <?php
                              if ($id!=0) {
                                  ?>
                                                                  <p>Si es la primera vez que se pone en contacto con nosotros o perdio el número de Ticket, por favor <a href=<?php echo"../TICKETS/NewTicket.php?cod=$n"?> class="eta">abra un nuevo Ticket</a> </p> 
      
                                          <?php
                              }
                             else{
                                     ?>
                                      <p>Si es la primera vez que se pone en contacto con nosotros o perdio el número de Ticket, por favor <a href="../TICKETS/NewTicket.php" class="eta">abra un nuevo Ticket</a> </p> 
        
            <?php
                             }
                 
                 ?>
                                </section>
                     <footer>
                        Copyright © 2021 Universidad Tecnológica de Puebla - All rights reserved.
                        Helpdesk - desarrollado por osTicket
                     </footer>
        </body>
</html>