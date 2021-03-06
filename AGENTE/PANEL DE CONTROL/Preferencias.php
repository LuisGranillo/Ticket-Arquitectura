<?php
 include("../conexion.php");
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Control de administración</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="../CSSAGENTE/Users2.css">
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   
  

    
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">UTP</a>
                <img src="../assets/img/oficial-logo.png" class="img-thumbnail" width="75px" />
            </div>
            
            <div class="header-right">
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
                <?php echo "<a href='/UTP/ADMINISTRADORES/CRUD/TAREAS/mensajeria.php?cod=$n' >" ?> Panel administrador</a> | <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$n'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";?>
         
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                        <center> 
                     <div class="user-img-div">
                            <?php
                               
                            $n=$_GET['cod'];
                            $query="SELECT*FROM usuario WHERE id_usuario=$n";
                            $resultado=$conexion->query($query);
                            while($row=$resultado->fetch_assoc()){
                          ?>
                          
                              <td><img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"/></td>
                                        
                         
                         </tr>
                         <?php
                         
                             
                               echo "<br>";
                              echo "<p style='color:white;'> Bienvenido " .   ($row['nombre']);
                              echo "<br>";
                              echo ($row['apellidos'] . "</p>");
                              }
                              ?> </div>
                              </center>

                
                        

                    </li>


                 
                   
                    <li>
                        <a href="panel_control.html"><i class="fa fa-cogs" aria-hidden="true"></i>Panel de control </a>

                        <ul class="nav nav-second-level">
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/panel_control.php?cod=$n'>"?><i class="fa fa-cogs" aria-hidden="true"></i>Panel de control </a>
                            </li>
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/directorio-agente.php?cod=$n'>"?><i class="fa fa-address-book-o" aria-hidden="true"></i>Directorio del agente </a>
                            </li>
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/cuenta.php?cod=$n'>"?><i class="fa fa-user-circle" aria-hidden="true"></i>Mi perfil </a>
                            </li>
                                                 
                            
                           
                        </ul>
                    </li>
                    <li>
                        <a href="../USUARIOS/Usuario-directorio.html"><i class="fa fa-user-o" aria-hidden="true"></i>Usuarios </a>
                        <ul class="nav nav-second-level">
                            <li>
                            <?php echo "<a href='../USUARIOS/Usuario-directorio.php?cod=$n'>"?><i class="fa fa-send"></i>Directorio de usuarios </a>
                            </li>
                            <li>
                            <?php echo "<a href='../USUARIOS/Organizaciones.php?cod=$n'>"?> <i class="fa fa-sitemap" aria-hidden="true"></i>Organizaciones </a>
                            </li>
                                               
                            
                           
                        </ul>

                    </li>
                    <li>
                        <a href="../TAREAS/tareas.html"><i class="fa fa-edit "></i>Tareas </a>    
                        <ul class="nav nav-second-level">
                            <li>
                            <?php echo "<a href='../TAREAS/tareas.php?codigo=$n'>"?><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Abierto</a>
                            </li>
                           
                                             
                            
                           
                        </ul>                    
                    </li>             
                    <li>
                        <a href="../TICKETS/tickes_misentradas.html"><i class="fa fa-ticket" aria-hidden="true"></i>Tickets </a>    
                        
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../TICKETS/tickets_mios.php?id=<?php echo $n?>"><i class="fa fa-clipboard" aria-hidden="true"></i> Mis tickets</a>
                            </li>                           
                            <li>
                                <a href="../TICKETS/tickes_newticket.php?id=<?php echo $n?>"><i class="fa fa-file-o" aria-hidden="true"></i> Nuevo ticket</a>
                            </li> 
                        </ul>
                    </li> 
                    <li>
                        <a href="mensajeria.html"><i class="fa fa-stack-overflow" aria-hidden="true"></i>Base de conocimientos  </a> 
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../TICKETS/base_de_conocimientos.php?id=<?php echo $n?>"> <i class="fa fa-question" aria-hidden="true"></i>FAQ</a>
                            </li>
                        </ul>
                    </li>

                     

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                
                 
                <div>

                <nav class="menu" style="background-color: blue;">

                    <ul>
                    <?php echo "<a href='../PANEL DE CONTROL/panel_control.php?cod=$n'>"?>
                        <li><?php echo "<a href='../PANEL DE CONTROL/panel_control.php?cod=$n'>"?>Panel de control </a></li>
                        <li><?php echo "<a href='../PANEL DE CONTROL/directorio-agente.php?cod=$n'>"?>Directorio del agente</a></li>

                        <li> <div class="btn-group">
                            <a style="color:white"class=" dropdown-toggle " data-toggle="dropdown" value="Más">
                        <strong>     Mi perfil</strong>
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <!-- dropdown menu links -->
                        
                            
                            <li class=><?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$n'>"?><span class="glyphicon glyphicon-user"></span>Cuenta</a></li>
                                    <li class=><?php echo "<a href='../PANEL DE CONTROL/Preferencias.php?cod=$n'>"?><span class="glyphicon glyphicon-lock"></span> Preferencias</a></li>
                                    <li class=><?php echo "<a href='../PANEL DE CONTROL/MyEquipo.php?cod=$n'>"?><span class="glyphicon glyphicon-link"></span> Mis equipos</a></li>
                                      </ul>
                        </div></li>

                    </ul>
                        </nav>
                    <!--Mi parte -->
                </div>
                 <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="page-head-line">  Preferencias </h1>
                         <h4>Perfil, preferencias y configuración</h4>
                        
                    </div>


                </div>

                  <div>
                      <form>
                                                            <label for="tamaño">Tamaño máximo de página :</label>
                                                            <select name="Tamaño" class="form-control">
                                                                <option value="5">Mostrar registros de 5</option>
                                                                <option value="10">Mostrar registros de 10</option>
                                                                <option value="15">Mostrar registros de 15</option>
                                                                <option value="20">Mostrar registros de 20</option>
                                                                <option value="25">Mostrar registros de 25</option>
                                                                <option value="30">Mostrar registros de 30</option>
                                                                <option value="35">Mostrar registros de 35</option>
                                                                <option value="40">Mostrar registros de 40</option>
                                                                <option value="45">Mostrar registros de 45</option>
                                                                <option value="50">Mostrar registros de 50</option>
                                                             

 
                                                        </select>

                                                        <label for="frecuencia"> Frecuencia de actualización : <br> <h6>La frecuencia de actualización de la página de los tickets es de unos minutos  </h6></label>
                                                        <select name="frecuencia" class="form-control">
                                                            <option value="desabilitado">--Desabilitado--</option>
                                                            <option value="3m">Cada 3 minutos</option>
                                                            <option value="6m">Cada 6 minutos</option>
                                                            <option value="9m">Cada 9 minutos</option>
                                                            <option value="12m">Cada 12 minutos</option>
                                                            <option value="15m">Cada 15 minutos</option>
                                                            <option value="18m">Cada 18 minutos</option>
                                                            <option value="21m">Cada 21 minutos</option>
                                                            <option value="24m">Cada 24 minutos</option>
                                                            <option value="27m">Cada 27 minutos</option>
                                                            <option value="30m">Cada 30 minutos</option>
                                                             
                                                        </select>
                                                        <hr>


                                                        <label for="nombre"> Nombre por defecto  : <br> <h6>Nombre por defecto para usar al responder un hilo  </h6></label>
                                                        <select name="nombre" class="form-control">
                                                            <option value="ncorreo">Nombre de correo</option>
                                                            <option value="ndepartamento">Nombre del departamento (sí es público)</option>
                                                            <option value="n">Mí Nombre</option>
                                                            <option value="predeterminado">Sistema predeterminado</option>
                                                            
                                                             
                                                        </select>

                                                        <label for="Cola"> Cola de ticket por defecto : </label>
                                                        <select name="Cola" class="form-control">
                                                            <option value="CSD">--Sistema predeterminado--</option>
                                                            <option value="Cabierto">Abierto</option>
                                                            <option value="Casignados">Tickets /Asignados a mí</option>
                                                            <option value="Cerrados">Cerrados hoy</option>
                                                            <option value="Car">Abierto/ respondido</option>
                                                            <option value="team">Tickets asignados en mi equipo</option>
                                                            <option value="cayer">Cerrado/Ayer</option>
                                                            <option value="Catrasadosabierto">Abierto/Atrasado</option>
                                                            <option value="Cmio">Mis tickets</option>
                                                            <option value="Cthisweek">Cerrado esta semana</option>
                                                            <option value="Cclose">Cerrados</option>
                                                            <option value="Cthismonth">Cerrados este mes </option>
                                                            <option value="Cthisyear">Cerrados este año </option>
                                                             
                                                        </select>


                                                    <label for="hilo"> Ver orden de hilo: <br> <h6>El orden de las entradas de hilo</h6></label>
                                                    <select name="hilo" class="form-control">
                                                        <option value="hdes">--Decesndente--</option>
                                                        <option value="hasc">Ascendente </option>
                                                        <option value="hpre">Sistema predeterminado</option>
                                                       
                                                    </select>

                                                <label for="papel"> Tamaño del papel predeterminado : <br> <h6>Tamaño del papel usado al imprimir tickets en pdf</h6></label>
                                                <select name="papel" class="form-control">
                                                    <option value="pnull">Ninguno</option>
                                                    <option value="pcarta">Carta</option>
                                                    <option value="poficio">Oficio</option>
                                                    <option value="pA4">A4 </option>
                                                    <option value="pA3">A3 </option>
                                                    
                                                </select>

                                            <label for="redireccion"> Responder redirección : <br> <h6>Redireccionar la URL usada después de responder un ticket   </h6></label>
                                            <select name="redireccion" class="form-control">
                                                <option value="rcola">Cola</option>
                                                <option value="rticket">Ticket</option>
                                                
                                                
                                            </select>


                                            <label for="Vista"> Vista de imagen adjunta: <br> <h6>Abrir imagenes adjuntas en una nueva pestaña o descargar directamente (CTRL + click derecho)  </h6></label>
                                            <select name="Vista" class="form-control">
                                            <option value="vdescargar">Descargar </option>
                                            <option value="venlinea">En línea</option>
                                          
                                        
                                        </select>



                                        <hr>
                                    <h1 class="page-head-line">  Localización</h1>
                                    
                                    <label for="Horaria"> Zona horaria : </label>
                                    <select name="Horaria" class="form-control">
                                    <option value="multiplicacion">Multiplicacion</option>
                                    <option value="resta">Resta</option>
                                    <option value="suma">Suma</option>
                                
                                </select>


                                <label for="formato"> Formato de hora : </label>
                                <select name="formato" class="form-control">
                                <option value="multiplicacion">Multiplicacion</option>
                                <option value="resta">Resta</option>
                                <option value="suma">Suma</option>
                            
                            </select>
                             <br>
                            <button  class="btn btn-danger">Autodetectar</button>
                            <div class="md-form" style="padding-left: 27%;">
                                
                                    <input style="margin-left: 2%;" class="btn btn-warning" type="submit" value="Guardar cambios">
                                    <input style="margin-left: 2%;"class="btn btn-success" type="button" value="Restablecer">
                                    <button style="margin-left: 2%;"class="btn btn-danger" data-dismiss="modal"> <a style="color:white" href="Usuario-directorio.html">Cancelar</a></button>

        
           
      
                            </div> 
  

      </div>
     


                       
                      </form>
                  </div>

               

          
                         
                      
                    
                        </div>
                <!-- /. ROW  -->                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec" style="text-align: center;">
        &copy; 2021 Universidad Tecnologica de Puebla| Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
