<?php
 
 include("../conexion.php");
 //Seguridad de sesiones paginacion
 
 session_start();
 
 $varsesion=$_SESSION['correo'];
 $n=$_GET['cod'];
 

$si= "SELECT *FROM usuario where correo ='$varsesion' and id_usuario = $n";
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
    <title>Directorio de usuarios </title>
 <link rel="stylesheet" href="../CSSAGENTE/Tareas.css">
  
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

    <link rel="stylesheet"    href="../CSSAGENTE/Users.css">
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
                        <h1 class="page-head-line">Directorio de usuarios</h1>
                    
                        
                    </div>


                </div>

                 
                <div >

                    <nav class="menu" style="background-color: red;">

                        <ul >
                            <li >
                            <?php echo "<a href='../USUARIOS/Usuario-directorio.php?cod=$n'> <strong>Directorio de usuarios</strong>  </a>"?>
                            
                            </li>
                            <li >
                            <?php echo "<a href='../USUARIOS/Organizaciones.php?cod=$n'>  Organizaciones </a>"?>
                       
                            </li>
                       
                        </ul>
                    </nav>
    
                    <!--Mi parte -->
                </div>
                <div>
                    <br>
                    <form  method="GET" action="BuscarUser.php" >
                        <div class="itemsmy">
                            <input  style="width: 55%;"  placeholder="Buscar" name="busqueda" class="form-control mr-sm-2 alin" type="text" REQUIRED>
            
                            <button placeholder="Buscar"class="btn btn-light" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                              <?php echo "<input type='hidden' name='id' value=$n >";?>
                    </form>
                        </div>
                           <br>
                          <br>
                            <br>

                            <form action="Bloquear.php" method="POST">

                            <input class="btn btn-danger" type="button" data-toggle='modal' data-target='#modal1' value="Añadir usuario">                     
                                      

                                                <?php
                                                $VERI="SELECT * FROM usuario WHERE id_rol=2 and id_usuario=$n";
                                                $PERMISO=mysqli_query($conexion, $VERI);
                                                $ARREGLA=0;
                                                if($PERMISO)
                                                {
                                                    $ARREGLA=mysqli_fetch_array($PERMISO);
                                                }

                                                $CONTENIDO=  "  <div class='btn-group'>
                                                <button class='btn dropdown-toggle btn-danger' data-toggle='dropdown' value='Más'>
                                                    Más
                                                <span class='caret'></span>
                                                </button>
                                                
                                                <ul class='dropdown-menu'>
                                                <!-- dropdown menu links -->
                                                <li class=><a href=''  data-toggle='modal' data-target='#modal2'> <span class='glyphicon glyphicon-plus-sign'></span> Agregar a la organización</a></li>  
                                                           <li class=><span style='margin-left:22px'class='glyphicon glyphicon-remove'></span> <input class='btn btn-link' style='text-decoration:none;'type='submit' value='Bloquear' name='Bloquear'></li>
                                                    <li class=><span style='margin-left:22px'class='glyphicon glyphicon-refresh'></span> <input class='btn btn-link' style='text-decoration:none;'type='submit' value='Desbloquear' name='Desbloquear'></li>
                                                    <li class=><span style='margin-left:22px;'class='glyphicon glyphicon-trash'></span> <input class='btn btn-link ' style='text-decoration:none;'type='submit' value='Eliminar' name='Eliminar'></li>
                                                    <li class=>  <span  style='margin-left:22px;'class='glyphicon glyphicon-log-in'></span><input class='btn  btn-link' style='text-decoration:none;'type='submit' value='Resetear contraseña' name='Resetear'></li>
                       
                                                </ul>
                                                </div>";
                                                if ($ARREGLA==NULL) {
                                                $CONTENIDO='';
                                                echo  $CONTENIDO;
                                                }
                                                else 
                                                {
                                                echo $CONTENIDO;
                                                    
                                                }
                                                ?>       

                                         <div class="dive">
                                        <table style="width:100%" class="tabla  ">
                                            <h3 style="text-align:center">Información de los usuarios</h3>
                                            <thead style="text-align:center;">
                                                <tr>
                                                    <th colspan="1">Seleccionar</th>
                                                    <th>Id</th>
                                                    <th>Estado</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Rol</th>
                                                    <th>Depa</th>
                                                    <th>Zona</th>
                                                    <th>Correo</th>
                                                    <th>Fecha de creación</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </thead>
 
                                            <?php           

                                                   $Consulta="SELECT DISTINCT u.id_usuario,e.tipo as estatus,u.nombre,u.apellidos,r.Tipo,x.nombre as depa ,u.id_zona,u.correo,u.fecha_creacion,u.foto from usuario u INNER JOIN rol r on u.id_rol = r.IdRol INNER JOIN estatus e ON u.id_estatus=e.idEstatus INNER JOIN departamento x ON x.idDepartamento=u.id_departamento ORDER BY u.fecha_creacion DESC LIMIT 0,250";
                                                $Usuarios= mysqli_query($conexion,$Consulta) or die ("Problemas al consultar");
                                                if ($Usuarios) {
                                                    
                                                    while ($recorrido = mysqli_fetch_array($Usuarios))
                                                    {
                                                        $Arreglo='Usuarios[]';
                                                        echo "<tr>";
                                                        $Arreglo2=  "<td>  <input type='checkbox' name='$Arreglo' value='" .$recorrido['id_usuario'] . "'></td>";
                                                        echo $Arreglo2;
                                                        echo "<td>" .  $recorrido['id_usuario'] . "</td>";
                                                        echo "<td>" .  $recorrido['estatus'] . "</td>";
                                                        echo "<td>" .  "<a href='Usuario-info.php?cod=$n&search=" . $recorrido['id_usuario'] ."'>"   . $recorrido['nombre'] ."</a>" . "</td>";
                                                        echo "<td>" .  $recorrido['apellidos'] . "</td>";
                                                        echo "<td>" .  $recorrido['Tipo'] . "</td>";
                                                        echo "<td>" .  $recorrido['depa'] . "</td>";
                                                        echo "<td>" .  $recorrido['id_zona'] . "</td>";
                                                        echo "<td>" .  $recorrido['correo'] . "</td>";
                                                        echo "<td>" .  $recorrido['fecha_creacion'] . "</td>"; ?>
<style>
      
  .foto{
  max-width:100px;
  max-height:100px;
  padding:0; 

  min-width:100px;
  min-height:100px;
  }
  
.dive{
 
 height:auto;
 width: 100%;
 overflow: hidden;
text-overflow: ellipsis;
 }
</style>
                                                            <td><img class="foto"  src="data:image/jpg;base64,<?php echo base64_encode($recorrido['foto']); ?>"/></td>
                                                               <?php
                                                                echo "</tr>";
                                                    }  
                                                }
                                                ?>

                                            
                                          
                                            <tr>
                                          
                                                 <td colspan="11">Seleccionar :   <input type="checkbox" onclick="marcar(this);" /> Todos| Ninguno </td> 
                                            </tr>
                    
                     
                                        </table>
                                        </div>
                            </form>
                        


                                        
                                                     <!--FIN DEL MODAL -->
    <!--INICIO DEL MODAL -->
                        <div class="container">
                            <div class="modal" tabindex="-1" id="modal1" >
                                <div class="modal-dialog modal-xlg  modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background: blue;">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                          <h1 style="color: white;">Agregar un nuevo usuario</h1>
                                        </div>
                                          <div class="modal-body">
                                            <form id="add"class="formu"  action="addUsuario.php" method="post">
                                                  <h1>Formulario para crear usuario nuevo </h1>
                                                <br>
                                                <label for="name">Nombre :</label>
                                                <input  REQUIRED class="formu form-control" type="text" name="name" placeholder="Nombre">
                                                <br>
                                                <label for="apellidos">Apellidos :</label>
                                                <input REQUIRED class=" formu form-control" type="text" name="apellidos" placeholder="Apellidos">
                                                <br>
                                                <label for="contraseña">La contraseña se debe resetear desde la lista de usuarios para seguridad del usuario</label>
                                                   <br>
                                                   <br>
                                                <label for="correo">Email :</label>
                                                <input  REQUIRED  class="formu form-control" type="email" name="correo" placeholder="Correo electronico">
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
                                                <?php $E=mysqli_query($conexion,"SELECT * FROM rol  where idrol !=2");
                                                echo "
                                                <label for='rol'>Rol:</label>
                                                
                                                <select  class='formu form-control'name='rol' REQUIRED>";
                                                if ($E) {
                                                    while ($EST=mysqli_fetch_array($E)) {
                                                        echo"  <option value=" .$EST['idRol']. ">" .$EST['Tipo']. "</option>";
                                                    }
                                                }
                                                 echo "</select>"
                                                ?>
                                                <br>
                                                <?php $E=mysqli_query($conexion,"SELECT nombre,idDepartamento From departamento");
                                                echo "
                                                <label for='departamento'>Departamento:</label>
                                                
                                                <select  class='formu form-control'name='departamento' REQUIRED>";
                                                if ($E) {
                                                    while ($EST=mysqli_fetch_array($E)) {
                                                        echo"  <option value=" .$EST['idDepartamento']. ">" .$EST['nombre']. "</option>";
                                                    }
                                                }
                                                 echo "</select>"
                                                ?>
                                                
                                                   <br>
                                                <label for="zona"> Zona : </label>
                                                <input REQUIRED class="form-control formu" type="number" name="zona" placeholder="Zona" value="0">
                                                <br>       
                                                <!--id_usuario	id_estatus	id_rol	nombre	apellidos	id_departamento	contraseña	correo	id_zona	fecha_creacion	fecha_actualizacion	
  -->                                      <div class="modal-footer">
                                                  <input class="btn btn-primary" type="submit" value="Crear usuario">
                                                <input class="btn btn-success"  onclick="funcion_reiniciar('add');"type="button" value="Restablecer">
                                                <button class="btn btn-danger" data-dismiss="modal">Cancelar </button>

                                          </div>
                                            </form>

                                        </div>
                                              
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


    <div class="container">
                                            <div class="modal" tabindex="-1" id="modal2" >
                                                <div class="modal-dialog modal-xlg  modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background: yellow;">
                                                        <button class="close" data-dismiss="modal2">&times;</button>
                                                          <h1 style="color: white;">Agregar miembro a un equipo </h1>
                                                        </div>
                                                          <div class="modal-body">
                                                            
                                                            <form id="teams" class="formu" method="post" action="add_userEquipo.php" >
                                                                
                                                                <h1>Formulario para dar miembros a un equipo</h1>
                                                                <br>
                                                                <label for="clave">Usuario:</label>
                                                    <select class='form-control' name="clave">
                                                                <?php
                                                                $TRABAJ=mysqli_query($conexion,"SELECT * FROM usuario WHERE id_rol!=2");
                                                    if ($TRABAJ) {
                                                        while ($TRABAJA3=mysqli_fetch_array($TRABAJ)) {
                                                            echo "<option   value='". $TRABAJA3['id_usuario']."'>". $TRABAJA3['nombre'] .  " " . $TRABAJA3['apellidos'] . "</option>";
                                                        }
                                                    }
                                                    ?>  
                                                    </select>
                                                    
                                                    <br>
                                                                <label for="clave2">Equipo:</label>
                                                    <select class='form-control' name="clave2">
                                                    
                                                    <?php 
                                                    $TRABAJA=mysqli_query($conexion,"SELECT * FROM equipo where idEquipo!=894");
                                                    if ($TRABAJA) {
                                                        while ($TRABAJA2=mysqli_fetch_array($TRABAJA)) {
                                                            echo "<option   value='". $TRABAJA2['idEquipo']."'>". $TRABAJA2['nombre'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                        
                                                </select>
                                                
                                                                
                
                                                                <!--id_usuario	id_estatus	id_rol	nombre	apellidos	id_departamento	contraseña	correo	id_zona	fecha_creacion	fecha_actualizacion	
                  -->                                      <div class="modal-footer">
                                                                <input class="btn btn-warning" type="submit" value="Agregar miembro">
                                                                <input class="btn btn-success"  onclick="funcion_reiniciar('teams');" type="button" value="Restablecer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Cancelar </button>
                
                                                          </div>
                                                            </form>
                
                                                        </div>
                                                              
                                                        </div>
                                                    </div>
                                                </div>
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
