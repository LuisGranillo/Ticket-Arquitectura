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
                                        <h4>Haga click en la categoria para buscar preguntas frecuentes </h4>
                                        <?php
                                          $Categorias= mysqli_query($conexion,"SELECT * FROM categoria where id_categ=2");
                                          $Categorias2 = mysqli_fetch_array($Categorias);
                                     echo " <a href=''> <h3><i class='fa fa-folder-open' aria-hidden='true'></i>" . $Categorias2['tema'] . "</h3> </a>  ";                                
                                   echo "
                                     
                                      <br>
                                   <p> " . $Categorias2['descripcion'] ."</p>
                                    <br>";

                                    $Pregunta="SELECT * FROM pregunta where id_categ= 2 LIMIT 0,5";
                                    $Pregunta2= mysqli_query($conexion,$Pregunta);
                                
                                    if ($id!=0) {
                                        while ($Pregunta3= mysqli_fetch_array($Pregunta2)) {
                                            echo" <i class='fa fa-file-o' aria-hidden='true'></i>
                                    <a href='Pregunta.php?cod=$n&search=".$Pregunta3['id_pregunta']."'>" .$Pregunta3['pregunta'] . "</a>
                                    <br>";

                                            # code...
                                        }
                                    }
                                    else{
                                        while ($Pregunta3= mysqli_fetch_array($Pregunta2)) {
                                            echo" <i class='fa fa-file-o' aria-hidden='true'></i>
                                        <a href='Pregunta.php?search=".$Pregunta3['id_pregunta']."'>" .$Pregunta3['pregunta'] . "</a>
                                        <br>";
                                        }
                                    }

                                    
                                 
                                   ?>
                                <hr>

                                </article>
                                <article>
                               <?php $Categorias= mysqli_query($conexion,"SELECT * FROM categoria where id_categ=3");
                                          $Categorias2 = mysqli_fetch_array($Categorias);
                                     echo " <a href=''> <h3><i class='fa fa-folder-open' aria-hidden='true'></i>" . $Categorias2['tema'] . "</h3> </a>  ";                                
                                   echo "
                                     
                                      <br>
                                   <p> " . $Categorias2['descripcion'] ."</p>
                                    <br>";

                                    $Pregunta="SELECT * FROM PREGUNTA where id_categ= 3 LIMIT 0,5";
                                    $Pregunta2= mysqli_query($conexion,$Pregunta);
                                
                                    if ($id!=0) {
                                        while ($Pregunta3= mysqli_fetch_array($Pregunta2)) {
                                            echo" <i class='fa fa-file-o' aria-hidden='true'></i>
                                    <a href='Pregunta.php?cod=$n&search=".$Pregunta3['id_pregunta']."'>" .$Pregunta3['pregunta'] . "</a>
                                    <br>";

                                            
                                        }
                                    }   
                                    else
                                    {
                                        while ($Pregunta3= mysqli_fetch_array($Pregunta2)) {
                                                echo" <i class='fa fa-file-o' aria-hidden='true'></i>
                                        <a href='Pregunta.php?search=".$Pregunta3['id_pregunta']."'>" .$Pregunta3['pregunta'] . "</a>
                                        <br>";
    
                                                
                                            }

                                    }
                                 
                                   ?>
                                <hr>

                                
 
   
 
                                         
 
                                 </article>
                                 <article>
                                     
                                 <?php $Categorias= mysqli_query($conexion,"SELECT * FROM categoria where id_categ=4");
                                          $Categorias2 = mysqli_fetch_array($Categorias);
                                     echo " <a href=''> <h3><i class='fa fa-folder-open' aria-hidden='true'></i>" . $Categorias2['tema'] . "</h3> </a>  ";                                
                                   echo "
                                     
                                      <br>
                                   <p> " . $Categorias2['descripcion'] ."</p>
                                    <br>";

                                    $Pregunta="SELECT * FROM pregunta where id_categ= 4 LIMIT 0,5";
                                    $Pregunta2= mysqli_query($conexion,$Pregunta);
                                
                                    if ($id!=0) {
                                        while ($Pregunta3= mysqli_fetch_array($Pregunta2)) {
                                            echo" <i class='fa fa-file-o' aria-hidden='true'></i>
                                    <a href='Pregunta.php?cod=$n&search=".$Pregunta3['id_pregunta']."'>" .$Pregunta3['pregunta'] . "</a>
                                    <br>";
                                        }
                                    }
                                    else
                                    {
                                        while ($Pregunta3= mysqli_fetch_array($Pregunta2)) {
                                                echo" <i class='fa fa-file-o' aria-hidden='true'></i>
                                        <a href='Pregunta.php?search=".$Pregunta3['id_pregunta']."'>" .$Pregunta3['pregunta'] . "</a>
                                        <br>";
                                            }

                                    }
                                 
                                   ?>
                                 <hr>
                                         

 

   
 
                                 </article>
                                 
                             </section>

                             <aside>
                               


                             </aside>
                     </section>


                     <footer>
                        Copyright © 2021 Universidad Tecnológica de Puebla - All rights reserved.

                        Helpdesk - desarrollado por osTicket
                     </footer>
            
        </body>

</html>