<?php
 
 include("../conexion.php");
 
 //Seguridad de sesiones paginacion
 
 session_start();

 $varsesion=$_SESSION['correo'];
 $n=$_GET['cod'];


$si= "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $n";
$si2=mysqli_query($conexion,$si);
$fin=mysqli_fetch_array($si2);

$id=$fin['id_usuario'];
 if( $id==null )
    {   
         header("location:../cerrar_sesion.php");
    }
  else{
    ob_start();   
  }
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel de control</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="../CSSAGENTE/Users2.css">
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/datos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.7.0/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet"    href="../CSSAGENTE/Tareas.css">
<link rel="stylesheet" href="../CSSAGENTE/estilos_panel.css">
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
                 
                <?php 
                 if($fin['id_rol']==2)
                 {
                    echo "<a href='/UTP/ADMINISTRADORES/CRUD/TAREAS/mensajeria.php?cod=$n' >" ?> Panel administrador</a> | <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$n'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";
           
                 }
                 else {
                    echo " <a href='../PANEL DE CONTROL/Cuenta.php?cod=$n'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";
           
                 }
                 ?>
               
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
                            
                            $query="SELECT*FROM usuario WHERE id_usuario='$n'";
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
                <div >

                   
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
                                        <li class=><?php echo "<a href='../PANEL DE CONTROL/MyEquipo.php?cod=$n'>"?><span class="glyphicon glyphicon-link"></span> Mis equipos</a></li>
                  </ul>
                        </div></li>

                    </ul>
                    </nav>
      
                      <!--Mi parte -->
                  </div>
                <div class="row">
                    <div class="col-md-12">
                  
                        <h1 class="page-head-line">Panel de control</h1>
                     
                    </head>
                    
                    
                    <body>
                        <div class="container">
                            <div class="calendar-assets">
                              
                                <center>
                                    <button onclick="MostrarDatos();" style="background-color:orange; margin-left: 10px ; border-radius: 2em;" ><img src="../imagenes/departamento.jpeg" width="150" height="150" /><h3>DEPARTAMENTO</h3></button>
                                 
                                    <button onclick="datos();" style="background-color: slateblue; margin-left: 10px ; border-radius: 2em;"><img src="../imagenes/ayuda.jpg" width="150" height="150"/><h3>TEMAS</h3></button>
                                   
                                    <button onclick="AGENTES();" style="background-color: turquoise; margin-left: 10px; border-radius: 2em;" ><img src="../imagenes/agentes.png" width="150" height="150" /><h3>AGENTES</h3></button>
                                    <div id="agentes" class="dropdown">
               
                                        
                                        <div tabindex="0" class="onclick-menu">
                                            <div class="w3-container">
                                            
                                                <table style="margin-top: 5%;" class="w3-table-all">
                                                  <thead>
                                                    <tr class="w3-light-grey w3-hover-red">
                                                      <th>Agentes</th>
                                                      <th>Abierto</th>
                                                      <th>Asignado</th>
                                                      <th>Atrasado</th>
                
                                                      <th>Cerrado</th>
                                                      <th>Reabierto</th>
                
                                                      <th>Eliminado</th>
                                                      <th>Tiempo de Servicio</th>
                                                      <th>Tiempo de Respuesta</th>
                
                                                    </tr>
                                                  </thead>
                                                  <tr class="w3-hover-green">
                                                    <td>General Inquiry</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.0</td>
                                                    <td>0.0</td>
                
                                                  </tr>
                                                  <tr class="w3-hover-blue">
                                                    <td>Report a Problem</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.0</td>
                                                    <td>0.0</td>
                                                  </tr>
                                            
                                               
                                                </table>
                                                <br>
                                                <button onclick="cerrar_agente();" style="background-color: red; border-radius: 5em;" ><img src="../imagenes/cerrar.jpg" width="100" height="100" style="border-radius: 5em;"/></button>
                
                                              </div>
                                                  </div>
                                                  
                             
                                        </div>
                                      <div id="temas" class="dropdown">
                               
                                                        
                                        <div tabindex="0" class="onclick-menu">
                                            <div class="w3-container">
                                            
                                                <table style="margin-top: 5%;" class="w3-table-all">
                                                  <thead>
                                                    <tr class="w3-light-grey w3-hover-red">
                                                      <th>Temas de ayuda</th>
                                                      <th>Abierto</th>
                                                      <th>Asignado</th>
                                                      <th>Atrasado</th>
                
                                                      <th>Cerrado</th>
                                                      <th>Reabierto</th>
                
                                                      <th>Eliminado</th>
                                                      <th>Tiempo de Servicio</th>
                                                      <th>Tiempo de Respuesta</th>
                
                                                    </tr>
                                                  </thead>
                                                  <tr class="w3-hover-green">
                                                    <td>General Inquiry</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.0</td>
                                                    <td>0.0</td>
                
                                                  </tr>
                                                  <tr class="w3-hover-blue">
                                                    <td>Report a Problem</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.0</td>
                                                    <td>0.0</td>
                                                  </tr>
                                            
                                               
                                                </table>
                                                <br>
                                                <button onclick="cerrar_datos();" style="background-color:  yellow; border-radius: 5em;" ><img src="../imagenes/close.jpeg" width="100" height="100" style="border-radius: 5em;"/></button>
                
                                              </div>
                                                  </div>
                                                  
                             
                                        </div>
                                        <div id="departamentos" class="dropdown">
                               
                                                        
                                            <div tabindex="0" class="onclick-menu">
                                                <div class="w3-container">
                                                
                                                    <table style="margin-top: 5%;" class="w3-table-all">
                                                      <thead>
                                                        <tr class="w3-light-grey w3-hover-red">
                                                          <th>Departamento</th>
                                                          <th>Abierto</th>
                                                          <th>Asignado</th>
                                                          <th>Atrasado</th>
                    
                                                          <th>Cerrado</th>
                                                          <th>Reabierto</th>
                    
                                                          <th>Eliminado</th>
                                                          <th>Tiempo de Servicio</th>
                                                          <th>Tiempo de Respuesta</th>
                    
                                                        </tr>
                                                      </thead>
                                                      <tr class="w3-hover-green">
                                                        <td>Support</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0.0</td>
                                                        <td>0.0</td>
                    
                                                      </tr>
                                                      <tr class="w3-hover-blue">
                                                        <td>Maintenance</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0.0</td>
                                                        <td>0.0</td>
                                                      </tr>
                                                
                                                   
                                                    </table>
                                                    <br>
                                                    <button onclick="cerrar();" style="background-color: teal; border-radius: 3em;" ><img src="../imagenes/cerrar.jpg" width="100" height="100" style="border-radius: 5em;"/></button>
                    
                                                  </div>
                                                 
                                                          
                                  </center>
                                <figure id="photo" title="Marco de tiempo del informe !!" tooltip-dir="right">
                                    <img src="../imagenes/ayuda.png" width="50%" height="50%" id="imgenes" style="border-radius: 5em;"/>

                                    <center>
                                        <img src="../imagenes/calendar-reminder-line-and-fill-style-icon-free-vector.webp" width="50%" height="50%" id="imgenes" style="border-radius: 5em;"/>

                                   
                                    </center>
                                </figure>
                                
                                <h1 id="currentDate"></h1>
                                <h5>Calendario reporte</h5>

                                <div class="field">
                                    <label for="date">Reporte de periodo:</label>
                                    <form action="ar.php"  method="post" enctype="multipart/form-data" class="form-input" id="date-search">
                                    <input type="date" class="text-field" name="date" id="date" required>
                                        
                                            <?php
                                        
                                        

                                            echo "<input type='hidden' name='cod' value='$n'>";
                                            ?>
                                     
                                        <button type="submit" class="btn btn-small btn btn-primary btn-lg active" title="Pesquisar"><i class="fas fa-search"></i></button>
                                 
                                </div>
                                <div class="day-assets">
                                    <button type="button"class="btn btn btn-primary btn-lg active" onclick="prevDay()" title="Dia anterior"><i class="fas fa-chevron-left"></i> </button>
                                    <button type="button"class="btn btn btn-primary btn-lg active" onclick="resetDate()" title="Dia atual"><i class="fas fa-calendar-day"></i> Calendario</button>
                                    <button type="button"class="btn btn btn-primary btn-lg active" onclick="nextDay()" title="Próximo dia"><i class="fas fa-chevron-right"></i> </button>
                                </div>
                            </div>
                            <div class="calendar" id="table">
                                <div class="header">
                                    <!-- Aqui é onde ficará o h1 com o mês e o ano -->
                                    <div class="month" id="month-header">
                    
                                    </div>
                                    <div class="buttons">
                                        <button class="icon" onclick="prevMonth()" title="Mês anterior"><i class="fas fa-chevron-left"></i></button>
                                        <button class="icon" onclick="nextMonth()" title="Próximo mês"><i class="fas fa-chevron-right "></i></button>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                             
                            </div>
                        
                            <h3>Periodo:</h3>
                            <br>
                            <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="depart" >
                                                      
                              <option value=""> Hasta hoy </option>      
                              <option value=""> Una semana </option>      
                              <option value=""> Dos semanas </option>      
                              <option value=""> Un mes </option>      
                              <option value=""> Un cuarto </option>      
      
                          </select>
                          <button  class="btn btn-dark">Actualizar</button>

                          </form>
                         
                        </div>
                    
                        <script src="https://kit.fontawesome.com/812e771e48.js" crossorigin="anonymous"></script>
                   
              
                 
                      
                      
                       
                    </div>
             
                    </div>
                </div>
                <!-- /. ROW  -->                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
  <div id="footer-sec">
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
