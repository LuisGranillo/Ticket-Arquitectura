<?php
 
 include("../conexion.php");
 
 //Seguridad de sesiones paginacion
 
 session_start();

 $varsesion=$_SESSION['correo'];
 $n=$_GET['cod'];
 $Busqueda= $_GET['busqueda'];

 
 if(empty($Busqueda) or $Busqueda=='')
 {
     header("location:Usuarios.php?cod=$n");
 }

$si= "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $n";
$si2=mysqli_query($conexion,$si);
$fin=mysqli_fetch_array($si2);

$id=$fin['id_usuario'];
if( $id==null )
    {   
         header("location:/UTP/ADMINISTRADORES/cerrar_sesion.php");
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
    <title>Buscar usuarios</title>

 
    <link href="/UTP/ADMINISTRADORES/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  
 
<link rel="stylesheet" href="/UTP/ADMINISTRADORES/CSSADMIN/TABLAGRID.css" type='text/css'/> 
  
   
<script type="text/javascript" src="/UTP/AGENTE/js/LimpiarLlenar.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </head>
<body>
    <style>
          .formu{
        margin-bottom:2.5%;
        margin-top:2.5%;
        
       align-items:center;
       justify-content:center;
       text-align:center;
   }


   .itemsmy{
    float:  left; /* esto nos posiciona todas las cajas hacia la izquierda */
   display: inline-flex;
   
    
   }
    </style>
    <div id="wrapper" >
        <nav   class="navbar navbar-default navbar-cls-top " role="navigation" style="background:#771e37; margin-bottom: 0">
            <div   class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">UTP</a>
                <img src="/UTP/ADMINISTRADORES/assets/img/oficial-logo.png" class="img-thumbnail" width="75px" />
            </div>
            
            <div class="header-right">
            <?php echo "<a style='color:white;'href='/UTP/AGENTE/PANEL DE CONTROL/panel_control.php?cod=$n'>";?> Panel Agente</a>   | <a style="color:white;"href="/UTP/ADMINISTRADORES/cerrar_sesion.php">Cerrar sesión</a>
     </div>

  
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div style="background:#771e37" class="user-img-div">
                        <center>
                        <?php
                            
                            $query="SELECT*FROM usuario WHERE id_usuario='$n'";
                            $resultado=$conexion->query($query);
                            while($row=$resultado->fetch_assoc()){
                          ?>
                          
                              <td><img  style="  border-radius: 1em;" id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"/></td>
                                        
                         
                         </tr>
                         <?php
                         
                             
                               echo "<br>";
                              echo "<p style='color:white;'> Bienvenido " .   ($row['nombre']);
                              echo "<br>";
                              echo ($row['apellidos'] . "</p>");
                              }
                              ?> 
                              <center>
                        </div>

                    </li>

      
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Informacion solo para administradores <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                         <li>
                       <?php echo "   <a href='../USUARIO/Usuarios.php?cod=$n'><i class='fa fa-user' aria-hidden='true'></i>Usuarios</a>";?>
                            </li>
                            <li>
                                                                <?php echo "   <a href='../ORGANIZACIONES/departamentos.php?cod=$n'><i class='fa fa-building' aria-hidden='true'></i>Departamentos</a>";?>
                   
                            </li>
                            <li>
                                                                <?php echo "   <a href='../EQUIPOS/Equipos.php?cod=$n'><i class='fa fa-comments' aria-hidden='true'></i>Equipos</a>";?>
                   
                            </li>
                            <li>
                                                                <?php echo "   <a href='../ROLES/Roles.php?cod=$n'><i class='fa fa-hand-o-up'  aria-hidden='true'></i>Roles</a>";?>
                   
                            </li>
                            <li>
                                                                <?php echo "   <a href='../ESTATUS/Estatus.php?cod=$n'><i class='fa fa-cog' aria-hidden='true'></i>Estatus</a>";?>
                   
                            </li>
                             <li>
                             <?php echo "<a href='../MIEMBROS/Miembros.php?cod=$n'><i  class='fa fa-hand-o-left' aria-hidden='true'></i>Miembros de equipos</a>";?>
                     
                            </li>                            
                            <li>
                            <?php echo "<a href='../TAREAS/tareas.php?cod=$n'>"?><i class="fa fa-tasks" aria-hidden="true"></i>TAREAS</a>

                            </li>
                            <li>
                        <a href="../TEMA/Temas.php?cod=<?php echo $n?>"><i class="bi bi-clipboard-plus"></i>Temas</a>
                    </li>                  
                    <li>
                        <a href="../ZONA/Zonas.php?cod=<?php echo $n?>"><i class="bi bi-globe"></i>Zonas</a>    
                    </li>
                    <li>
                        <a href="../PREGUNTAS/Preguntas.php?cod=<?php echo $n?>"><i class="bi bi-menu-button-fill"></i>Preguntas</a>
                    </li>
                    <li>
                        <a href="../CATEGORIAS/Categorias.php?cod=<?php echo $n?>"><i class="bi bi-grid-3x3-gap-fill"></i>Categorias</a>
                    </li>
                    <li>
                        <a href="../TICKETS/Tickets.php?cod=<?php echo $n?>"><i class="bi bi-palette2"></i>Tickets</a>
                    </li>
                        </ul>
                    </li> 
        </nav>


        
        <!--Contenido aqui habia un form !-->
                  <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="page-head-line"> USUARIOS</h1>
                        <form  method="GET" action="Buscar.php" >
                        <div class="itemsmy">
                            <input  style="width: 55%;"placeholder="Buscar" name="busqueda" class="form-control mr-sm-2 alin" type="text" value="<?php echo $Busqueda?>">
            
                            <button placeholder="Buscar"class="btn btn-light" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                              <?php echo "<input type='hidden' name='cod' value=$n >";?>
                    </form>
                        </div>
                        </div>


                        
                    </div>
                    <!-- /. ROW  -->    
                    <br>
                    
                    <form method="POST" action="/UTP/AGENTE/TAREAS/DELETEMUCH.php">
                              <div class='btn-group'>
                                                <button class='btn dropdown-toggle btn-danger' data-toggle='dropdown' value='Más'>
                                                    Más
                                                <span class='caret'></span>
                                                </button>
                                                <ul class='dropdown-menu'>
                                                <!-- dropdown menu links -->
                                                         <li class=><span style='margin-left:22px'class='glyphicon glyphicon-user'></span>  <input class="btn btn-link" style='text-decoration:none;' type="button" data-toggle='modal' data-target='#modal1' value="Nuevo usuario"> </li>
                                                  
                                                        <li class=><span style='margin-left:22px;'class='glyphicon glyphicon-trash'></span> <input class='btn btn-link ' style='text-decoration:none;'type='submit' value='Eliminar' name="Eliminar"></li>
                                                    
                                                    
                                                          
                                                </ul>
                                                </div>
                     
                     
                   
  <br>
  <br>
                              <div class="dive">
                              <table id="tabla" class="table table-dark">
                                  <thead class="thead-dark">

                                  <tr>
                                      <th> </th>
                                      <th>Actualizar</th>
                                      <th>Eliminar</th>
                                     <th scope="col">Clave</th>
                                     <th scope="col">Estatus</th>
                                     <th scope="col">Rol</th>
                                     <th scope="col">Nombre</th>
                                     <th scope="col">Correo</th>
                                     <th scope="col">Departamento</th>
                                     <th scope="col">Creado</th>
                                     <th scope="col">Celular</th>
                                     <th scope="col">Foto</th>
                                     
                                    </tr>

                                  </thead>
                         
                                  <tbody>

                                  
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

             $estatus= '';
             if($Busqueda =='Activo' or $Busqueda =='ACTIVO')
             {
                 $estatus= "OR id_estatus like '%3'";
             }
             if($Busqueda =='Bloqueado' or $Busqueda =='BLOQUEADO')
             {
                 $estatus= "OR id_estatus like '%2'";
             }
             else   if($Busqueda =='Vacaciones' or $Busqueda =='VACACIONES')
             {
                 $estatus= "OR id_estatus like '%4'";
             } 


 $USUARIOS = mysqli_query($conexion,"SELECT DISTINCT u.id_usuario ,u.foto,u.nombre as user,u.apellidos,u.correo,u.fecha_creacion,u.Telefono_celular, u.Telefono_casa as casa ,e.tipo AS Estatus,r.Tipo, d.nombre FROM usuario u INNER JOIN estatus e ON u.id_estatus=e.idEstatus INNER JOIN rol r on r.idRol=u.id_rol INNER JOIN departamento d on d.idDepartamento= u.id_departamento
  WHERE (u.id_usuario LIKE '$Busqueda' 
  or  u.nombre LIKE '%$Busqueda%' 
  or u.correo LIKE '%$Busqueda%'
   or u.Telefono_casa Like '%$Busqueda%'
 or u.Telefono_celular Like '%$Busqueda%'
  or u.apellidos Like '%$Busqueda%'
   $rol  $estatus) ORDER BY u.fecha_creacion DESC LIMIT 0,250");
                           if ($USUARIOS) {
                               while ($row=mysqli_fetch_array($USUARIOS)) {
                                          
                                                    echo "<tr>";
                                                    echo "<td>  <input type='checkbox' name='Usuarios[]' value='" .$row['id_usuario'] . "'></td>";
                                                ?>
                                                                        
                                       <?php echo "<td><button  type='button' class='editbtn' data-toggle='modal' data-target='#editar'> <img style='max-width:50px;'src='/UTP/ADMINISTRADORES/imagenes/update.jpg'/></button></td>"; ?>
                                      <?php echo "<td> <button type='button' class='dropbtn' data-toggle='modal' data-target='#pregunta'><img style='max-width:50px;'src='/UTP/ADMINISTRADORES/imagenes/deletes.png'/></button></td>";?>
                                      
                                       
                                       <?php echo "<td scope='row'> ". $row['id_usuario'] . "</td>";?>
                                      <?php echo "<td> ". $row['Estatus'] . "</td>";?>
                                        <?php echo " <td>" .  $row['Tipo'] . "</td>";?>
                                      <td><?php echo $row['user'] . " " . $row['apellidos']; ?></td>
                                      <td><?php echo $row['correo']; ?></td>
                                      <td><?php echo $row['nombre']; ?></td>
                                      <td><?php echo $row['fecha_creacion']; ?></td>
                                      <td><?php echo $row['Telefono_celular']; ?></td>
                                      <?php  echo '<td><img style="max-width:50px;" src="data:image/jpeg;base64,'.base64_encode(($row['foto'])) .' "/></td>';?>
                                      <td style="visibility:hidden;"><?php echo $row['casa'];?></td>
                                      <?php   echo "</tr>";
                               }
                           }?>
                           <tr style="align-items:center; justify-content:center;">
                                          
                                          <td colspan="13">Seleccionar :   <input type="checkbox" onclick="marcar(this);" /> Todos| Ninguno </td> 
                                     </tr>
             

                              
                                  </tbody>




                              </table>
                              </form>
                              </div>
                       

                    
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        <!-- /. Aqui acababa el form -->
        <!-- /. NAV SIDE  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


    <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div  style="background:blue; color:white; text-align:center"  class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Editar usuario</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../USUARIO/udpate.php" method="post">
                                                    <input type="hidden" name="matricula" id="update_id" >
                                                    <label style="color:red;"> Si desea cambiar el estatus, rol o departamento elija una opción según corresponda, de lo contrario deje la opción vacia</label>
                                                       
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre:</label>
                                                        <input type="text" id="nombres" name="nombre" readonly="readonly" class="form-control"> 
                                                    </div>
                                                    
                                                   <div class="form-group">
                                                   <label>Actualmente su estatus es: </label>
                                                        <?php echo "<input type='text'  readonly='readonly' class='form-control' id='esta'  >";?>
                                                         <br>
                                                        <label for="d1">Estatus:</label>
                                                        
                                                        
                                                          <select  class="form-control" name="e1">
                                                        <option >
                                                                    <td style="visibility:hidden" id="esta"></td>
                                                        </option>

                                                         <?php
                                                         
                                                          $Esta=mysqli_query($conexion,"SELECT * FROM estatus");
                                                       
                                                          while($E=mysqli_fetch_array($Esta))
                                                          {
                                                             echo '<option value=' .  $E['idEstatus'] . '>'. $E['tipo'] . "</option>";
                                                          }

                                                         ?>
                                                         
                                                        </select>
                                                       
                                                    </div> 


                                                    <div class="form-group">
                                                    <label>Actualmente su Rol es: </label>
                                                        <?php echo "<input type='text'  readonly='readonly' class='form-control' id='roles'  >";?>
                                                         <br>
                                                        <label for="d1">Roles:</label>
                                                        
                                                        
                                                          <select  class="form-control" name="r1">
                                                        <option >
                                                                    <td style="visibility:hidden" id="roles"></td>
                                                        </option>

                                                         <?php
                                                         
                                                          $Esta=mysqli_query($conexion,"SELECT * FROM rol");
                                                       
                                                          while($E=mysqli_fetch_array($Esta))
                                                          {
                                                             echo '<option value=' .  $E['idRol'] . '>'. $E['Tipo'] . "</option>";
                                                          }

                                                         ?>
                                                         
                                                        </select>
                                                       
                                                    </div> 


                                                    <div class="form-group">


                                                    <label>Actualmente su departamento es: </label>
                                                        <?php echo "<input type='text'  readonly='readonly' class='form-control' id='depas'  >";?>
                                                            <br>
                                                        <label for="d1">Departamentos:</label>
                                                        
                                                        
                                                          <select  class="form-control" name="d1">
                                                        <option >
                                                                    <td style="visibility:hidden" id="depas"></td>
                                                        </option>



                                                         <?php
                                                         
                                                          $Esta=mysqli_query($conexion,"SELECT * FROM departamento");
                                                       
                                                          while($E=mysqli_fetch_array($Esta))
                                                          {
                                                             echo '<option value=' .  $E['idDepartamento'] . ">". $E['nombre'] . "</option>";
                                                          }

                                                         ?>
                                                         
                                                        </select>
                                                             <br>
                                                       
                                                       
                                                    </div> 


                                                    <div class="form-group">
                                                        <label for="correo">Correo:</label>
                                                        <input type="text" id="correos"  readonly="readonly"name="correo" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="local">Teléfono local:</label>
                                                        <input type="text" id="locales" readonly="readonly" name="local" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="movil">Número celular</label>
                                                        <input type="text" id="moviles" readonly="readonly" name="movil" class="form-control"> 
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                      <button type="submit" class="btn btn-success">Guardar cambios</button>
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                      </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="container">
                            <div class="modal" tabindex="-1" id="modal1" >
                                <div class="modal-dialog modal-xlg  modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background: blue;">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                          <h1 style="color: white;">Agregar un nuevo usuario</h1>
                                        </div>
                                          <div class="modal-body">
                                            <form id="add"class="formu"  action="/UTP/AGENTE/USUARIOS/addUsuario.php" method="post">
                                                  <h1>Formulario para crear usuario nuevo </h1>
                                                <br>
                                                <label for="name">Nombre :</label>
                                                <input REQUIRED  class="formu form-control" type="text" name="name" placeholder="Nombre">
                                                <br>
                                                <label for="apellidos">Apellidos :</label>
                                                <input REQUIRED  class=" formu form-control" type="text" name="apellidos" placeholder="Apellidos">
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
                                                
                                                <select REQUIRED  class='formu form-control'name='estatus'>";
                                                if ($E) {
                                                    while ($EST=mysqli_fetch_array($E)) {
                                                        echo"  <option value=" .$EST['idEstatus']. ">" .$EST['tipo']. "</option>";
                                                    }
                                                }
                                                
                                                
                                                 echo "</select>"
                                                ?>
                                                <br>
                                                <?php $E=mysqli_query($conexion,"SELECT * FROM rol ");
                                                echo "
                                                <label for='rol'>Rol:</label>
                                                
                                                <select REQUIRED  class='formu form-control'name='rol'>";
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
                                                
                                                <select REQUIRED  class='formu form-control'name='departamento'>";
                                                if ($E) {
                                                    while ($EST=mysqli_fetch_array($E)) {
                                                        echo"  <option value=" .$EST['idDepartamento']. ">" .$EST['nombre']. "</option>";
                                                    }
                                                }
                                                 echo "</select>"
                                                ?>
                                                
                                                   <br>
                                                <label for="zona"> Zona : </label>
                                                <input  class="form-control formu" type="number" REQUIRED name="zona" placeholder="Zona" value="0">
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

                                            <!--
                                                Pregunta
                                            -->

                                            
<!-- Button trigger modal -->
 

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="pregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div style="text-align:center; background: blue; color:white;" class="modal-header">
                                                                <h3 class="modal-title" id="exampleModalLabel">¿Estás seguro de que deseas elminar a este usuario (Todo lo que este relacionado a él se eliminara de forma permanente)?</h3>
                                                            
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                            </div>
                                                            <div style="align-items:center; justify-content:center;"class="modal-footer">
                                                                <center>
                                                                <form method="post" action ="/UTP/AGENTE/TAREAS/eliminar.php">
                                                                                    
                                                                    <input type="hidden" id="borrar_id" name="ide">        
                                                                    <button type="submit" name="Eliminar" class="btn btn-success">SI</button>
                                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">NO</button>
                                                                
                                                                </form>
                                                                
                                                                </center>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                            <script>
                                                    $('.editbtn').on('click',function () {
                                                      $tr=$(this).closest("#tabla tbody tr");
                                                      var datos=$tr.children("#tabla tbody td").map(function() {
                                                         return $(this).text(); 
                                                      });
                                                      $("#update_id").val(datos[3]);
                                                      $("#nombres").val(datos[6]);
                                                      $('#esta').val(datos[4]);
                                                      $('#roles').val(datos[5]);
                                                      $('#correos').val(datos[7]);
                                                      $('#depas').val(datos[8]);
                                                      $('#locales').val(datos[12]);
                                                      $('#moviles').val(datos[10]);
                                                    });

                                                    $('.dropbtn').on('click',function () {
                                                      $tr=$(this).closest("#tabla tbody tr");
                                                      var datos=$tr.children("#tabla tbody td").map(function() {
                                                         return $(this).text(); 
                                                      });
                                                      $("#borrar_id").val(datos[3]);
                                                       
                                                    });
                                            </script>
    <script src="/UTP/ADMINISTRADORES/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/custom.js"></script>
   

                                                        <!-- Button trigger modal -->
                                          
                                            <!-- Modal -->
                                          
                                            
                                          
</body>
</html>
