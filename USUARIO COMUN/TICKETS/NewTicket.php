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
                <link rel="stylesheet" href="estilos.css">
                <script Languaje="javascript" src="../JS/funciones.js"></script>
  
                <link rel="stylesheet" href="../CSS/estilos.css">
        </head>


        <body>
                     <header>
                        <div class="logotipo">
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
                             <section class="articles">

                                <article>
                                        <h1>Abrir nuevo ticket</h1>
                                        <h3>Favor de completar el siguiente formulario para abrir un nuevo ticket</h3>
                                        <hr>
                                </article>
                                <article>

                                        <h1> Información de contacto</h1>
                                           <form  class="formgreen"method="POST" action="Ticket.php">
                                              <label for="correo" >DIRECCIÓN DE CORREO ELECTRONICO</label>
                                              <input type="email" name="correo"  placeholder="example@gmail.com">

                                              <br>
                                              <label for="nombre">NOMBRE COMPLETO</label> 
                                              <input type="text" name="nombre"  REQUIRED>
                                              <br>
                                              <label for="telefono">TELEFONO</label>
                                              <input type="tel" name="telefono" REQUIRED placeholder="2298625278" maxlength="10" minlength="8"> 
                                              <label for="ext">EXTENSION</label>
                                              <input type="tel" name="ext" maxlength="3">
                                                <br>
                                                <hr>                  
                                            <select name="temas" class="form-control">
                                                <option onclick="Limpiar();"value="">-- Seleccione un tema de ayuda --</option>
                                                <option onclick="MostrarDatos();"value="academias">Academias </option>
                                                <option onclick="MostrarDatos();"value="consulta">Consulta general</option>
                                                <option onclick="MostrarDatos();"value="desarrollo">Desarrollo de asignaturas </option>
                                                <option onclick="MostrarDatos();"value="proyecto">Proyecto de educación Dual y a D </option>
                                                <option onclick="MostrarDatos();"value="servicios">Servicios estudiantiles </option>
                                                <option onclick="MostrarDatos();"value="sicea">sistema SICEA / SIGA </option>
                                                <option onclick="MostrarDatos();"value="tutorias">Tutorías </option>
                                          

                                            </select>
                                                 <div id="datos">
                                                        <div class="contenedor" id="uno">
                                                                <p class="texto">Fuente</p>
                                                                    <img src="../IMAGES/25645.png" onclick="MostrarDatos();" width="20" height="20">
                                                                <select id="opciones" class="seleccione">
                                                                <option onclick="Limpiar();"value="">-- Seleccione --</option>
                                                                        <option onclick="Arial();"id="Arial">Arial </option>                                                                                                                        <option onclick="Helvetica();"id="Helvetica">Helvetica</option>
                                                                                        <option onclick="Georgia();">Georgia </option>
                                                                                        <option onclick="Times_New_Roman();">Times New Roman</option>
                                                                                         <option onclick="monospace();"value="servicios">Monospace </option>
                                                                                          <option onclick="Remove_Font_Family();"value="sicea">Remove Font Family</option>
                                                                                    </select>                                                              
                                                        </div>
                                                            <div class="contenedor" id="dos">
                                                                <p class="texto"  onclick="Quitarnegritas();">Negritas</p>
                                                             
                                                               <img  onclick="Negritas();" src="../IMAGES/negritas.png" width="20" height="20">
                                                        
                                                            </div>
                                                            <div class="contenedor" id="tres">
                                                                <p class="texto"  onclick="Arial();">Italic</p>
                                        
                                                                <img onclick="PonerItalic();" src="../IMAGES/italic.png" width="20" height="20">
                                                        
                                                            </div>
                                                            <div class="contenedor" id="cuatro">
                                                                <p class="texto"  onclick="Quitarnegritas();">underline</p>
                                                                <img onclick="underline();" src="../IMAGES/underline.png"  width="20" height="20">
                                                        
                                                            </div>
                                                            <div class="contenedor"id="cinco">
                                                                <p class="texto"  onclick="Quitarnegritas();" >strikethrough</p>
                                                               
                                                           <img onclick="linea();" src="../IMAGES/linea.jpg" width="20" height="20">
                                                        
                                                            </div>
                                                          
                                                            <br>
                                                           <br>
                                                                <textarea id="escritor"name="comentarios" rows="10" cols="65" placeholder="Detalles sobre los motivos para abrir"></textarea>
                                                          
                                                                <input id="uploadImage1" class="boxFile" type="file" rows="10" cols="79" onchange="previewImage(1);" />    
                                        
                                                                <label for="file-upload" >
                                                                                <img id="uploadPreview1" width="150" height="100" src="images/image_not_available.jpg" />
                                                        
                                                                </label>
                                                        
                                                    </div>
                                                    
                                            <hr>


                                            <input type="submit" class="btn btn-danger rojos" name="Open" value="Crear ticket">
                                                 <input type="button"  class="btn btn-danger rojos" name="Open" value="Restablecer">
                                                <input type="button" class="btn btn-danger rojos" name="Open" value="Cancelar">

                                                <!---->
                                                
                                                             
                           
                                           </form>



                                </article>
                             </section>
                             
                                  
                                 
                         
                 </section>
                             
                     </section>


                     <script type="text/javascript">
                        function MostrarDatos(){ 
                        
                        document.getElementById("datos").style.display="block";
                        }
                        function Limpiar(){ 
                        
                        document.getElementById("datos").style.display="none";
                        }
                                    </script>
                

                     <footer>
                        Copyright © 2021 Universidad Tecnológica de Puebla - All rights reserved.

                        Helpdesk - desarrollado por osTicket
                     </footer>
            
        </body>

</html>