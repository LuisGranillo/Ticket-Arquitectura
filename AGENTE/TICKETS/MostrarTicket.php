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

$id_T = $_GET["id_T"];


$q2 = "SELECT a.*, b.* From base_de_datos_ticket.Ticket a Inner join sistema_de_competencia.usuario b on a.Id_Agente = b.id_usuario WHERE Id_Ticket = '$id_T'";

$q = "SELECT a.*, b.* From base_de_datos_ticket.Ticket a Inner join sistema_de_competencia.usuario b on a.Remitente = b.nombre WHERE Id_Ticket = '$id_T'";

$status = "SELECT Id_Ticket,Tipo from Ticket INNER JOIN Estado on Ticket.Id_status = Estado.Id_status WHERE Id_Ticket='$id_T'";

$tema ="SELECT Id_Ticket,Nombre from Ticket INNER JOIN Tema on Ticket.Id_Tema = Tema.Id_Tema WHERE Id_Ticket='$id_T'";

$HILO = "SELECT * FROM Hilo_Ticket WHERE Id_Ticket= '$id_T' ORDER BY Fecha ASC";
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Control de administración</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                <div class="row" style="padding-bottom: 50px; ">
                    <div class="col-md-12" >
                        <div style=" padding: 30px; margin: 15px;" class="panel panel-back noti-box ">
                            <span class="icon-box bg-color-black">
                            <i class="bi bi-card-heading"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text">Informacion Del Ticket</p>
                                <p>Bienvenido, Te presentamos la informacion detallada del ticket selecionado anteriormente. </p>
                                <hr />
                                <div class="container">
                                <?php $respuesta2 = mysqli_query($conexion, $q);
                                            while($row2=$respuesta2->fetch_assoc()) {?>
                                            <p>Foto Remitente : </p>
                                                <img  id="mediana" width="100" height="110" src="data:image/jpg;base64,<?php echo base64_encode($row2['foto']);?>"/>
                                            <?php } mysqli_free_result($respuesta2)?>

                                    <table class="table table-responsive">
                                    <?php include "conexion.php";$respuesta = mysqli_query($conexion, $status);
                                            while($row=mysqli_fetch_row($respuesta)) {?>
                                        <tbody>
                                            <tr>
                                            <td>Estado: <?php echo $row[1] ?></td>
                                            <?php } mysqli_free_result($respuesta)?>
                                           
                                            <?php $respuesta2 = mysqli_query($conexion, $q);
                                            while($row2=mysqli_fetch_row($respuesta2)) {?>
                                            <td>Remitente: <?php echo $row2[1] ?> <?php echo $row2[17] ?></td>
                                            </tr>
                                            <td>Tel: <a><?php echo $row2[24] ?> </a></td>
                                            <td>Cel: <a><?php echo $row2[25] ?> </a></td>
                                            <tr>
                                            <td>Correo: <a><?php echo $row2[20] ?> </a></td>
                                            <?php } mysqli_free_result($respuesta2)?>
                                            <?php $respuesta2 = mysqli_query($conexion, $tema);
                                            while($row2=mysqli_fetch_row($respuesta2)) {?>
                                            <td>Tema: <?php echo $row2[1] ?></td>
                                            <?php } mysqli_free_result($respuesta2)?>
                                            <tr>
                                            <?php $respuesta2 = mysqli_query($conexion, $q);
                                            while($row2=mysqli_fetch_row($respuesta2)) {?>
                                            <td>Fecha de creación: <?php echo $row2[7] ?></td>
                                            <td>Ultima Actualización: <?php echo $row2[8] ?></td>
                                            </tr>
                                            <tr>
                                            <td>Asunto: <?php echo $row2[9] ?></td>
                                            <td>Nota Interior: <?php echo $row2[10] ?></td>
                                            </tr>
                                            <?php } mysqli_free_result($respuesta2)?>
                             
                                        </tbody>
                                        
                                        
                                    </table>
                                    <p>Los tickets suelen tener archivos adjuntos si desea descargar presione descargar si es una foto presionar clik derecho y seleccionar <b> 'Guardar imagen como...'</b></p>
                                    <?php include "conexion.php";$respuesta2 = mysqli_query($conexion, $q);
                                            while($row2=mysqli_fetch_row($respuesta2)) {?>
                                            <p>Archivo Principal: <a href="MostrarTicket.php?id_T=<?php echo $row2[0]?>&id=<?php echo $id?>"><i class="bi bi-download"></i> Download File</a> </p>
                                            <?php
                                            if(empty($row2[11]))
                                            {
                                                echo "sin archivo";
                                            }
                                            else
                                            {
                                                echo "<embed src='Public/img/$row2[11]' type='application/pdf' width='350' height='350' />";
                                            }
                                            ?>
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="panel panel-back  ">
                <h3> Mensajes Privados Del Ticket <?php echo $row2[0]?></h3>
                <?php } mysqli_free_result($respuesta2)?>
                </div>
                </div>
                
                <!--/.ROW-->
                <div class="col-md-12">
                    <div style=" padding: 15px; margin: 5px;" class="panel panel-back  ">

                        <div class="panel panel-default"  >
                            <div class="panel-heading" >
                                Historial De Mensajes
                            </div>
                            <?php include "conexion.php";$respuesta3 = mysqli_query($conexion, $HILO);
                                            while($row3=mysqli_fetch_row($respuesta3)) {?>
                                            
                            <div class="panel-body" style="padding: 0px;">
                                <div class="chat-widget-main">


                                    <div class="chat-widget-left">
                                        <h5><?php echo $row3[4];?></h5>
                                        <?php
                                            if(empty($row3[5]))
                                            {
                                                echo "sin archivo";
                                            }
                                            else
                                            {
                                                echo "<embed src='Public/img/$row3[5]' type='application/pdf' width='200' height='200' />";
                                            }
                                        ?>
                                    </div>
                                    <div class="chat-widget-name-left">
                                        <h4><b><?php echo $row3[2];?></b></h4><p> Fecha: <?php echo $row3[3];?></p>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php } mysqli_free_result($respuesta3)?>
                            <?php include "conexion.php"; $respuesta2 = mysqli_query($conexion, $q2);
                                            while($row2=mysqli_fetch_row($respuesta2)) {?>
                            <form action="Hilo.php?id_T=<?php echo $id_T?>&id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input type="hidden" name="ticket" value="<?php echo $row2[0];?>">
                                    <input type="hidden" name="nombre" value="<?php echo $row2[16];?>">
                                    <table>
                                        <tr>
                                            <td>
                                            <input style="width:650px;" type="text" name="mensaje"class="form-control" placeholder="Escribe tu Comentario" />

                                            </td>
            
                                            <td>

                                            <input type="file" name="Archivo">

                                            </td>
                                            <td>
                                        
                                
                                                <input class="btn btn-warning" type="submit" >
                                            

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            </form>
                            <?php } mysqli_free_result($respuesta2)?>
                        </div>
                    </div>
                </div>
              
                    <!--/.Chat Panel End-->
                </div>
                <!-- /. ROW  -->

                <hr />
                

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
