<?php
include "conexion_2.php";
session_start();


$varsesion=$_SESSION['correo'];
$id_AGDE = $_GET["id"];

$si= "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $id_AGDE";
$si2=mysqli_query($conexion,$si);
$fin=mysqli_fetch_array($si2);

$id_AGDE=$fin['id_usuario'];
if( $id_AGDE==null )
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
    <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>

    
    
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
                <a class="navbar-brand" href="../PANEL DE CONTROL/panel_control.php?cod=<?php echo $id_AGDE ?>">UTP</a>
                <img src="../assets/img/oficial-logo.png" class="img-thumbnail" width="75px" />
            </div>
            
            <div class="header-right">
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
                <?php 
                 if($fin['id_rol']==2)
                 {
                    echo "<a href='/UTP/ADMINISTRADORES/CRUD/TAREAS/mensajeria.php?cod=$id_AGDE' >" ?> Panel administrador</a> | <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$id_AGDE'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";
           
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
                            $query="SELECT * FROM usuario WHERE id_usuario='$id_AGDE'";
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
                            <?php echo "<a href='../PANEL DE CONTROL/panel_control.php?cod=$id_AGDE'>"?><i class="fa fa-cogs" aria-hidden="true"></i>Panel de control </a>
                            </li>
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/directorio-agente.php?cod=$id_AGDE'>"?><i class="fa fa-address-book-o" aria-hidden="true"></i>Directorio del agente </a>
                            </li>
                            <li>
                            <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$id_AGDE'>"?><i class="fa fa-user-circle" aria-hidden="true"></i>Mi perfil </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../USUARIOS/Usuario-directorio.html"><i class="fa fa-user-o" aria-hidden="true"></i>Usuarios </a>
                        <ul class="nav nav-second-level">
                            <li>
                            <?php echo "<a href='../USUARIOS/Usuario-directorio.php?cod=$id_AGDE'>"?><i class="fa fa-send"></i>Directorio de usuarios </a>
                            </li>
                            <li>
                            <?php echo "<a href='../USUARIOS/Organizaciones.php?cod=$id_AGDE'>"?> <i class="fa fa-sitemap" aria-hidden="true"></i>Organizaciones </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="../TAREAS/tareas.html"><i class="fa fa-edit "></i>Tareas </a>    
                        <ul class="nav nav-second-level">
                        <li>
                            <?php echo "<a href='../TAREAS/tareas.php?codigo=$id_AGDE'>"?><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Abierto</a>
                            </li>
                        </ul>    
                                        
                    </li>                  
                      
                    <li>
                        <a href="../TICKETS/tickes_misentradas.html"><i class="fa fa-ticket" aria-hidden="true"></i>Tickets </a>    
                        
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tickets_mios.php?id=<?php echo $id_AGDE?>"><i class="fa fa-clipboard" aria-hidden="true"></i> Mis tickets</a>
                            </li>                           
                            <li>
                                <a href="tickes_newticket.php?id=<?php echo $id_AGDE?>"><i class="fa fa-file-o" aria-hidden="true"></i> Nuevo ticket</a>
                            </li> 
                        </ul>
                    </li> 
                    <li>
                        <a href="mensajeria.html"><i class="fa fa-stack-overflow" aria-hidden="true"></i>Base de conocimientos  </a> 
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="base_de_conocimientos.php?id=<?php echo $id_AGDE?>"> <i class="fa fa-question" aria-hidden="true"></i>FAQ</a>
                            </li>
                        </ul>
                    </li> 

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 col-sm-4">
                        <h1 class="page-head-line">Nuevo Ticket <i class="fa fa-plus" aria-hidden="true"></i></h1>
                        
                        
                        <div class="container">
                            
                                <br>
                                <h4><b> 1. Asignacion del Ticket :</b></h4>
                                <br>
                                    <h4><strong><u>Selecciona un Agente en su defecto selecciona un Equipo o un Departamento  para continuar</u></strong></h4>
                                <br>
                                <div>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <td>
                                                <form action="tickets_newticket_detalles.php?id=<?php echo $id_AGDE?>" method="post">
                                                    <select class="btn btn-success" name="id_agente" style="width:150px ;height: 70px">
                                                    <option selected>Agentes</option>
                                                    <?php
                                                        include "conexion_2.php";
                                                        
                                                        $getDep = "SELECT id_usuario,nombre FROM usuario ORDER BY id_usuario";
                                                        $getQuery = mysqli_query($conexion,$getDep);
                                                    
                                                        while($row = mysqli_fetch_array($getQuery))
                                                        {
                                                            $id = $row['0'];
                                                            $name = $row['1'];
                                                            ?>
                                                                
                                                                <option value="<?php echo $id; ?>"><?php echo $name;?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                    </select>  
                                                    </td>
                                                    <td>
                                                    <button style='width:200px; 'class="btn btn-success" >Seleccionar Agente<h1><i class="bi bi-person-bounding-box"></i></h1></button>
                                                    
                                                    </td>
                                                </form>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                <form action="tickets_newticket_detalles_2.php?id=<?php echo $id_AGDE?>" method="post">
                                                    <br><br>
                                                    <select class="btn btn-success" name="id_equipo" style="width:150px ;height: 70px">
                                                        <option selected>Equipos</option>
                                                        <?php
                                                        include "conexion_2.php";
                                                        $getDep = "SELECT idEquipo,nombre FROM equipo ORDER BY idEquipo";
                                                        $getQuery = mysqli_query($conexion,$getDep);
                                                    
                                                        while($row = mysqli_fetch_array($getQuery))
                                                        {
                                                            $id = $row['0'];
                                                            $name = $row['1'];
                                                            ?>
                                                                
                                                                <option value="<?php echo $id; ?>"><?php echo $name;?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    </td>
                                                    <td>
                                                        <br>
                                                        <button style='width:200px;'class="btn btn-success" >Seleccionar Equipo<h1><i class="bi bi-people"></i></h1></button>
                                                    </td>
                                                </form>
                                            </tr>
                                            <tr>
                                                <td>
                                                <form action="tickets_newticket_detalles_3.php?id=<?php echo $id_AGDE?>" method="post">
                                                    <br><br>
                                                    <select class="btn btn-success" id="lista1" name="id_depa"style="width:150px ;height: 70px">
                                                        <option selected>Departamentos</option>
                                                        <?php
                                                        include "conexion_2.php";
                                                        $getDep = "SELECT idDepartamento,nombre FROM departamento ORDER BY idDepartamento";
                                                        $getQuery = mysqli_query($conexion,$getDep);
                                                    
                                                        while($row = mysqli_fetch_array($getQuery))
                                                        {
                                                            $id = $row['0'];
                                                            $name = $row['1'];
                                                            ?>
                                                                
                                                                <option value="<?php echo $id; ?>"><?php echo $name;?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div id="select2lista"></div>
                                                    </td>
                                                    <td>
                                                        <br>
                                                        <button style='width:200px;' class="btn btn-success" >Seleccionar Agente  <br>del Departamento<h1><i class="bi bi-person-badge"></i></h1></button>
                                                    </td>
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                  
                                </div>
                         
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
    <script type="text/javascript">
	$(document).ready(function(){
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
    </script>
    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"datos.php",
                data:"continente=" + $('#lista1').val(),
                success:function(r){
                    $('#select2lista').html(r);
                }
            });
        }
    </script>
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

