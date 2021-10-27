<?php
include "conexion_2.php";
session_start();

$varsesion=$_SESSION['correo'];
$id = $_GET["id"];

$si= "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $id";
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

require "conexion.php";

$id_Equipo = $_POST['id_equipo'];



$q = "SELECT a.Id_Ticket, a.Remitente, a.Id_status, a.Fecha, a.Fecha_Update, a.Asunto, a.Nota_Inter, b.idEquipo FROM base_de_datos_ticket.Ticket a INNER JOIN sistema_de_competencia.equipo b ON a.Id_Equipo = b.idEquipo WHERE idEquipo = '$id_Equipo'";


?>


<!DOCTYPE html>
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
    
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    
    
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
                <a class="navbar-brand" href="../PANEL DE CONTROL/panel_control.php?cod=<?php echo $id ?>">UTP</a>
                <img src="../assets/img/oficial-logo.png" class="img-thumbnail" width="75px" />
            </div>
            
            <div class="header-right">
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
                <?php 
                 if($fin['id_rol']==2)
                 {
                    echo "<a href='/UTP/ADMINISTRADORES/CRUD/TAREAS/mensajeria.php?cod=$id' >" ?> Panel administrador</a> | <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$id'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";
           
                 }
                 else {
                    echo " <a href='../PANEL DE CONTROL/Cuenta.php?cod=$id'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";
           
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
                          <?php
                            include "conexion_2.php";
                            $query="SELECT * FROM usuario WHERE id_usuario='$id'";
                            $resultado=$conexion->query($query);
                            while($row=$resultado->fetch_assoc()){
                          ?>
                          <img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"/>
                            <div class="inner-text">
                                <?php
                                  
                                    echo "<p style='color:white;'> Bienvenido " .   ($row['nombre']);
                                    
                                    echo ($row['apellidos'] . "</p>");
                                    }
                                ?>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="../PANEL DE CONTROL/panel_control.html"><i class="fa fa-cogs" aria-hidden="true"></i>Panel de control </a>

                        <ul class="nav nav-second-level">
                        <li>
                            <?php echo "<a href='../PANEL DE CONTROL/panel_control.php?cod=$id'>"?><i class="fa fa-cogs" aria-hidden="true"></i>Panel de control </a>
                            </li>
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/directorio-agente.php?cod=$id'>"?><i class="fa fa-address-book-o" aria-hidden="true"></i>Directorio del agente </a>
                            </li>
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$id'>"?><i class="fa fa-user-circle" aria-hidden="true"></i>Mi perfil </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../USUARIOS/Usuario-directorio.html"><i class="fa fa-user-o" aria-hidden="true"></i>Usuarios </a>
                        <ul class="nav nav-second-level">
                            <li>
                            <?php echo "<a href='../USUARIOS/Usuario-directorio.php?cod=$id'>"?><i class="fa fa-send"></i>Directorio de usuarios </a>
                            </li>
                            <li>
                            <?php echo "<a href='../USUARIOS/Organizaciones.php?cod=$id'>"?> <i class="fa fa-sitemap" aria-hidden="true"></i>Organizaciones </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="../TAREAS/tareas.html"><i class="fa fa-edit "></i>Tareas </a>    
                        <ul class="nav nav-second-level">
                        <li>
                            <?php echo "<a href='../TAREAS/tareas.php?codigo=$id'>"?><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Abierto</a>
                            </li>
                        </ul>    
                                        
                    </li>                  
                      
                    <li>
                        <a href="../TICKETS/tickes_misentradas.html"><i class="fa fa-ticket" aria-hidden="true"></i>Tickets </a>    
                        
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tickets_mios.php?id=<?php echo $id?>"><i class="fa fa-clipboard" aria-hidden="true"></i> Mis tickets</a>
                            </li>                           
                            <li>
                                <a href="tickes_newticket.php?id=<?php echo $id?>"><i class="fa fa-file-o" aria-hidden="true"></i> Nuevo ticket</a>
                            </li> 
                        </ul>
                    </li> 
                    <li>
                        <a href="mensajeria.html"><i class="fa fa-stack-overflow" aria-hidden="true"></i>Base de conocimientos  </a> 
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="base_de_conocimientos.php?id=<?php echo $id?>"> <i class="fa fa-question" aria-hidden="true"></i>FAQ</a>
                            </li>
                        </ul>
                    </li> 
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Mis Tickets <i class="fa fa-clipboard" aria-hidden="true"></i></h1>
                        <div class="container">
                        <h3>Filtros Del Ticket</h3>  
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="dropdown">
                                                <button style="margin: 5px;" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><i class="bi bi-ui-checks"></i> Mostrar <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="tickets_mios.php?id=<?php echo $id?>"><i class="bi bi-file-person-fill"></i> Asignados a Mí</a></li>
                                                    <li><a href="Validar_equipo.php?id=<?php echo $id?>"><i class="bi bi-diagram-3"></i> Asignados a Equipo</a></li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>
                                        <div class="dropdown">
                                                <button style="margin: 5px;" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><i class="bi bi-app-indicator"></i> Estados <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="tickets_abiertos_equipo.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-envelope-open"></i> Abriertos</a></li>
                                                    <li><a href="tickets_resueltos_equipo.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-patch-check"></i> Resueltos</a></li>
                                                    <li><a href="tickets_atrasados_equipo.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-stopwatch"></i> Atrasados</a></li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="dropdown">
                                                <button style="margin: 5px;" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><i class="bi bi-x-octagon"></i> Cerrados <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="tickets_equipo_hoy.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-calendar-day"></i> Hoy</a></li>
                                                    <li><a href="tickets_equipo_ayer.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-calendar-date"></i> Ayer</a></li>
                                                    <li><a href="tickets_equipo_mes.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-calendar-month"></i> Este mes</a></li>
                                                    <li><a href="tickets_equipo_año.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-calendar-event"></i> Este año</a></li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="dropdown">
                                                <button style="margin: 5px;" class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><i class="bi bi-arrow-90deg-down"></i> Ordenar <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="tickets_equipo_recientes.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-arrow-90deg-down"></i> Recientes </a></li>
                                                    <li><a href="tickets_equipo_antiguos.php?id_equipo=<?php echo $id_Equipo?>&id=<?php echo $id?>"><i class="bi bi-arrow-90deg-down"></i> Antiguos</a></li>                                                
                                                </ul>
                                            </div>
                                        </th>
                                        <th>
                                            <button style="margin: 5px;" class="btn btn-success"><a href="mis_solicitudes_ticket.php?id=<?php echo $id?>">Tickes Solicitados</a></button>
                                        </th>                                       
                                        <th>
                                            
                                            <form action="buscar_ticket_equipo.php" method="get" class="form_search">
                                                <input type="hidden" name="id_equipo" value="<?php echo $id_Equipo?>">
                                                <input id="busqueda" name="busqueda" type="text" placeholder="Buscar ticket">
                                                <input type="hidden" name="id" value="<?php echo $id?>">
                                                <input type="submit" value="Buscar" class="btn_search">
                                            </form>
                                        </th>
                             
                                    </tr>
                                </thead>

                            </table>                                     
                        
                    </div>
                          <div class="container">           
                            <table class="table table-striped">
                              <thead>
                                <tr>                               
                                    <th><i class="bi bi-stickies-fill"></i> Ticket</th>
                                    <th><i class="bi bi-person-square"></i> Remitente</th>
                                    <th><i class="bi bi-calendar-check"></i> Estado</th>
                                    <th><i class="bi bi-card-text"></i> Asunto</th>
                                    <th><i class="bi bi-calendar-date"></i> Creacion</th>
                                    <th><i class="bi bi-calendar-day"></i> Actualizacion</th>                                
                                </tr>
                              </thead>
                              <tbody>
                              <?php include "conexion.php"; $respuesta = mysqli_query($conexion, $q);
                                            while($row=mysqli_fetch_row($respuesta)) {?>
                                            <tr>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo $row[1] ?></td>
                                                <td><?php if($row[2] == 1)
                                                    {
                                                    echo "Abierto";
                                                    }
                                                    elseif($row[2]==2)
                                                    {
                                                    echo "Resuelto";  
                                                    }
                                                    elseif($row[2]==3)
                                                    {
                                                    echo "Cerrado";  
                                                    }
                                                    elseif($row[2]==4)
                                                    {
                                                    echo "Atrasado";  
                                                    }?></td>
                                                <td><?php echo $row[5] ?></td>
                                                <td><?php echo $row[3] ?></td>
                                                <td><?php echo $row[4] ?></td>
                                                <td><button class="btn btn-success"><a class="table__item" href="MostrarTicket_equipo.php?id_T=<?php echo $row[0];?>&id_equipo=<?php echo $row[7];?>&id=<?php echo $id;?>">Revisar</a></button></td>                                                    
                                            </tr>
                                            <?php } mysqli_free_result($respuesta)?>                             
                              </tbody>
                            </table>
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
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
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