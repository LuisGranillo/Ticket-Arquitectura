<?php
   include("../conexion.php");
 //Seguridad de sesiones paginacion
 
 session_start();
 
 $varsesion=$_SESSION['correo'];
 $n=$_GET['id'];
 $Busqueda= $_GET['busqueda'];

 if(empty($Busqueda))
 {
     header("location:directorio-agente.php?cod=$n");
 }



$si= "SELECT * from usuario where correo ='$varsesion' and id_usuario = $n";
$si2=mysqli_query($conexion,$si);
if($si2)
{

    $fin=mysqli_fetch_array($si2);

$id=$fin['id_usuario'];
 if( $id==null )
    {   
         header("location:../cerrar_sesion.php");
    }
}
 

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscar agente</title>
    <link rel="stylesheet"     href="../CSSAGENTE/Users.css">
  
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
    <link rel="stylesheet" href="../path/to/font-awesome/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="/AGENTE/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"    href="../CSSAGENTE/Tareas.css">
    <script type="text/javascript" src="../js/LimpiarLlenar.js"></script>
    
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
                            $query="SELECT*FROM usuario WHERE id_usuario='$n' ";
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
                <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="page-head-line">Directorio Agentes</h1>
                    
                        
                    </div>


                </div>

                 
            

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

                     
                    <br>
                    <form method="GET" action="BuscarAgente.php">

                        <div class="itemsmy">
                            <input  placeholder="Buscar" name="busqueda" value='<?php echo  $Busqueda?>' class=" items2 form-control mr-sm-2 alin" type="text" REQUIRED>
                             
                            <button placeholder="Buscar"class="btn btn-light" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                
                            <?php echo "<input type='hidden' name='id' value='$n' >";?>
                        </div> 
                    </form>

                    <br>
                      <div class="dive">
                      <table style="width:100%;"class="tabla">  
                        <h3 style="text-align:center">Agentes</h3>
                        <thead>
                            <tr>
                                <th> Seleccionar</th>
                                <th>Clave</th>
                                <th>Estatus</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Número de teléfono</th>
                               
                                <th>Número de móvil</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>

                        <style>
                            .dive{
 
 height:auto;
 width: 100%;
 overflow: hidden;
text-overflow: ellipsis;
 }
                        </style>
                        <?php           


$rol = '';
if($Busqueda=='Administrador'  or $Busqueda =='ADMINISTRADOR')
{
    $rol=" OR id_rol like '%2'";
}
else   if($Busqueda=='Agente'  or $Busqueda =='AGENTE')
{
    $rol=" OR id_rol like '%1'";
}




$sql_registe = "SELECT u.id_usuario, u.nombre,u.apellidos,u.correo, u.Telefono_casa,u.Telefono_celular , d.nombre as Depa,e.tipo FROM  usuario u INNER JOIN departamento d ON u.id_departamento=d.idDepartamento  INNER JOIN estatus e on  e.idEstatus=u.id_estatus where id_rol= 1
and 
( u.id_usuario LIKE '%$Busqueda%'
 or u.nombre LIKE '%$Busqueda%'
 or e.tipo LIKE '%$Busqueda%'
 or u.correo LIKE '%$Busqueda%'
 or u.Telefono_casa Like '%$Busqueda%'
 or u.Telefono_celular Like '%$Busqueda%'
 or u.apellidos Like '%$Busqueda%'
 $rol 
 ) and (id_rol = 1 or id_rol=3) ";
 
$Usuarios= mysqli_query($conexion,$sql_registe) or die ("Problemas al consultar");
if($Usuarios)
{
 

    while($recorrido = mysqli_fetch_array($Usuarios) )  

{

    $Arreglo='Usuarios[]';
                echo "<tr>";
                $Arreglo2=  "<td>  <input type='checkbox' name='$Arreglo' value='" .$recorrido['id_usuario'] . "'></td>";
                echo $Arreglo2;
                echo "<td>" .  $recorrido['id_usuario'] . "</td>";
                echo "<td>" .  $recorrido['tipo'] . "</td>";
                echo "<td>" .  "<a href='Usuario-info.php?cod=$n&search=" . $recorrido['id_usuario'] ."'>"   . $recorrido['nombre'] ."</a>" . "</td>";
                echo "<td>" .  $recorrido['apellidos'] . "</td>";
                  echo "<td>" .  $recorrido['correo'] . "</td>";
               
                echo "<td>" .  $recorrido['Telefono_casa'] . "</td>";
                echo "<td>" .  $recorrido['Telefono_celular'] . "</td>";
                echo "<td>" .  $recorrido['Depa'] . "</td>";
                      
                echo "</tr>";

}} ?>

                        <tr>
                        <td colspan="9">Seleccionar :   <input type="checkbox" onclick="marcar(this);" /> Todos| Ninguno </td>          </tr>
                    </table>
                      </div>
                  
             
                </div>
                    <!--Mi parte -->
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
