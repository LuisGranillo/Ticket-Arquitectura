<?php
$busqueda=$_POST['usuarios'];
$id_cola=$_POST['id_cola'];
$idTarea=$_POST['idTarea'];
$n=$_POST['codigos'];
 

 /* crear la conexión */

 
 //Seguridad de sesiones paginacion

  include("../conexion.php");
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
    <title>Responsive Bootstrap Advance Admin Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 
    <link href="/UTP/ADMINISTRADORES/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="../TAREAS/css_tareas/Tareas.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet"   href="/UTP/AGENTE/CSSAGENTE/Tareas.css">
				
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="../CSSAGENTE/estilos_panel.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.anypicker/latest/anypicker-all.min.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.anypicker/latest/anypicker.min.js"></script>
<link rel="stylesheet" href="../lib/w3.css">
<script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
$n=$_POST['codigos'];
                            $query="SELECT*FROM usuario WHERE id_usuario='$n'";
                            $resultado=$conexion->query($query);
                            if($resultado){
                            while($row=$resultado->fetch_assoc()){
                          ?>
                          
                              <td><img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"/></td>
                                        
                         
                         </tr>
                         <?php
                         
                             
                               echo "<br>";
                              echo "<p style='color:white;'> Bienvenido " .   ($row['nombre']);
                              echo "<br>";
                              echo ($row['apellidos'] . "</p>");
                              $id_us=$row["id_usuario"];
                              }
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
                            <?php echo "<a href='tareas.php?cod=$n'>"?><i class="fa fa-tasks" aria-hidden="true"></i>TAREAS</a>

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
        <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                    <form action="regresar_tareas.php"  method="post" enctype="multipart/form-data">
<button   ><img src="../TAREAS/imagenes_tareas/regresar.jpg" style="border:  5px; border-radius: 50%;" width="90" height="90" /></button>
<?php $n=$_POST['codigos']; ?>

<input name="codigos" type="hidden" value="<?php echo $n; ?>" />
<input name="id_usuario" type="hidden" value="<?php echo $id; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
<input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

</form>
                    <?php
include("../conexion.php");

                    $query6 = "SELECT *FROM usuario  WHERE id_usuario='$id'";
                    $hilosrep=$conexion->query($query6);

                    if ($hilosrep) {
                        while($valores6=$hilosrep->fetch_assoc()){
                            $img=$valores6['foto'];
                        }
                    }

                    ?>


<form action="agregar_colab.php"  method="post" enctype="multipart/form-data">
<br>
<br>
<p style="background:#9ec7f6; color:white; font-weight:bold; padding:10px;"><td><img  id="mediana" style="max-width:10%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($img);?>"/>

<b> <?php echo "Nombre:&nbsp;$nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?></b>
<button   ><img src="../TAREAS/imagenes_tareas/colab.webp" style="border:  5px; border-radius: 50%;" width="90" height="90" />Agregar colaborador</button>
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



<?php $resultado = " <div id='resultado'></div>" ?>
    <tr class='noSearch hide'>

        <td colspan="5"></td>

    </tr>

</table>
<form action="colaborador.php"  method="post" enctype="multipart/form-data">
        <p style="background:#9ef6a2; color:white; font-weight:bold; padding:10px;">

<b> Crear nuevo usuario: </b>
</p>
<b>Dirección de correo electrónico:</b>
<br>
<input class="w3-input" id="correos" name="email" type="text"> <b>*</b>                                         
<b>
<br>
Nombre:</b>
<br>
<input class="w3-input" id="nombres_t" name="nombre_usuario" type="text"> <b>*</b>   
<b>
<br>
Apellidos:</b>
<br>
<input class="w3-input" id="nombres_t" name="apellidos" type="text"> <b>*</b>   
<b>
<br>
Numero de telefono:</b>
<br>
<input class="w3-input" id="telefonia" name="telefono" type="text"> <b>*</b>   <br>                  
<b>Ext</b>
<br>

<input class="w3-input" id="extensiones" name="ext" type="text">     
<br>
<b>Notas internas:</b>

<textarea name="notas" id="cajita" rows="10" cols="40">

</textarea>   
<input name="id_tarea" type="hidden" value="<?php echo $detalles; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />

<input name="colab" type="hidden" value="<?php echo $fecha_creador_colab; ?>" />
<button    type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg" onclick="borrar_detalles()">  <span>campos</span><span> Restablecer  </span></button></td>  
  
                <button    type="button" class="custom-btn btn-12" style="width: width: 10px; 
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg" data-dismiss="modal"> <span>agregacion coolaborador</span><span> Cancelar  </span></button></td>                                     
<button    type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Nuevo usuario</span><span> Añadir  </span></button></td>        
</form>
</div>
               
</script>           
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
</body>
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
    <script src="../TAREAS/js_tareas/tareas.js"></script>
    <script src="../TAREAS/js_tareas/cheks.js"></script>
    <script src="../TAREAS/js_tareas/reloj.js"></script>

    <script src="//code.jquery.com/jquery-latest.min.js"></script>

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

</body>
</html>