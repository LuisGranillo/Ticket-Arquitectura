<?php
$busqueda=$_POST['usuarios'];
$id_cola=$_POST['id_cola'];
$idTarea=$_POST['idTarea'];
$n=$_POST['codigos'];
 
include("conexion4.php");

 /* crear la conexión */

 
 //Seguridad de sesiones paginacion
 
 session_start();

 $varsesion=$_SESSION['correo'];

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

  include("conexion4.php");
  $query="SELECT*FROM  usuario WHERE nombre='$busqueda' OR correo='$busqueda' OR Telefono_casa='$busqueda' OR Telefono_celular='$busqueda' OR apellidos='$busqueda'";
$resultado=$conexion->query($query);
if ($resultado) {
    while ($row=$resultado->fetch_assoc()) {
        $id=$row['id_usuario'];
        $nombre=$row['nombre'];
        $correo=$row['correo'];
        $telefono=$row['Telefono_casa'];
        $telefono=$row['Telefono_celular'];

        $apellidos=$row['apellidos'];
        $colabfech=$row['fecha_creacion'];
    }
}
if($nombre== $busqueda||$correo== $busqueda||$telefono== $busqueda||$apellidos==$busqueda){
  echo '<script language="javascript">alert("Usuario existente");</script>';

}
else{
  
    header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$n&id_cola=$id_cola&usur=$n");

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tareas</title>
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
    <link rel="stylesheet" href="../CSSAGENTE/Tareas.css">
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSSAGENTE/tablas.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSSAGENTE/estilos.css">
    <link rel="stylesheet" href="../CSSAGENTE/materialize.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/mostrar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.7.0/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
                            <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$n'>"?><i class="fa fa-user-circle" aria-hidden="true"></i>Mi perfil </a>
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
                            <?php echo "<a href='../TAREAS/tareas.php?codigo=$n'>"?><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Abierto (0)</a>
                            </li>
                            <li>
                            <?php echo "<a href='../TAREAS/tareas.php?codigo=$n'>"?> <i class="fa fa-sitemap" aria-hidden="true"></i>Nueva tarea </a>

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
                    <div class="col-md-12">
                    <form action="regresar_tareas.php"  method="post" enctype="multipart/form-data">
<button   ><img src="../imagenes/regresar.jpg" style="border:  5px; border-radius: 50%;" width="90" height="90" /></button>
<?php $n=$_POST['codigos']; ?>

<input name="codigos" type="hidden" value="<?php echo $n; ?>" />
<input name="id_usuario" type="hidden" value="<?php echo $id; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
<input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

</form>
                    <?php
include("conexion2.php");

                    $query6 = $mysqli -> query ("SELECT *FROM usuario  WHERE id_usuario='$id'");
                    if ($query6) {
                        while ($valores6 = mysqli_fetch_array($query6)) {
                            $img=$valores6['foto'];
                        }
                    }

                    ?>


<form action="agregar_colab.php"  method="post" enctype="multipart/form-data">
<br>
<br>
<p style="background:#9ec7f6; color:white; font-weight:bold; padding:10px;"><td><img  id="mediana" style="max-width:10%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($img);?>"/>

<b> <?php echo "Nombre:&nbsp;$nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?></b>
<button   ><img src="../imagenes/colab.webp" style="border:  5px; border-radius: 50%;" width="90" height="90" />Agregar colaborador</button>
<?php $n=$_POST['codigos']; ?>

<input name="codigos" type="hidden" value="<?php echo $n; ?>" />
<input name="id_usuario" type="hidden" value="<?php echo $id; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
<input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
<input name="colab" type="hidden" value="<?php echo $colabfech; ?>" />

</form>
</p>

<p style="background:#9ec7f6; color:white; font-weight:bold; padding:10px;">
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Conctato de Información</b>
<br>
<b> <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo electronico:&nbsp;&nbsp;&nbsp;$correo" ?></b>
<b> <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Numero de telefono:&nbsp;&nbsp;&nbsp;$telefono" ?></b>

</p>





<form action="colaborador.php"  method="post" enctype="multipart/form-data">

<b> Crear nuevo usuario: </b>
</p>
<b>Dirección de correo electrónico:</b>
<br>
<input class="w3-input" id="tit" name="email" type="text"> <b>*</b>                                         
<b>

Nombre completo:</b>
<br>
<input class="w3-input" id="tit" name="nombre_usuario" type="text"> <b>*</b>   
<b>

Numero de telefono:</b>
<br>
<input class="w3-input" id="tit" name="telefono" type="text"> <b>*</b>                     
<b>Ext</b>


<input class="w3-input" id="tit" name="ext" type="text">     
<br>
<b>Notas internas:</b>

<textarea name="notas" id="caja" rows="10" cols="40">

</textarea>   
<?php
$n=$_POST['codigos'];
?>
<input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />


<button type="button" class="btn btn-primary"style='width:200px; height:50px'>Restablecer</button>      
                <button type="button" class="btn btn-warning"style='width:200px; height:50px'data-dismiss="modal">Cancelar</button>
                <button  class="btn btn-success"style='width:200px; height:50px'>Añadir nuevo usuario</button>                         
</form>
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
<!-- WIZARD SCRIPTS -->
<script src="../assets/js/wizard/modernizr-2.6.2.min.js"></script>
<script src="../assets/js/wizard/jquery.cookie-1.3.1.js"></script>
<script src="../assets/js/wizard/jquery.steps.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script> 
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>