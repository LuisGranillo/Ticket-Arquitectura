<?php

include("../conexion.php");
 //Seguridad de sesiones paginacion
 
 session_start();

 $varsesion=$_SESSION['correo'];
 $n=$_GET['cod'];


$si= "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $n";
$si2=mysqli_query($conexion,$si);
if ($si2) {
    $fin=mysqli_fetch_array($si2);

    $id=$fin['id_usuario'];
    if ($id==null) {
        header("location:../cerrar_sesion.php");
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organizaciones</title>
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"    href="/UTP/AGENTE/CSSAGENTE/Tareas.css">   
    <style> 
.dive{
 
    height:auto;
    width: 100%;
    overflow: hidden;
   text-overflow: ellipsis;
    }</style> 

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
                <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="page-head-line">Organizaciones</h1>
                    
                        
                    </div>


                </div>



                 
                <div>

                    <nav class="menu" style="background-color: red;">

                    <ul >
                            <li >
                            <?php echo "<a href='../USUARIOS/Usuario-directorio.php?cod=$n'> Directorio de usuarios  </a>"?>
                            
                            </li>
                            <li >
                            <?php echo "<a href='../USUARIOS/Organizaciones.php?cod=$n'>  <strong>Organizaciones</strong> </a>"?>
                       
                            </li>
                       
                        </ul>
                    </nav>
    
                    <!--Mi parte -->
                </div>

                <div>
                    <br>
                    <form method="GET" action="BuscarOrganizacion.php">
                            <div class="itemsmy">
                                <input style="width: 55%;"  placeholder="Buscar" name="busqueda" class="form-control mr-sm-2 alin" type="text" REQUIRED>
                                <button placeholder="Buscar"class="btn btn-light" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                <?php echo "<input type='hidden' name='id' value='$n' >";?>
                            </div>
                               <br>
                               <br>
                               <br>
                               </form>
 
                               <?php 
                               
                               $VERI="SELECT * FROM usuario WHERE id_rol=2 and id_usuario=$n";

                               $PERMISO=mysqli_query($conexion, $VERI);
                               if($PERMISO)
                               {
                                   $ARREGLA=mysqli_fetch_array($PERMISO);
                               }

                               $CONTENIDO="   <input class='btn btn-success' type='button' data-toggle='modal' data-target='#modal1' value='Añadir organizacion'>                     


                              
                              " ;
                               if ($ARREGLA==NULL) {
                                $CONTENIDO='';
                                  echo  $CONTENIDO;
                               }
                               else 
                               {
                                echo $CONTENIDO;
                                   
                               }
                               ?>       
                               
                               
                               
                            



<div class="dive"><table style="width:100%;"class="tabla">  
                            <h3 style="text-align:center">Información de las Organizaciones</h3>
                            <thead>
                                <tr>
                                    <th>   Seleccionar</th>
                                    <th>Clave departamento</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                   
                                    <th>Estatus</th>
                                    <th>Descripción</th>
                                    <th>Líder</th>
                                </tr>
    
                                
                            </thead>
                            <?php           
                                                $Consulta="SELECT DISTINCT d.idDepartamento, d.nombre,d.correo, e.tipo, d.descripcion, u.nombre as User, u.apellidos from usuario u INNER JOIN departamento d on u.id_usuario=d.idusuLider INNER JOIN estatus e on e.idEstatus=d.idEstatu";
                                                $Departamentos= mysqli_query($conexion,$Consulta) or die ("Problemas al consultar");
                                                if($Departamentos)
                                                {
                                                $recorrido=mysqli_fetch_array($Departamentos);
                                               
                                                    do
                                                 {
  
                                                                echo "<tr>";
                                                                echo "<td ><input type='checkbox'></td>";
                                                                echo "<td>" .  $recorrido['idDepartamento'] . "</td>";
                                                                echo "<td>"     . $recorrido['nombre'] ."</a>" . "</td>";

                                                                echo "<td>" .  $recorrido['correo'] . "</td>";
                                                               
                                                                echo "<td>" .  $recorrido['tipo'] . "</td>";
                                                                echo "<td>" .  $recorrido['descripcion'] . "</td>";
                                                                echo "<td>" .  $recorrido['User'] . "</td>";   
                                                                echo "</tr>";
                                                }while($recorrido = mysqli_fetch_array($Departamentos));           
                                            }
                                               ?>
                                            
                                          
                                            <tr>
                                            <td colspan="11">Seleccionar :   <input type="checkbox" onclick="marcar(this);" /> Todos| Ninguno </td> 
                                                      </tr>
                    
                        </table></div>
                          
                        
                    
                        
                            <!--INICIO DEL MODAL -->
                         <div class="container">
                            <div class="modal" tabindex="-1" id="modal1" >
                                <div class="modal-dialog modal-xlg  modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background:green;">
                                        <button class="close" data-dismiss="modal1">&times;</button>
                                          <h1 style="color: white;">Agregar una nueva organizacion</h1>
                                        </div>
                                          <div class="modal-body">
                                            
                                            <form id="Orga" class="formu" action="add_organizacion.php" method="post">
                                               
                                                <h1>Formulario para crear una organización de trabajo </h1>
                                                <br>
                                                <label for="name">Nombre :</label>
                                                <input  REQUIRED class="formu form-control" type="text" name="name" placeholder="Nombre">
                                                <br>
                                                <label  for="name">Correo electronico :</label>
                                                <input REQUIRED class="formu form-control" type="email" name="correo" placeholder="Email">
                                                <br>
                                                
                                                   <?php $E=mysqli_query($conexion,"SELECT * FROM estatus");
                                                echo "
                                                <label for='estatus'>Estatus :</label>
                                                
                                                <select  class='formu form-control'name='estatus' REQUIRED>";
                                                if ($E) {
                                                    while ($EST=mysqli_fetch_array($E)) {
                                                        echo"  <option value=" .$EST['idEstatus']. ">" .$EST['tipo']. "</option>";
                                                    }
                                                }
                                                
                                                  
                                                
                                                
                                                 echo "</select>"
                                                ?>
                                                <br>
                                                <label for="descri">Descripción :</label>
                                                <textarea class=" formu form-control"  name="descri" REQUIRED ></textarea>
                                                <br>
                                                <?php $E=mysqli_query($conexion,"SELECT * FROM usuario where id_rol!=3");
                                                echo "
                                                <label for='lider'>Líder :</label>
                                                
                                                <select  class='formu form-control'name='lider' REQUIRED>";
                                              
                                                if ($E) {
                                                    while ($EST=mysqli_fetch_array($E)) {
                                                        echo"  <option value=" .$EST['id_usuario']. ">" . $EST['nombre']. " " . $EST['apellidos'] . "</option>";
                                                    }
                                                }
                                                
                                                  
                                                
                                                
                                                 echo "</select>"?><br>  
                                                </div>
                                               <div class="modal-footer">
                                                <input class="btn btn-primary" type="submit" value="Crear ">
                                                <input class="btn btn-success" type="button" onclick="funcion_reiniciar('Orga');" value="Restablecer">
                                                <button class="btn btn-danger" data-dismiss="modal">Cancelar </button>
                                                
                                          </div>
                                                <!--dDepartamento	nombre	correo	tipo	idEstatu	descripcion	idusuLider-->
                                            </form>

                                       
                                        </div>
                                    </div>
                                </div>
                                     <!--FIN DEL MODAL -->
                            </div>
                        
                        
                    

                    <br>
                      
                   
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
