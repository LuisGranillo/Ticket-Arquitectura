<?php
 
 include("../conexion.php");
 
 //Seguridad de sesiones paginacion
 
 session_start();

 $n=$_GET['cod'];

$si= "SELECT * FROM usuario WHERE id_usuario = $n";
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
    <title>Panel del administrador</title>

 
    <link href="/UTP/ADMINISTRADORES/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/custom.css" rel="stylesheet" />
    <link href="/UTP/ADMINISTRADORES/CRUD/TAREAS/css_tareas/mensajeria.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet"   href="/UTP/AGENTE/CSSAGENTE/Tareas.css">
<link rel="stylesheet" href="../CSSAGENTE/estilos_panel.css">
</head>
<body>
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
                          
                              <td><img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"/></td>
                                        
                         
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
                                                                <?php echo "   <a href='../Roles/Roles.php?cod=$n'><i class='fa fa-hand-o-up'  aria-hidden='true'></i>Roles</a>";?>
                   
                            </li>
                            <li>
                                                                <?php echo "   <a href='../ESTATUS/Estatus.php?cod=$n'><i class='fa fa-cog' aria-hidden='true'></i>Estatus</a>";?>
                   
                            </li>
                             <li>
                             <?php echo "<a href='../MIEMBROS/Miembros.php?cod=$n'><i  class='fa fa-hand-o-left' aria-hidden='true'></i>Miembros de equipos</a>";?>
                     
                            </li>                            
                            <li>
                            <?php echo "<a href='tareas.php?cod=$n'>"?><i class="fa fa-tasks" aria-hidden="true"></i>TAREAS</a>

                            </li>
                           
                        </ul>
                    </li>                    

        </nav>
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-head-line"> <center> BIENVENIDO ADMINISTRADOR</center></h1>
                            
                            <table>
                            <?php
                            include ("../conexion.php");
      
      $mensajeria="SELECT*FROM enviocorreo";
 $cor=$conexion->query($mensajeria);
 while ($email=$cor->fetch_assoc()) {

 ?>
 <thead>
    <tr>
      <th>Correo electrónico de mensajeria</th>

    </tr>
  </thead>
  <tbody>
    
    <tr>
    
      <td data-column="First Name"><?php echo $correos=$email['correo']; } ?></td>
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


  <a data-toggle="modal" data-target="#largeModal" class="editInfo">
    <i class="icon-pencil">Editar</i> </td>

</a>  
  </tr>
  </tbody>
</table>
<center><h2>Control administrativo sobre el envio de correo de mensajeria.</h2></center>
<img src="https://sites.google.com/site/loupvinrodriguez/_/rsrc/1448582874464/home/UTP.jpg" width="500" height="500">
<img src="https://acegif.com/wp-content/gif/beaver-72.gif";

<!-- This template is a working example of a pop text editor with bootstrap 4 and summernote -->
<div class="row mb-4">
    <div class="col text-center">
    </div>
  </div>  
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"> 
        <h4 class="modal-title" id="myModalLabel"><center>Editar correo electrónico</center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <center>
    <form action="mensajeria_act.php" method="POST">
      <label for="">Ingrese un correo electrónico</label><br>
      <input name="correo_actualizar"type="text" value="<?php echo $correos;?>"style="WIDTH: 228px; HEIGHT: 98px"
size=32 name=text1> 
      <br>
<br>
<label for="">Ingrese la contraseña actual</label>
<br>
<br>
<input type="text" name="contraseña_actual">
<input name="id_usuario" type="hidden" value="<?php echo $n ?>" />

<br>
<br>
      <label for="">Ingrese la contraseña del correo electrónico que se va usar</label><br>
      <input type="text">
      <br>
<img src="https://www.gifss.com/profesiones/carteros/cartero-09.gif" alt="">
      </div>
      </center>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="hidden" class="btn btn-primary">Aplicar cambios</button>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
$('#summernote').summernote({
        placeholder: 'Edit this email...',
        tabsize: 2,
        height: 100
      });
</script>

                        </div>
                    </div>
                    <!-- /. ROW  -->                
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        <!-- /. NAV SIDE  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="/UTP/ADMINISTRADORES/assets/js/custom.js"></script>


</body>
</html>
