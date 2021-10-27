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
                                        $n2=$_GET['mensaje'];
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
                <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    

        </head>


        <body>
                     <header>
                        <div class="logotipo">
                                <img class="imgheader"src="../IMAGES/LOGOUTP.png" alt="Logo" width="250px">
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
                                <form method="post" action="/UTP/AGENTE/USUARIOS/EnvioMensaje.php">
                                        <?php  echo "<input type='hidden' name='Agente' value=$n2>";?>
                                        <?php  echo "<input type='hidden' name='Envia' value=$n>";?>
                                        <?php  echo "<input type='hidden' name='Comun' value=$n>";?>
                                <div>
                                               <?php $CHAT=mysqli_query($conexion,"SELECT usuario.nombre, notas.nota,notas.fecha_nota as fecha FROM usuario INNER JOIN notas ON usuario.id_usuario= notas.ENVIA WHERE (AGENTE=$n2 and Comun=$n) or( Comun= $n2  and Agente=$n)ORDER BY fecha_nota");
                                                       
                                                       
                                                        ?>
                                            
                                                
                                                    <?php
                                                
                                                      if ($CHAT) {


                                                        while($DES=mysqli_fetch_array($CHAT))
                                                        {
                                                        
                                                            echo "<div> 
                                                           <p>" .$DES['nombre']." </p> <p style='float:left; background:blue; color:white; border-radius:10%; padding:10px; border-buttom:2%;'>". $DES['nota']." </p> 
                                                            <p style='float:right;'>" . " " . $DES['fecha'] ."</p>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            </div>";
                                                            
                                                        }

                                                    }?>
                                                
                                           
                                        </div>
                                        <textarea name="Nota" class="formu form-control "></textarea>
                                     
                        
                                        <br><br>
                                    
                                    <input class="btn btn-primary" type="submit"  value="Enviar">
                                    <br>
                                    <br>
                                                <input class="btn btn-danger"  onclick="funcion_reiniciar('add');"type="button" value="Restablecer">
                                                 

                                    </form>

                                    
                                      </div> 


                                </article>
                           
                                 
                                 
                             </section>

                             <aside>
                                <select name="operacion" class="form-control">
                                    <option value="Consulta">Consulta general</option>
                                    <option value="Browse">Browse by topic</option>
                               </select>


                               <div>
                                   <p><strong>Otros recursos </strong></p>
                               </div>
                             </aside>
                     </section>


                     <footer>
                        Copyright © 2021 Universidad Tecnológica de Puebla - All rights reserved.

                        Helpdesk - desarrollado por osTicket
                     </footer>
            
        </body>

</html>