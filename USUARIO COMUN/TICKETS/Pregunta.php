<?php
   include("../conexion.php");
 $nombre='';
$id=0;
$si2=0;
$question=$_GET['search'];
 
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
                             <?php
                                     $Pregunta = "SELECT * FROM pregunta where id_pregunta=$question";
                                     $p2 = mysqli_query($conexion,$Pregunta);
                                     $p3=mysqli_fetch_array($p2);
                                     $NC= $p3['id_categ'];

                                     $MYCATE= "SELECT * FROM categoria WHERE id_categ= $NC";
                                     $MYCATE2 = mysqli_query($conexion,$MYCATE);
                                     $CATE = mysqli_fetch_array($MYCATE2);

                                    ?>
                                <article>
                                <h1 style="color:red">Preguntas frecuentemente respondidas</h1>
                                <?php 
                                if ($id!=0) {
                                    ?>
                                <?php echo "<h1><a href='FAQ.php?cod=$n'>Todas las Categorías </a><a href='Categoria.php?cod=$n&cate=" . $CATE['id_categ'] . "'>" .$CATE['tema']. "</a> </h1>"; ?>
                               
                                   
                                        <h2> <?php echo $p3['pregunta']; ?></h2>
                                           <h3>
                                              <?php echo $p3['Respuesta']; ?>
                                            </h3>

                                            <?php
                                }
                                else {
                                        ?>
                                          <?php echo "<h1><a href='FAQ.php'>Todas las Categorías </a><a href='Categoria.php?cate=" . $CATE['id_categ'] . "'>" .$CATE['tema']. "</a> </h1>"; ?>
                               
                                   
                               <h2> <?php echo $p3['pregunta']; ?></h2>
                                  <h3>
                                     <?php echo $p3['Respuesta']; ?>
                                   </h3>
                                <?php
                                }
                                            
                                ?>

                                </article>
                             </section>

                             <aside>
                                     <input type="text"  class="form-control" name="Open" placeholder="Buscar en nuestra base de conocimientos">
                                     <br>
                                     <div style="border:2px solid #000; padding:1%; text-align:center; margin:3%; word-break: break-all; background:#E0EFFE;">
                                     <strong><b><h3>Temas de ayuda</h3></b></strong>
                                        <h3>Consulta general </h3>
                                     </div>
                                    <!--<div id="datos">
                                                <b>Detalles de ticket</b>
                                                <br>
                                                <p>Por favor describa su problema</p>
                                                <br>
                                                <b>Resumen de problemas</b>
                                                 <input type="text" size="59" maxlength="30"  name="resumen">        
                                            <br>
                                        <textarea name="comentarios" rows="10" cols="100" placeholder="Detalles sobre los motivos para abrir"></textarea>
                                      </div> -->
                             </aside>
                    </section>            
                     <footer>
                        Copyright © 2021 Universidad Tecnológica de Puebla - All rights reserved.
                        Helpdesk - desarrollado por osTicket
                     </footer>
            
        </body>

</html>