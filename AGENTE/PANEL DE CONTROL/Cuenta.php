<?php
 
 include("../conexion.php");
 //Seguridad de sesiones paginacion
 
 session_start();
 
 $varsesion=$_SESSION['correo'];
 $n=$_GET['cod'];


$si= "SELECT * FROM usuario WHERE correo ='$varsesion' AND id_usuario = $n";
$si2=mysqli_query($conexion,$si);
if($si2)
{

    $fin=mysqli_fetch_array($si2);

$id=$fin['id_usuario'];
  
 if( $id==null )
 {   
      header("location:../cerrar_sesion.php");
 }
else{
 ob_start();   
}
}
 

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi cuenta</title>

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
    <link rel="stylesheet"    href="../CSSAGENTE/Tareas.css">
    <script type="text/javascript" src="./AGENTE/js/mostrar.js"></script>
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
                        <?php
                               $query="SELECT*FROM usuario WHERE id_usuario='$n'";
                            $resultado=$conexion->query($query);
                            $r=$conexion->query($query);
                            if ($r) {
                                while ($row=$resultado->fetch_assoc()) {
                                    ?>
                          
                              <td><img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']); ?>"/></td>
                                        
                         
                         </tr>
                         <?php
                         
                             
                               echo "<br>";
                                    echo "<p style='color:white;'> Bienvenido " .   ($row['nombre']);
                                    echo "<br>";
                                    echo($row['apellidos'] . "</p>");
                                }
                            }

                            if ($r) {
                                $datos= mysqli_fetch_array($r);
                            }
                              ?> 
                        </div>
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
                    <div class="col-md-12 ">
                        <h1 class="page-head-line"> <span class="glyphicon glyphicon-user"> <?php echo $datos['nombre'];?> </h1>
                    
                        
                    </div>


                </div>

                <div>
                    <br>
                    
                          

    <!--INICIO DEL MODAL -->
                       
                            </div>
                        


                    

                    <br>

          
                        <div class="tab-content">
                        <td><img style="margin-bottom: 5%; margin-left:5%; margin-right: 5%;" class="foto" width="100px"  src="data:image/jpg;base64,<?php echo base64_encode($datos['foto']);?>"/></td>                        
                            <div class="active tab-pane" id="personal">
                                
                                    <table class="table" style="display: table;">
                                        <tbody>	    
                                          <tr>
                                               <td><b>Nombre:</b></td>
                                               <td><?php echo $datos['nombre']?></td>
                                           </tr>
                                           <tr>
                                               <td><b>Apellidos:</b></td>
                                               <td><?php echo $datos['apellidos']?></td>
                                           </tr>
                                           <tr>
                                               <td><b>Correo electronico :</b></td>
                                               <td><?php echo $datos['correo']?><td>
                                           </tr>
                                          
                                           <tr>
                                             <td><b>Número de teléfono :</b></td>
                                             <td><?php echo $datos['Telefono_casa']?></td>
                                                 
                                               
                                           </tr>
                                           
         

                                             <tr>
                                                 <td><b>Número de móvil :</b></td>
                                                   <td><?php echo $datos['Telefono_celular']?></td>
                                                   
                                               </tr>

                                             
                                            <?php
                                   
                                              $id_estatus="SELECT tipo from estatus where idEstatus = $datos[id_estatus] ";
                                              $Estatus2=mysqli_query($conexion,$id_estatus);
                                              foreach ($Estatus2 as  $E) {
                                                  echo"
                                                  <tr>
                                                <td><b>Estatus:</b></td>
                                                <td> ". $E['tipo'] ."<td>
                                                </tr>";
                                              }
                                  
                                              

                                              $id_zona="SELECT * from zona_horaria ";
                                              $zona2=mysqli_query($conexion,$id_zona);
                                              if ($zona2) {
                                                  $Zonafin=mysqli_fetch_array($zona2);
                                              }
                                            ?>
                                             

                                           <tr>
                                           <?php
                                              $id_rol="SELECT  Tipo From rol where idRol = $datos[id_rol]";
                                              $Rol2= mysqli_query($conexion,$id_rol);
                               
                                              foreach ($Rol2 as  $IdAlumno) {
                                                echo"
                                                <td><b>Rol:</b></td>
                                                <td> ". $IdAlumno['Tipo'] ."<td>";
                                            }
                                              
                                                
                                             
                                
                                               ?>
                                           </tr>
                                                <?php
                                                $id_depa="SELECT * from departamento where idDepartamento =". $datos['id_departamento'] ;
                                                $Depa2=mysqli_query($conexion,$id_depa);
                                                  foreach($Depa2 as $D)
                                                  {
                                                      echo " <tr>
                                                      <td><b>Departamento :</b></td>
                                                      <td>". $D['nombre'] ."<td>
                                                        
                                                    </tr>";
                                                      
                                                  }
                                                
                                                ?>

                                           

                                           <tr>
                                             <td><b>Te uniste el :</b></td>
                                             <td><?php echo $datos['fecha_creacion']?><td>
                                               
                                           </tr>

                                               <td colspan="2"><h3 class="box-title">Autenticación</h3></td>
                                           </tr>
                                           <tr>
                                               <td><i class="fa fa-book margin-r-5"></i> Clave:</td>
                                               <td><span class="label label-success"><?php echo $datos['id_usuario']?></td>
                                           </tr>
                                           <tr>
                                               <td><i class="fa fa-file-text-o margin-r-5"></i> Contraseña:</td>
                                               <td> <button class="btn btn-success"  data-toggle='modal' data-target='#modal3' > Cambiar contraseña</button>
                                               </td>
                                           </tr>

                                           <tr>
                                            <td><i class="fa fa-user">¿Deseas actualizar alguno de tus datos ?</i></td>
                                             <td><button class="btn btn-info" data-toggle='modal' data-target='#actualizar'>Actualizar</button></td>
                                           
                                           </tr>

                                           <tr>
                                            <td><i class="fa fa-photo">¿Deseas actualizar tu foto de perfil ?</i></td>
                                             <td><button class="btn btn-dark" data-toggle='modal' data-target='#perfil'>Actualizar foto</button></td>
                                           
                                           </tr>
                                           
                                                               <tr>
                                               <td colspan="2"><h3 class="box-title">Estado y configuración</h3></td>
                                              <form method="post" action="../PANEL DE CONTROL/Vacaciones.php">
                                                               <tr>
                                               <td><i class="fa fa-phone margin-r-5"></i> Modo vacaciones:</td>
                                          <?php      echo "<td>  <input type='checkbox' name='Usuarios[]' value='" .$datos['id_usuario'] . "'></td>";
                                                    ?>
                                           </tr>
                                          
                                                             </tbody>
                                         </table>
                                         <div class="md-form" style="padding-left: 27%;">
                                              <?php echo " <input type='hidden' name='vacio' value=$n>" ?> 
                                                <input style="margin-left: 2%;" class="btn btn-warning" name ="Vacaciones" type="submit" value="Guardar cambios">
                                                <input style="margin-left: 2%;"class="btn btn-success" type="button" value="Restablecer">
                                                <button style="margin-left: 2%;"class="btn btn-danger" data-dismiss="modal"> <a style="color:white" href="Usuario-directorio.html">Cancelar</a></button>

                                            </form>
                                               
                                          
                                        </div> 
                                
                            
                            </div>



                    </div>




                                      <div class="container">
                                      <div class="modal" tabindex="-1" id="actualizar">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header" style=" background:black;">
                                                                      
                                                            <h2 style="text-align:center;  color:white;" class="modal-title">Actualizar información de <?php echo  $datos['nombre']?></h2>
                                                        
                                                                                                                  </div>
                                                        <div class="modal-body">
                                                           <form class="formu "method="post" action="actualizar.php"  >
                                                           <label for="n">Nombre: </label>
                                                           <?php echo "<input  class='form form-control'type='text' name='n' value='". $datos['nombre'] . "'>"?>
                                                           <br>
                                                           <label for="a">Apellidos: </label>
                                                           <?php echo "<input  class='form form-control' type='text' name='a' value='". $datos['apellidos'] . "'>"?>
                                                           <br>
                                                            
                                                           <label for="e">Correo: </label>
                                                           <?php echo "<input type='text'  class='form form-control' name='e' value='". $datos['correo'] . "'>"?>
                                                           <br>
                                                            <label for="t">Teléfono de casa: </label>
                                                           <?php echo "<input type='tel' name='t'  class='form form-control'  value='". $datos['Telefono_casa'] . "'>"?>
                                                           <br>
                                                           <label for="nc">Número de celular: </label>
                                                           <?php echo "<input  class='form form-control' type='tel' name='nc' value='". $datos['Telefono_celular'] . "'>"?>
                                                           <br>
                                                           <?php echo "<input type='hidden' name='id' value='$n'>"?>
                                                           <br>
                                                                        
                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                      </div>
                                                  
                    
                                   <!--ACTUALIZAR FOTO MODAL-->   


                                   <div class="container">

                                                                        <div class="modal" tabindex="-1" role="dialog" id="perfil">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header" style="background:red; text-align:center;">
                                                <h2 style="color:white;" class="modal-title">Elige la foto  </h2>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="update_foto.php" enctype="multipart/form-data">
                                                        <label for="imagen">Foto: </label>
                                                                <input  class="form form-control" type="file" REQUIRED name="imagen" accept="image/*"   onchange="loadFile(event)">
                    
                                                                <br>
                                                                <?php echo "<input type='hidden' name='id' value='$n'>"?>
                                                                <br>
                                                
                                                
                                                 
                                           
                                              
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                  
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                   </div>

                                   <!--Fin del modal foto -->
                            <!--INICIO DEL MODAL -->
                         <div class="container">
                            <div class="modal" tabindex="-1" id="modal3" >
                                <div class="modal-dialog modal-xlg  modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background:gold;">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                          <h1 style="color: white;">Confirma tu contraseña actual  e introduce una nueva para continuar</h1>
                                        </div>
                                          <div class="modal-body">
                                            
                                            <form id="password" class="formu" method="post" action="update_password.php">
                                                 
                                                
                                                <label for="antiguo">*</label>
                                                <input  class="formu form-control" type="password" minlength="8"  placeholder="Contraseña actual" name="antiguo">
                                                <br>
                                                <label for="nueva">Introduce una nueva contraseña :</label>
                                                <input type="password" minlength="8" class=" formu form-control"  name="nueva" placeholder="Nueva contraseña">
                                                <br>
                                                <label for="nueva2">*</label>
                                                <input type="password" minlength="8" class="formu form-control" name="nueva2" placeholder="Confirmar contraseña">
                                                <br>
                                               <?php echo" <input name='Usuario' type='hidden' value=$n>"?>
                                                <br>
                                                    
                                               <!--dDepartamento	nombre	correo	tipo	idEstatu	descripcion	idusuLider-->
                                            
                                        </div>
                                               <div class="modal-footer">
                                                <input class="btn btn-warning"  type="submit" value="Guardar cambios">
                                                <input class="btn btn-success"   onclick="funcion_reiniciar('password');" type="button" value="Restablecer">
                                                <button class="btn btn-danger" data-dismiss="modal">Cancelar </button>
                                          </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                                     <!--FIN DEL MODAL -->
                      
                    
                    <h4>Pagina:[1] <a  class="enlaces" href="">Exportar</a></h4>
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
