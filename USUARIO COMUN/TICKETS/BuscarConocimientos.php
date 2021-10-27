<?php
  include("../conexion.php");
 //Seguridad de sesiones paginacion

 $nombre='';
$id=0;
$si2=0;
$Busqueda=$_GET['Search'];
 
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
                                     $Pregunta = "SELECT * from pregunta where 
                                     ( id_pregunta LIKE '%$Busqueda%'
                                      or fecha_creacion LIKE '%$Busqueda%'
                                      or fecha_actualizacion LIKE '%$Busqueda%'
                                      or id_categ LIKE '%$Busqueda%'
                                      or pregunta Like '%$Busqueda%')";
                                     $p2 = mysqli_query($conexion,$Pregunta);
                             
                                     


                                     $Contador= "SELECT  count(*) as Cuenta from  pregunta where pregunta like '%$Busqueda%'";
                                     $Contador2=mysqli_query($conexion,$Contador);
                                     $data=mysqli_fetch_assoc($Contador2);

                                   
  

                                    ?>
                                <article>
                                <h1 style="color:cyan">Preguntas frecuentes</h1>
                                 <h3><strong>Resultados de la busqueda</strong></h3>  
                                   
                                  <?php
                                        echo "<p> " . $data['Cuenta']. " Preguntas coinciden con tu búsqueda. </p>";
                                        echo "<br> <hr>";

                                        if ($id!=0) {
                                            while ($p3=mysqli_fetch_array($p2)) {
                                                echo" <i class='fa fa-file-o' aria-hidden='true'></i><a href='Pregunta.php?cod=$n&search=".$p3['id_pregunta']."'> ".  $p3['pregunta'] . "</a><br><hr>";
                                            }
                                        }

                                        else {
                                                while ($p3=mysqli_fetch_array($p2)) {
                                                        echo" <i class='fa fa-file-o' aria-hidden='true'></i><a href='Pregunta.php?search=".$p3['id_pregunta']."'> ".  $p3['pregunta'] . "</a><br><hr>";
                                                    }
                                        }
                                                
                                  ?>

                        
                                            

                                </article>
                             </section>

                             <aside>
                                    

                               <?php
                                 if ($id!=0) {
                                     ?>
                                    <form method="GET" action="BuscarConocimientos.php">
                                        <input type="text" name="Search"  id="index" value="<?php echo $Busqueda?> "placeholder="Buscar en nuestra base de conocimientos">
                                        <?php echo " <input type='hidden' name='cod' value ='$n'>"; ?>
                                        <input type="submit" class="btn btn-success formularios" name="S" value="BUSCAR">
                                   </form>
                                    <br>
                                     <div style="border:2px solid #000; padding:1%; text-align:center; margin:3%; word-break: break-all; background:#E0EFFE;">
                                     <strong><b><h3>Temas de ayuda  </h3></b></strong>
                                        <h3>Categorias </h3>
                                     <?php
                                     
                                     $Categori="SELECT * FROM categoria";
                                     $Categori2= mysqli_query($conexion, $Categori);
                                     
                                     while ($CFC=mysqli_fetch_array($Categori2)) {
                                         echo "<a href='Categoria.php?cod=$n&cate=" . $CFC['id_categ'] . "'>".$CFC['tema']. "</a>";
                                     }
                                 }

                                 else
                                 {
                                        ?>
                                        <form method="GET" action="BuscarConocimientos.php">
                                            <input type="text" name="Search"  id="index" value="<?php echo $Busqueda?> "placeholder="Buscar en nuestra base de conocimientos">
                                          
                                            <input type="submit" class="btn btn-success formularios" name="S" value="BUSCAR">
                                       </form>
                                        <br>
                                         <div style="border:2px solid #000; padding:1%; text-align:center; margin:3%; word-break: break-all; background:#E0EFFE;">
                                         <strong><b><h3>Temas de ayuda  </h3></b></strong>
                                            <h3>Categorias </h3>
                                         <?php
                                         
                                         $Categori="SELECT * FROM categoria";
                                         $Categori2= mysqli_query($conexion, $Categori);
                                         
                                         while ($CFC=mysqli_fetch_array($Categori2)) {
                                             echo "<a href='Categoria.php?cate=" . $CFC['id_categ'] . "'>".$CFC['tema']. "</a>";
                                         }
                                 }
                                     ?>


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