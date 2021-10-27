<?php

include("conexion4.php");


//Seguridad de sesiones paginacion

session_start();

$varsesion = $_SESSION['correo'];
$n = $_GET['codigo'];
$usur = $_GET['usur'];
$idTarea = $_GET['idTarea'];
$id_cola = $_GET['id_cola'];
$si = "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $n";
$si2 = mysqli_query($conexion, $si);
$fin = mysqli_fetch_array($si2);

$id = $fin['id_usuario'];
$usuario = "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $usur";
$sql1 = mysqli_query($conexion, $usuario);
$final = mysqli_fetch_array($sql1);
$id2 = $final['id_usuario'];
include("conexion3.php");
$colas_task = $mysqli->query("SELECT*FROM tarea WHERE idTarea='$idTarea' and id_cola='$id_cola'");
$finales = mysqli_fetch_array($colas_task);
$deta = $finales['idTarea'];
$deta2 = $finales['id_cola'];

if ($id == null) {
    header("location:../cerrar_sesion.php");
}
if ($deta == null || $deta2 == null) {
    header("location:../cerrar_sesion.php");
}
if ($id2 == null) {
    header("location:../cerrar_sesion.php");
} else {
    ob_start();
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
    <link rel="stylesheet" href="../CSSAGENTE/detalles.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../CSSAGENTE/detalles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSSAGENTE/materialize.css">
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
                if ($fin['id_rol'] == 2) {
                    echo "<a href='/UTP/ADMINISTRADORES/CRUD/TAREAS/mensajeria.php?cod=$n' >" ?> Panel administrador</a> | <?php echo "<a href='../PANEL DE CONTROL/Cuenta.php?cod=$n'>Perfil</a> | <a href='../cerrar_sesion.php'>Cerrar sesión</a>";
                                                                                                                        } else {
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

                                    $query = "SELECT*FROM usuario WHERE id_usuario='$n'";
                                    $resultado = $conexion->query($query);
                                    while ($row = $resultado->fetch_assoc()) {
                                    ?>

                                        <td><img id="mediana" height="100%" src="data:image/jpg;base64,<?php echo base64_encode($perfil = $row['foto']); ?>" /></td>


                                        </tr>
                                    <?php

                                        echo "<br>";
                                        echo "<p style='color:white;'> Bienvenido " .   ($nombre_logeado = $row['nombre']);
                                        echo "<br>";
                                        echo ($apellido_logeado = $row['apellidos'] . "</p>");
                                    }
                                    ?>
                                </div>
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
                    <div class="col-md-12">

                        <?php
                        include("conexion1.php");

                        $idTarea = $_GET['idTarea'];
                        $id_cola = $_GET['id_cola'];
                        $codigo = $_GET['codigo'];


                        $query2 = "SELECT*FROM tarea WHERE idTarea='$idTarea'";
                        $resultado2 = $conexion->query($query2);
                        while ($row = $resultado2->fetch_assoc()) {

                            $Titulo = $row['Titulo'];
                            $Creacion_tarea = $row['Creacion_tarea'];
                            $descripcion_tarea = $row['Descripcion'];

                            $Creacion_tarea = $row['Creacion_tarea'];
                            $Vencimiento = $row['Vencimiento'];
                            $Departamento = $row['Departamento'];
                            $procurador = $row['procurador'];
                            $id_archivo = $row['id_archivo'];
                            $USER = $row['id_usuario'];
                            $idequipo = $row['idequipo'];
                        }
                        $query3 = "SELECT*FROM colas_de_tareas WHERE id_cola='$id_cola'";
                        $resultado3 = $conexion->query($query3);
                        while ($row = $resultado3->fetch_assoc()) {

                            $estado = $row['estado'];
                            $colas_de_tareas_busc = $row['id_cola'];
                        }
                        include("conexion1.php");
                        $totalresp = 0;
                        $buscar_respuestas = "SELECT*FROM  respuesta WHERE id_cola='$id_cola'";
                        $resultadofinal = $conexion->query($buscar_respuestas);
                        while ($r = $resultadofinal->fetch_assoc()) {
                            $totalresp += 1;
                        }

                        include("conexion1.php");

                        $actualizar_colas = "UPDATE Colas_de_tareas SET total='$totalresp' WHERE id_cola='$id_cola'";

                        $update = $conexion->query($actualizar_colas);


                        include("conexion2.php");
                        $creacion_colaborador = '';
                        $fecha_creador_colab = '';
                        $query3 = $mysqli->query("SELECT *FROM usuario  WHERE id_usuario='$USER'");
                        if ($query3) {
                            while ($valores3 = mysqli_fetch_array($query3)) {
                                $nombre = '' . $valores3['nombre'] . '&nbsp;' . $valores3['apellidos'] . '';
                                $foto = $valores3['foto'];
                                $fecha_creador_colab = $valores3['fecha_creacion'];
                            }
                        }
                        $nombre_jefe_equipo = '';
                        $jefe_equipo = $mysqli->query("SELECT *FROM usuario WHERE id_usuario='$idequipo'");
                        if ($jefe_equipo) {
                            while ($encontrar_equipo = mysqli_fetch_array($jefe_equipo)) {
                                $nombre_jefe_equipo = '' . $encontrar_equipo['nombre'] . '&nbsp;' . $encontrar_equipo['apellidos'] . '';
                            }
                        }
                        include("conexion3.php");

                        $query5 = $mysqli->query("SELECT*FROM tarea WHERE idTarea='$idTarea'");
                        if ($query5) {
                            while ($valores5 = mysqli_fetch_array($query5)) {
                                $pr = $valores5['pr'];
                            }
                        }
                        include("conexion2.php");

                        $query6 = $mysqli->query("SELECT *FROM usuario  WHERE id_usuario='$pr'");
                        if ($query6) {
                            while ($valores6 = mysqli_fetch_array($query6)) {
                                $img = $valores6['foto'];
                            }
                        }
                        include("conexion3.php");
                        $rutaDescarga = 0;
                        $query4 = $mysqli->query("SELECT *FROM archivo  WHERE id_archivo='$id_archivo'");
                        if ($query4) {
                            while ($valores4 = mysqli_fetch_array($query4)) {

                                $foto_archivo = $valores4['imagen'];
                                $nombre_archivo = $valores4['nombre_archivo'];
                                $ti_po_archivo=$valores4['tipo'];
                            }
                        }
                        $query4 = $mysqli->query("UPDATE archivo SET id_cola='$id_cola' WHERE id_archivo='$id_archivo'");

                        include("conexion2.php");
                        $cuenta = 0;
                        $query8 = $mysqli->query("SELECT *FROM colaborador where id_tarea='$idTarea'");
                        if ($query8) {
                            while ($valores8 = mysqli_fetch_array($query8)) {
                                $cuenta += 1;

                                $colaboradores_uni = $valores8['id_colab'];
                                $creacion_colaborador = $valores8['fecha_creacion'];
                            }
                        }
                        include("conexion2.php");
                        $id_accion = 0;
                        $id_acs = '';
                        $descripcion_accion = '';
                        $query10 = $mysqli->query("SELECT *FROM actualizaciones where idtarea='$idTarea'");
                        if ($query10) {
                            while ($valores10 = mysqli_fetch_array($query10)) {

                                $id_accion = $valores10['id_usuario'];
                                $descripcion_accion = $valores10['descripcion'];
                                $id_acs = $valores10['id_colaborador'];
                            }
                        }
                        include("conexion2.php");

                        $query11 = $mysqli->query("SELECT *FROM usuario where id_usuario='$id_accion'");
                        if ($query11) {
                            while ($valores11 = mysqli_fetch_array($query11)) {
                                $nombre_accion = $valores11['nombre'];
                                $apellidos_accion = $valores11['apellidos'];
                            }
                        }
                        include("conexion2.php");
                        $nombre_colaborador = '';
                        $apellidos_colaborador = '';
                        $query9 = $mysqli->query("SELECT *FROM usuario where id_usuario='$id_acs'");
                        if ($query9) {
                            while ($valores9 = mysqli_fetch_array($query9)) {
                                $nombre_colaborador = $valores9['nombre'];
                                $apellidos_colaborador = $valores9['apellidos'];
                            }
                        }
                        include("conexion2.php");
                        $query8 = $mysqli->query("SELECT *FROM colaborador where id_tarea='$idTarea'");
                        if ($query8) {
                            while ($valores8 = mysqli_fetch_array($query8)) {
                                $colaboradores_uni = $valores8['id_colab'];
                                $creacion_colaborador = $valores8['fecha_creacion'];
                            }
                        }

                        include("conexion2.php");

                        $query10 = $mysqli->query("SELECT *FROM actualizaciones where idtarea='$idTarea'");
                        if ($query10) {
                            while ($valores10 = mysqli_fetch_array($query10)) {
                                $id_accion = $valores10['id_usuario'];
                                $descripcion_accion = $valores10['descripcion'];
                                $id_acs = $valores10['id_colaborador'];
                            }
                        }
                        include("conexion2.php");
                        $nombre_accion = '';
                        $apellidos_accion = '';
                        $query11 = $mysqli->query("SELECT *FROM usuario where id_usuario='$id_accion'");
                        if ($query11) {
                            while ($valores11 = mysqli_fetch_array($query11)) {
                                $nombre_accion = $valores11['nombre'];
                                $apellidos_accion = $valores11['apellidos'];
                            }
                        }
                        include("conexion2.php");
                        $fecha_creador_colab = '';
                        $query9 = $mysqli->query("SELECT *FROM usuario where id_usuario='$id_acs'");
                        if ($query9) {
                            while ($valores9 = mysqli_fetch_array($query9)) {
                                $nombre_colaborador = $valores9['nombre'];
                                $apellidos_colaborador = $valores9['apellidos'];
                            }
                        }
                        echo $fecha_creador_colab;


                        ?>
                        <form action="regresar_tareas.php" method="post" enctype="multipart/form-data">
                            <button class="btn btn-default btn-sm dropdown-toggle" style="border:  0px; border-radius: 100%;" type="button" data-toggle="dropdown">
                                <img src="../imagenes/perfil.jpg" style="border:  5px; border-radius: 50%;" width="40" height="40" />
                            </button>
                            <ul class="dropdown-menu">

                                <a data-toggle='modal' data-target='#procurador'><img src="../imagenes/perfil.jpg" style="border:  5px; border-radius: 20%;" width="40" height="40" /> Agentes</a>
                                <a data-toggle='modal' data-target='#equipo'><img src="../imagenes/regalo.png" style="border:  5px; border-radius: 20%;" width="40" height="40" /> Equipo</a>

                            </ul>

                            <button><img src="../imagenes/regresar.jpg" style="border:  5px; border-radius: 50%;" width="40" height="40" /></button>
                            <button type="button" data-toggle='modal' data-target='#actualizar'><img src="../imagenes/editar.png" style="border:  5px; border-radius: 50%;" width="40" height="40" /></button>
                            <button type="button" data-toggle='modal' data-target='#eliminar'><img src="../imagenes/eliminar.png" style="border:  5px; border-radius: 50%;" width="40" height="40" /></button>


                            <input name="codigos" type="hidden" value="<?php echo $codigo; ?>" />


                        </form>
                        <form action="pdf.php" method="post" enctype="multipart/form-data">
                            <button><img src="../imagenes/imprimir.jpg" style="border:  5px; border-radius: 50%;" width="40" height="40" /></button>
                            <input name="codigos" type="hidden" value="<?php echo $codigo; ?>" />
                            <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                            <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />

                        </form>
                        <a href="#">
                            <h1><?php echo "TAREA #$idTarea" ?></h1>
                        </a>



                        <h3> <?php echo $Titulo ?></h3>


                        <p style="background: #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">
                            <br> <b>Estado</b>
                            <?php echo "<a data-toggle='modal' data-target='#tarea'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$estado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
                            ?>

                            <b>Departamento:</b>
                            <?php echo "  <a data-toggle='modal' data-target='#departamentos'>&nbsp;&nbsp;&nbsp;$Departamento</a>" ?>

<br>
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Asignado a:</b>
                            <?php echo "  <a data-toggle='modal' data-target='#procurador'>&nbsp;&nbsp;&nbsp;$procurador</a>" ?>


                            <br>
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "Colaboradores : " ?></b>
                            <?php echo "<a data-toggle='modal' data-target='#colaborador'> Colaboradores:$cuenta</a>" ?>

                            <br>
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "Equipos : " ?></b>
                            <?php echo "<a data-toggle='modal' data-target='#equipo'> $nombre_jefe_equipo</a>" ?>


                            <br>
                            <b> <?php echo "Creados:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$Creacion_tarea" ?></b>
                            <br>
                            <b>Fecha de<br>Vencimiento:</b>
                            <?php echo "  <a data-toggle='modal' data-target='#fecha'>&nbsp;&nbsp;&nbsp;$Vencimiento</a>" ?>
                            <br>

                        </p>

                        <center>
                            <button class="btn btn-default btn-sm dropdown-toggle" style="border:  0px; border-radius: 100%;" type="button" data-toggle="dropdown">
                                <img src="../imagenes/bandera.png" style="border:  5px; border-radius: 50%;" width="40" height="40" />
                            </button>

                            <ul class="dropdown-menu">

                                <a data-toggle='modal' data-target='#tarea'><img src="../imagenes/cerrar.png" style="border:  5px; border-radius: 50%;" width="40" height="20" /> cerrar tarea</a>
                                <a data-toggle='modal' data-target='#equipo'><img src="../imagenes/equipos.png" style="border:  5px; border-radius: 50%;" width="50" height="50" /> Equipos</a>

                            </ul>

                        </center>
                        <center>
                            <button class="btn btn-default btn-sm dropdown-toggle" style="border:  0px; border-radius: 100%;" type="button" data-toggle="dropdown">
                                <img src="../imagenes/opciones.png" style="border:  5px; border-radius: 50%;" width="40" height="40" />
                            </button>

                            <ul class="dropdown-menu">

                                <a data-toggle='modal' data-target='#actualizar'><img src="../imagenes/editar1.png" style="border:  5px; border-radius: 50%;" width="30" height="30" /> Editar tarea</a>
                                <a data-toggle='modal' data-target='#crear_tarea'><img src="../imagenes/button-plus-icon-vector.webp" style="border:  5px; border-radius: 50%;" width="30" height="30" /> Crear Tarea</a>

                            </ul>
                        </center>



                        <center>
                            <img src="../imagenes/icono_perfil.png" style="border:  5px; border-radius: 50%;" width="60" height="60" />

                            <button class="btn btn-default btn-sm dropdown-toggle" style="border:  0px; border-radius: 100%;" type="button" data-toggle="dropdown">
                                <img src="../imagenes/opciones3.png" style="border:  5px; border-radius: 50%;" width="40" height="40" />
                            </button>

                            <ul class="dropdown-menu">

                                <a data-toggle='modal' data-target='#editar_hilo'><img src="../imagenes/editar_hilo.jpg" style="border:  5px; border-radius: 50%;" width="40" height="40" /> Editar</a>
                                <a data-toggle='modal' data-target='#crear_tarea'><img src="../imagenes/button-plus-icon-vector.webp" style="border:  5px; border-radius: 50%;" width="30" height="30" /> Crear Tarea</a>

                            </ul>
                        </center>
                        </center>

                        <center>

                            <div class="descrpp">
                                <div class="text">
                                    <br>


                                    <center>
                                        <p style="background: #ffffff; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">
                                            <td><img id="archivo" height="100%" style="max-width:10%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($foto); ?>" />

                                            </td> <b> <?php echo "<br>$nombre&nbsp;&nbsp;Publicado:&nbsp;&nbsp;$Creacion_tarea" ?></b>
                                        </p>
                                    </center>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </center>
                        <center>


                        </center>
                        <center>
                            <p style="background: #05f90f; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">

                                <b> <?php echo "Titulo de la tarea&nbsp;&nbsp;&nbsp;<br>$Titulo" ?></b>
                                <br>
                                <b> <?php echo "Descripcion de la tarea&nbsp;&nbsp;&nbsp;<br>$descripcion_tarea" ?></b>
                                <br>
                                <b>Imagen de apoyo por el usuario sobre la situacion</b>
                            </p>
                        </center>

                        <div class="portada">
                            <div class="text">
                                <br>
                                <img src="subir_archivos/<?php echo $foto_archivo; ?>" style="max-width:30%;width:auto;height:auto;">

                                <br>
                                <br>
                                <br>
                            </div>
                        </div>

                        </p>




                        <br>
                        <center>
                            <style>
                                @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700);
                                @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

                                html,
                                body {
                                    background: #e5e5e5;
                                    font-family: 'Lato', sans-serif;
                                    margin: 0px auto;
                                }

                                ::selection {
                                    background: rgba(82, 179, 217, 0.3);
                                    color: inherit;
                                }

                                a {
                                    color: rgba(82, 179, 217, 0.9);
                                }

                                /* M E N U */

                                .menu {
                                    position: fixed;
                                    top: 0px;
                                    left: 0px;
                                    right: 0px;
                                    width: 100%;
                                    height: 50px;
                                    background: rgba(82, 179, 217, 0.9);
                                    z-index: 100;
                                    -webkit-touch-callout: none;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                }

                                .back {
                                    position: absolute;
                                    width: 90px;
                                    height: 50px;
                                    top: 0px;
                                    left: 0px;
                                    color: #fff;
                                    line-height: 50px;
                                    font-size: 30px;
                                    padding-left: 10px;
                                    cursor: pointer;
                                }

                                .back img {
                                    position: absolute;
                                    top: 5px;
                                    left: 30px;
                                    width: 40px;
                                    height: 40px;
                                    background-color: rgba(255, 255, 255, 0.98);
                                    border-radius: 100%;
                                    -webkit-border-radius: 100%;
                                    -moz-border-radius: 100%;
                                    -ms-border-radius: 100%;
                                    margin-left: 15px;
                                }

                                .back:active {
                                    background: rgba(255, 255, 255, 0.2);
                                }

                                .name {
                                    position: absolute;
                                    top: 3px;
                                    left: 110px;
                                    font-family: 'Lato';
                                    font-size: 25px;
                                    font-weight: 300;
                                    color: rgba(255, 255, 255, 0.98);
                                    cursor: default;
                                }

                                .last {
                                    position: absolute;
                                    top: 30px;
                                    left: 115px;
                                    font-family: 'Lato';
                                    font-size: 11px;
                                    font-weight: 400;
                                    color: rgba(255, 255, 255, 0.6);
                                    cursor: default;
                                }

                                /* M E S S A G E S */

                                .chat {
                                    list-style: none;
                                    background: none;
                                    margin: 0;
                                    padding: 0 0 50px 0;
                                    margin-top: 60px;
                                    margin-bottom: 10px;
                                }

                                .chat li {
                                    padding: 0.5rem;
                                    overflow: hidden;
                                    display: flex;
                                }

                                .chat .avatar {
                                    width: 40px;
                                    height: 40px;
                                    position: relative;
                                    display: block;
                                    z-index: 2;
                                    border-radius: 100%;
                                    -webkit-border-radius: 100%;
                                    -moz-border-radius: 100%;
                                    -ms-border-radius: 100%;
                                    background-color: rgba(255, 255, 255, 0.9);
                                }

                                .chat .avatar img {
                                    width: 40px;
                                    height: 40px;
                                    border-radius: 100%;
                                    -webkit-border-radius: 100%;
                                    -moz-border-radius: 100%;
                                    -ms-border-radius: 100%;
                                    background-color: rgba(255, 255, 255, 0.9);
                                    -webkit-touch-callout: none;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                }

                                .chat .day {
                                    position: relative;
                                    display: block;
                                    text-align: center;
                                    color: #c0c0c0;
                                    height: 20px;
                                    text-shadow: 7px 0px 0px #e5e5e5, 6px 0px 0px #e5e5e5, 5px 0px 0px #e5e5e5, 4px 0px 0px #e5e5e5, 3px 0px 0px #e5e5e5, 2px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 0px 0px 0px #e5e5e5, -1px 0px 0px #e5e5e5, -2px 0px 0px #e5e5e5, -3px 0px 0px #e5e5e5, -4px 0px 0px #e5e5e5, -5px 0px 0px #e5e5e5, -6px 0px 0px #e5e5e5, -7px 0px 0px #e5e5e5;
                                    box-shadow: inset 20px 0px 0px #e5e5e5, inset -20px 0px 0px #e5e5e5, inset 0px -2px 0px #d7d7d7;
                                    line-height: 38px;
                                    margin-top: 5px;
                                    margin-bottom: 20px;
                                    cursor: default;
                                    -webkit-touch-callout: none;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                }

                                .other .msg {
                                    order: 1;
                                    border-top-left-radius: 0px;
                                    box-shadow: -1px 2px 0px #D4D4D4;
                                }

                                .other:before {
                                    content: "";
                                    position: relative;
                                    top: 0px;
                                    right: 0px;
                                    left: 40px;
                                    width: 0px;
                                    height: 0px;
                                    border: 5px solid #fff;
                                    border-left-color: transparent;
                                    border-bottom-color: transparent;
                                }

                                .self {
                                    justify-content: flex-end;
                                    align-items: flex-end;
                                }

                                .self .msg {
                                    order: 1;
                                    border-bottom-right-radius: 0px;
                                    box-shadow: 1px 2px 0px #D4D4D4;
                                }

                                .self .avatar {
                                    order: 2;
                                }

                                .self .avatar:after {
                                    content: "";
                                    position: relative;
                                    display: inline-block;
                                    bottom: 19px;
                                    right: 0px;
                                    width: 0px;
                                    height: 0px;
                                    border: 5px solid #fff;
                                    border-right-color: transparent;
                                    border-top-color: transparent;
                                    box-shadow: 0px 2px 0px #D4D4D4;
                                }

                                .msg {
                                    background: white;
                                    min-width: 50px;
                                    padding: 10px;
                                    border-radius: 2px;
                                    box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.07);
                                }

                                .msg p {
                                    font-size: 0.8rem;
                                    margin: 0 0 0.2rem 0;
                                    color: #777;
                                }

                                .msg img {
                                    position: relative;
                                    display: block;
                                    width: 450px;
                                    border-radius: 5px;
                                    box-shadow: 0px 0px 3px #eee;
                                    transition: all .4s cubic-bezier(0.565, -0.260, 0.255, 1.410);
                                    cursor: default;
                                    -webkit-touch-callout: none;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                }

                                @media screen and (max-width: 800px) {
                                    .msg img {
                                        width: 300px;
                                    }
                                }

                                @media screen and (max-width: 550px) {
                                    .msg img {
                                        width: 200px;
                                    }
                                }

                                .msg time {
                                    font-size: 0.7rem;
                                    color: #ccc;
                                    margin-top: 3px;
                                    float: right;
                                    cursor: default;
                                    -webkit-touch-callout: none;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                }

                                .msg time:before {
                                    content: "\f017";
                                    color: #ddd;
                                    font-family: FontAwesome;
                                    display: inline-block;
                                    margin-right: 4px;
                                }

                                emoji {
                                    display: inline-block;
                                    height: 18px;
                                    width: 18px;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    margin-top: -7px;
                                    margin-right: 2px;
                                    transform: translate3d(0px, 3px, 0px);
                                }

                                emoji.please {
                                    background-image: url(https://imgur.com/ftowh0s.png);
                                }

                                emoji.lmao {
                                    background-image: url(https://i.imgur.com/MllSy5N.png);
                                }

                                emoji.happy {
                                    background-image: url(https://imgur.com/5WUpcPZ.png);
                                }

                                emoji.pizza {
                                    background-image: url(https://imgur.com/voEvJld.png);
                                }

                                emoji.cryalot {
                                    background-image: url(https://i.imgur.com/UUrRRo6.png);
                                }

                                emoji.books {
                                    background-image: url(https://i.imgur.com/UjZLf1R.png);
                                }

                                emoji.moai {
                                    background-image: url(https://imgur.com/uSpaYy8.png);
                                }

                                emoji.suffocated {
                                    background-image: url(https://i.imgur.com/jfTyB5F.png);
                                }

                                emoji.scream {
                                    background-image: url(https://i.imgur.com/tOLNJgg.png);
                                }

                                emoji.hearth_blue {
                                    background-image: url(https://i.imgur.com/gR9juts.png);
                                }

                                emoji.funny {
                                    background-image: url(https://i.imgur.com/qKia58V.png);
                                }

                                @-webikt-keyframes pulse {
                                    from {
                                        opacity: 0;
                                    }

                                    to {
                                        opacity: 0.5;
                                    }
                                }

                                ::-webkit-scrollbar {
                                    min-width: 12px;
                                    width: 12px;
                                    max-width: 12px;
                                    min-height: 12px;
                                    height: 12px;
                                    max-height: 12px;
                                    background: #e5e5e5;
                                    box-shadow: inset 0px 50px 0px rgba(82, 179, 217, 0.9), inset 0px -52px 0px #fafafa;
                                }

                                ::-webkit-scrollbar-thumb {
                                    background: #bbb;
                                    border: none;
                                    border-radius: 100px;
                                    border: solid 3px #e5e5e5;
                                    box-shadow: inset 0px 0px 3px #999;
                                }

                                ::-webkit-scrollbar-thumb:hover {
                                    background: #b0b0b0;
                                    box-shadow: inset 0px 0px 3px #888;
                                }

                                ::-webkit-scrollbar-thumb:active {
                                    background: #aaa;
                                    box-shadow: inset 0px 0px 3px #7f7f7f;
                                }

                                ::-webkit-scrollbar-button {
                                    display: block;
                                    height: 26px;
                                }

                                /* T Y P E */

                                input.textarea {
                                    position: fixed;
                                    bottom: 0px;
                                    left: 0px;
                                    right: 0px;
                                    width: 100%;
                                    height: 50px;
                                    z-index: 99;
                                    background: #fafafa;
                                    border: none;
                                    outline: none;
                                    padding-left: 55px;
                                    padding-right: 55px;
                                    color: #666;
                                    font-weight: 400;
                                }

                                .emojis {
                                    position: fixed;
                                    display: block;
                                    bottom: 8px;
                                    left: 7px;
                                    width: 34px;
                                    height: 34px;
                                    background-image: url(https://i.imgur.com/5WUpcPZ.png);
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    z-index: 100;
                                    cursor: pointer;
                                }

                                .emojis:active {
                                    opacity: 0.9;
                                }
                            </style>
                        </center>


                        <?php


                        include("conexion3.php");
                        $usuario_hilo = '';
                        $query21 = $mysqli->query("SELECT *FROM hilo where tarea_anterior='$idTarea'");
                        if ($query21) {
                            while ($valores21 = mysqli_fetch_array($query21)) {
                                $id_tareas_hilo = $valores21['idTarea'];
                                $descripcion_hilo = $valores21['descripcion'];
                                $usuario_hilo = $valores21['usuario'];
                                $publicado_hilo = $valores21['fecha_creacion'];
                            }
                        }
                        include("conexion2.php");

                        $query22 = $mysqli->query("SELECT *FROM usuario where id_usuario='$usuario_hilo'");
                        if ($query22) {
                            while ($valores22 = mysqli_fetch_array($query22)) {
                                $nombre_hilo = $valores22['nombre'];
                                $apellido_hilo = $valores22['apellidos'];
                            }
                        }

                        ?>
                        <a data-toggle='modal' data-target='#aclaraciones'><i class="fa fa-eye fa-4x" aria-hidden="true"></i>Ver respuuesta del administrador sobre los cambios de las tareas</a> <br>
                        <b> <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tareas creada desde la tarea" ?></b>

                        </p>

                        <center>
                            <?php


                            $usuarios = '';

                            include("conexion3.php");
                            $id_cola = $_GET["id_cola"];
                            $query30 = $mysqli->query("SELECT *FROM hilo WHERE id_cola='$id_cola'");
                            if ($query30) {
                                while ($valores30 = mysqli_fetch_array($query30)) {
                                    $usuarios = $valores30['usuario'];
                                }
                            }
                            include("conexion2.php");

                            $query30 = $mysqli->query("SELECT *FROM usuario WHERE id_usuario='$usuarios'");
                            if ($query30) {
                                while ($valores30 = mysqli_fetch_array($query30)) {
                                    $nombre2 = $valores30['nombre'];
                                    $apellidos2 = $valores30['apellidos'];
                                }
                            }
                            include("conexion3.php");

                            $query21 = $mysqli->query("SELECT *FROM hilo WHERE id_cola='$id_cola'");
                            if ($query21) {
                                while ($valores21 = mysqli_fetch_array($query21)) {
                                    echo "$nombre2 $apellidos2";
                                    echo "<br/>";
                                    echo $valores21['descripcion'];
                                    echo "<br/>";
                                    echo "Publicado : " . $valores21['fecha_creacion'] . "<br/>";
                                    echo "Tarea " . $valores21['idTarea'] . "<br/>";

                                    echo "Tarea creada desde # " . $valores21['tarea_anterior'] . "<br/>"; ?>

                            <?php
                                }
                            }
                            ?>

                        </center>
                        </p>
                        <p style="background: #f8ef9d; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">

                            <?php
                            ?>
                            <?php

                            ?>
                            <center>

                                <p style="background:   #bdf0fa; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">
                                    <img src="../imagenes/icono_perfil.png" style="border:  5px; border-radius: 50%;" width="60" height="60" />
                                <div>
                                    <button class="btn btn-default btn-sm dropdown-toggle" style="border:  0px; border-radius: 100%;" type="button" data-toggle="dropdown">
                                        <img src="../imagenes/opciones3.png" style="border:  5px; border-radius: 50%;" width="40" height="40" />
                                    </button>

                                    <ul class="dropdown-menu">

                                        <a data-toggle='modal' data-target='#crear_tarea'><img src="../imagenes/button-plus-icon-vector.webp" style="border:  5px; border-radius: 50%;" width="30" height="30" /> Crear Tarea</a>

                                    </ul>
                                </div>


                                <?php
                                include("conexion3.php");
                                $query22 = $mysqli->query("SELECT *FROM respuesta where id_cola ='$id_cola'");
                                if ($query22) {
                                    while ($valores22 = mysqli_fetch_array($query22)) {
                                        echo "<br/>";
                                        $fecha_resp = $valores22['fecha_creacion'];
                                        $respuesta_r = $valores22['descripcion'];

                                        $imagen_res = $valores22['imagen'];
                                        $id_usuario_respuesta = $valores22['id_usuario'];
                                        include("conexion2.php");
                                        $query26 = $mysqli->query("SELECT *FROM usuario where id_usuario='$id_usuario_respuesta'");
                                        if ($query26) {
                                            while ($valores26 = mysqli_fetch_array($query26)) {
                                                echo "<div class='respuestas'>";

                                                echo "<b id='color'> Publicado : " . $valores26['fecha_creacion'] . "</b><br/>";

                                                echo "<b id='nom'>" . $valores26['nombre'] . '&nbsp;' . $valores26['apellidos'] . "</b>";

                                                echo "<br/>";

                                                echo "<b id='d'>" . $valores22['descripcion'] . "</b>";
                                                echo "<br/>";
                                                echo '<img style="max-width:15%;width:auto;height:auto;"
  src="data:image/jpeg;base64,' . base64_encode(($valores22['imagen'])) . ' "/>';
                                                echo "<p style=background: #f8ef9d; color: #0c92ac; font-weight: bold; padding: 5px; border: 10px solid #abecf9; border-radius: 6px;>";


                                                echo "<form action='editar_resp.php'  method='post' enctype='multipart/form-data'>";
                                                echo "<p style=background: #f8ef9d; color: #0c92ac; font-weight: bold; padding: 20px; border: 10px solid #abecf9; border-radius: 6px;>";

                                                echo "<button><img src='../imagenes/editar_resp.jpg' style='border:  5px; border-radius: 50%;' width='40'height='40' /></button>";
                                                echo "<input name='codigos' type='hidden' value= $codigo />";
                                                echo " <input name='id_resp' type='hidden' value= " . $valores22['id_respuesta'] . " />";

                                                echo  "<input name='id_usuario_res' type='hidden' value=" . $valores26['id_usuario'] . " />";
                                                echo  "<input name='id_usuario' type='hidden' value='$n' />";

                                                echo  "<input name='id_cola' type='hidden' value='$id_cola ' />";
                                                echo  "<input name='idTarea' type='hidden' value='$idTarea ' />";

                                                echo "</form>";

                                                echo "<form action='borrar_comet.php'  method='post' enctype='multipart/form-data'>";
                                                echo "<p style=background: #f8ef9d; color: #0c92ac; font-weight: bold; padding: 20px; border: 10px solid #abecf9; border-radius: 6px;>";

                                                echo "<button><img src='../imagenes/delete.png' style='border:  5px; border-radius: 50%;' width='40'height='40' /></button>";
                                                echo  "<input name='id_usuario' type='hidden' value='$n' />";
                                                echo " <input name='id_resp' type='hidden' value= " . $valores22['id_respuesta'] . " />";
                                                echo  "<input name='id_usuario_res' type='hidden' value=" . $valores26['id_usuario'] . " />";

                                                echo  "<input name='id_usuario_res' type='hidden' value=" . $valores26['id_usuario'] . " />";
                                                echo  "<input name='id_usuario' type='hidden' value='$n' />";

                                                echo  "<input name='id_cola' type='hidden' value='$id_cola ' />";
                                                echo  "<input name='idTarea' type='hidden' value='$idTarea ' />";

                                                echo "</form>";
                                                echo "</div>";
                                            }
                                        }
                                    }
                                }

                                ?>





                        </p>
                        <style type="text/css">
                            iframe {
                                margin: 0;
                                padding: 0;
                                height: 50%;
                            }

                            iframe {
                                display: block;
                                width: 50%;
                                border: none;
                            }
                        </style>
<?php
if($ti_po_archivo==null){

?>
<p>No hay archivo</p>
  <?php
       }else{ 
                      ?>
                      <iframe src="subir_archivos/<?php echo $nombre_archivo; ?>">

                      <?php
 }
 ?>


                        </iframe>
                        
                        <?php
                        if($ti_po_archivo!=null){

                        echo "<a href='../TAREAS/archivo.php?id_archivo=$id_archivo'>" ?> <i class="fa fa-eye fa-4x" aria-hidden="true"></i>
                        Ver archivo completo </a>
                        <?php
                    }
                    ?>
                        </center>

                        <center>

                            <button data-toggle='modal' data-target='#modal1'><img src="../imagenes/abierto.jpeg" width="70" height="70" /></button>
                            <a href="#" data-toggle='modal' data-target='#modal1'><i></i>Publicar nueva actualización</a>
                            <button data-toggle='modal' data-target='#modal1'><img src="../imagenes/PUBLICAR.png" width="70" height="70" /></button>
                            <a href="#" data-toggle='modal' data-target='#modal1'><i></i>Publicar notas internas</a>
                        </center>
                        <br>
                        <br>

                        <p style="background: #ffffff; color: #0c92ac; font-weight: bold; padding: 10px; border: 2px solid #abecf9; border-radius: 6px;">

                            <img src="../imagenes/CREADOR.png" style="max-width:15%;width:auto;height:auto;">
                            <b> <?php echo "Creado por:&nbsp;$nombre" ?></b>
                            <td><img id="mediana" style="max-width:15%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($foto); ?>" />
                                <b> <?php echo "$Creacion_tarea" ?></b>


                                <br>
                                <br>

                                <img src="../imagenes/RECLAMOjpeg" style="max-width:5%;width:auto;height:auto;">

                                <b> <?php echo "-----------------------------" ?></b>

                            <td><img id="mediana" style="max-width:15%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($img); ?>" />
                                <b> <?php echo "reclamó esta:&nbsp;&nbsp;&nbsp;$Creacion_tarea" ?></b>
                                <br>
                                <br>
                                <b>Ultimas actualizacion de agregacion e eliminaciones de colaboradores</b>
                                <br>
                                <br>
                                <b>Accion recientemente</b>
                                <b> <?php echo "&nbsp;&nbsp;&nbsp;$nombre_accion" ?></b>
                                <b> <?php echo "&nbsp;&nbsp;&nbsp;$apellidos_accion" ?></b>
                                <b> <?php echo "&nbsp;&nbsp;&nbsp;$descripcion_accion" ?></b>


                                <b> <?php echo "&nbsp;&nbsp;&nbsp;$nombre_colaborador" ?></b>
                                <b> <?php echo "&nbsp;&nbsp;&nbsp;$apellidos_colaborador" ?></b>

                                <b> <?php echo "&nbsp;&nbsp;&nbsp;$creacion_colaborador" ?></b>

                                <br>




                                <img src="../imagenes/regalo2.webp" style="max-width:3%;width:auto;height:auto;">
                                <?php
                                include("conexion2.php");
                                $idTarea = $_GET['idTarea'];

                                $query8 = $mysqli->query("SELECT *FROM colaborador where id_tarea='$idTarea'");
                                if ($query8) {
                                    while ($valores8 = mysqli_fetch_array($query8)) {
                                        $cuenta += 1;
                                        include("conexion2.php");
                                        $idTarea = $_GET['idTarea'];

                                        $query10 = $mysqli->query("SELECT *FROM actualizaciones where idtarea='$idTarea'");
                                        if ($query10) {
                                            while ($valores10 = mysqli_fetch_array($query10)) {
                                                if ($valores10['idtarea'] == $idTarea) {
                                                    include("conexion2.php");

                                                    $query11 = $mysqli->query("SELECT *FROM usuario where id_usuario=" . $valores10['id_usuario'] . "");
                                                    if ($query11) {
                                                        while ($valores11 = mysqli_fetch_array($query11)) {
                                                            include("conexion2.php");
                                                            $trabaj = '';
                                                            $query9 = $mysqli->query("SELECT *FROM usuario where id_usuario=" . $valores10['id_colaborador'] . "");
                                                            while ($valores9 = mysqli_fetch_array($query9)) {
                                                                echo " <br>";
                                                                echo $valores11['nombre'] . '&nbsp;' . $valores11['apellidos'];
                                                                $usuario_borado = $valores11['nombre'] . '&nbsp;' . $valores11['apellidos'];
                                                                echo "<b> &nbsp;&nbsp;&nbsp;" . $valores10['descripcion'] . "&nbsp;</b>";
                                                                echo $valores9['nombre'] . '&nbsp;' . $valores9['apellidos'];

                                                                echo "<b> &nbsp;&nbsp;&nbsp;" . $trabaj = $valores8['fecha_creacion'] . "</b>";
                                                               
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                ?>








                                <b>Estado</b>
                                <form action="hilo3.php" method="post">
                                    <br>
                                    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                                    <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
                                    <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                                    <select id="estado" name="estados">

                                        <option> Abierto </option>
                                        <option> Cerrado </option>

                                    </select>
                                    <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                                    <center>

                                        <button class="btn btn-warning" style='width:200px; height:50px'>Publicar nota</button>
                                        <button type="button" class="btn btn-info" style='width:200px; height:50px'>Restablecer</button>

                                    </center>
                                </form>
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>



    <form action="editar_hilo.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" tabindex="-1" id="editar_hilo2">
            <div class="modal-dialog modal-lg  modal-dialog-centered" id="editar_hilo2">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="" style="position: absolute; left:0;" data-dismiss="modal">&times;</button>

                        <input name="idusuario" type="hidden" value="<?php echo   $n = $_GET['codigo']; ?>" />

                    </div>
                    <div class="modal-body">
                        <br>
                        <b>Descripcion: *</b>
                        <br>

                        <button type="button" id="close" onclick="MostrarDatos();"><img src="../imagenes/fuentes.png" width="30" height="30" /></button>
                        <button type="button" onclick="Negritas();"><img src="../imagenes/negritas.png" width="30" height="30" /></button>
                        <button type="button" onclick="Quitarnegritas();"><img src="../imagenes/basurero.png" width="30" height="30" /></button>
                        <button type="button" onclick="PonerItalic();"><img src="../imagenes/italic.png" width="30" height="30" /></button>
                        <button type="button" onclick="underline();"><img src="../imagenes/underline.png" width="30" height="30" /></button>
                        <button itype="button" onclick="linea();"><img src="../imagenes/linea.png" width="30" height="30" /></button>
                        <br>
                        <button type="button" onclick="fuentes();"><img src="../imagenes/arial.png" width="30" height="30" /></button>

                        <button type="button" id="close" data-toggle='modal' data-target='#fotito'><img src="../imagenes/images.png" width="30" height="30" /></button>
                        <button type="button" data-toggle='modal' data-target='#modal3'><img src="../imagenes/video.png" width="30" height="30" /></button>
                        <button type="button" onclick="borrar();"><img src="../imagenes/borrar.jpg" width="60" height="60" /></button>
                        <button type="button"><img src="../imagenes/guardar.png" width="30" height="30" /></button>

                        <div id="fuentes" class="dropdown">


                            <div tabindex="0" class="onclick-menu">
                                <ul class="onclick-menu-content">
                                    <li><button type="button" id="close" onclick="Limpiar2();" value="">-Seleccione-</button></li>
                                    <li><button type="button" onclick="Arial();" id="Arial">Arial</button></li>
                                    <li><button type="button" onclick="Helvetica();" id="Helvetica">Helvetica</button></li>
                                    <li><button type="button" onclick="Georgia();" id="Helvetica">Georgia</button></li>
                                    <li><button type="button" onclick="Times_New_Roman();" id="Helvetica">Times New Roman</button></li>
                                    <li><button type="button" onclick="monospace();" value="servicios">Monospace</button></li>
                                    <li><button type="button" onclick="Remove_Font_Family();" value="sicea">Remove Font Family</button></li>

                                </ul>
                            </div>

                        </div>


                        <div id="formatos" class="selecionar">

                            <body>


                                <div tabindex="0" class="onclick-menu">
                                    <ul class="onclick-menu-content">
                                        <li><button onclick="Limpiar();" value="">-Seleccione-</button></li>
                                        <li><button onclick="Normal_texto();" id="Arial">Normal texto</button></li>
                                        <li><button onclick="heading_1();" id="Helvetica">Heading 1</button></li>
                                        <li><button onclick="heading_2();">Heading 2 </button></li>
                                        <li><button onclick="heading_3();" id="Helvetica">Heading 3</button></li>
                                        <li><button onclick="heading_4();" value="servicios">Heading 4 </button></li>
                                        <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>
                                        <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>

                                    </ul>
                                </div>
                            </body>
                        </div>


                        <ul id="dynamic-list"></ul>

                        <textarea name="comentarios" id="cajota" rows="10" cols="40"><?php echo $descripcion_tarea; ?></textarea>
                        <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                        <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                        <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
                        <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />


                        <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles();">Restablecer</button>

                        <button class="btn btn-danger">
                            Actualizar</button> <a href="#" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal" aria-pressed="true">Cancelar</a>
                    </div>

                </div>

            </div>

        </div>

        </div>

        </div>



        <div class="container">

            <body>
                <div class="modal fade" tabindex="-1" id="fotito">
                    <div class="modal-dialog modal-xs modal-dialog-centered" id="video">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b>Imagen</b>
                                <button class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body" id="video">

                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Seleccionar</button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file'  name="imagen" onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <b>Imagen actual a modificar</b>
                                            <td><img id="mediana" style="max-width:30%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($img); ?>" />

                                                <h4>Seleccione una imagen</h4>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>x
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
    </form>

    </div>
    </div>


    </div>

    </div>
    </div>
    </div>
    </div>
    </div>

    </div>

    </div>
    </div>






    <div class="container">
        <form action="cerrar.php?" method="post" enctype="multipart/form-data">
            <div class="modal fade" tabindex="-1" id="tarea">
                <div class="modal-dialog modal-lg modal-dialog-centered" id="video">
                    <div class="modal-content">
                        <div class="modal-header">
                            <b>TAREA </b>
                            <button class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body" id="video">


                            <h4> <?php echo "Cerrar tarea #$idTarea" ?></h4>

                            <p style="background: #dcd089; color: #000000; font-weight: bold; padding: 15px; border: 2px solid #fe8a00; border-radius: 6px;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"> ¿Está seguro que desea cambiar el estado de esta tarea?</i>
                                <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                                <input name="codigo" type="hidden" value="<?php echo $codigo; ?>" />


                            </p> <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                            <textarea id="estado_tarea" name="respuesta" rows=3 cols=20 placeholder="Motivo opcional para el cambio de estado (internal note)"></textarea>
                            <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles();">Restablecer</button>
                            <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" style='width:200px; height:50px'>Enviar</button>
</body>
</div>
</div>
</div>
</div>



</form>
<div class="container">
    <form action="fecha.php?" method="post" enctype="multipart/form-data">
        <div class="modal fade" tabindex="-1" id="fecha">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="video">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Fecha de actualización </b>
                        <button class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" id="video">


                        <h4> <?php echo "Tarea #$idTarea: Actualizar Fecha de Vencimiento" ?></h4>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                M.AutoInit();
                            });
                        </script>
                        <div class="row">
                            <div class="col 14 offset-14">
                                <br>

                                <p><span>Coloque la fecha de vencimiento</span></p>
                                <input REQUIRED type="text" class="datepicker" name="fecha" id="actualizar_fecha" width="40%" height="40%" name="" value=""> <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                    <label for="">Ingresar tu fecha</label>

                            </div>
                            <i class="fa fa-calendar" aria-hidden="true"></i> Elegir una Fecha de Vencimiento reemplazará Plan SLA</i>
                            <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                            <textarea REQUIRED name="aclaracion" rows=3 cols=20 placeholder="Razón opcional para la actualización " id="cambio_fecha"></textarea>
                            <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                            <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                            <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                            <input name="codigo" type="hidden" value="<?php echo $codigo; ?>" />



                            <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" style='width:200px; height:50px'>Actualizar</button>
                            <button type="button" class="btn btn-success" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>


                            </body>
                        </div>
                    </div>
                </div>
            </div>


    </form>

</div>

</div>
</div>
</div>
</div>
</div>

</div>

</div>
</div>


<div class="container">
    <form action="departamento.php?" method="post" enctype="multipart/form-data">
        <div class="modal fade" tabindex="-1" id="departamentos">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="video">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4> <?php echo "Tarea #$idTarea: Transferir" ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" id="video">

                        <?php
                        include("conexion2.php");

                        $n = $_GET['codigo'];
                        $query2 = $mysqli->query("SELECT *FROM usuario where id_usuario=$n");
                        if ($query2) {
                            while ($valores2 = mysqli_fetch_array($query2)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        ?>
                                <b>Creador de la tarea: </b>
                                <input type="text" readonly="readonly" name="creador_nombre" maxlength="4" value="<?php echo $valores2["nombre"]; ?>">
                                <input type="text" readonly="readonly" name="apellidos_creador" maxlength="4" value="<?php echo $valores2["apellidos"]; ?>">


                        <?php
                            }
                        }
                        ?>
                        <b>Departamento:*</b>

                        <select id="departa" name="departamentos">
                            <?php
                            include("conexion2.php");

                            $query2 = $mysqli->query("SELECT *FROM departamento ");
                            if ($query2) {
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                    echo '<option ="' . $valores2['id_rol'] . '">' . $valores2['nombre'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                        <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                        <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                        <textarea REQUIRED id="aclaracion" name="aclaracion" rows=3 cols=20 placeholder="Razón opcional para la transferencia "></textarea>
                        <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                        <input name="idTarea" type="hidden" value="<?php echo $idTarea; ?>" />

                        <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>
                        <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" style='width:200px; height:50px'>Transferir</button>
                        </body>
                    </div>
                </div>
            </div>
        </div>


    </form>

</div>
</div>
</div>
</div>
</div>

</div>

</div>
</div>

<div class="container">
    <form action="reasignar.php?" method="post" enctype="multipart/form-data">
        <div class="modal fade" tabindex="-1" id="procurador">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="video">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Reasignar tarea </b>

                        <p style="background: #dcd089; color: #000000; font-weight: bold; padding: 15px; border: 2px solid #fe8a00; border-radius: 6px;">
                            <i class="fa fa-exclamation" aria-hidden="true"></i><b> <?php echo "Esta tarea esta asignada a $procurador" ?></h4></b>

                            <button class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" id="video">


                        <h4> <?php echo "Tarea #$idTarea: Reasignar" ?></h4>
                        <b>Procurador: </b>
                        <br>
                        <select id="depart" name="procurador">

                            <?php
                            include("conexion2.php");

                            $query2 = $mysqli->query("SELECT *FROM usuario where id_rol=1");
                            if ($query2) {
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                    echo '<option ="">' . $valores2['id_usuario'] . '&nbsp;&nbsp;' . $valores2['nombre'] . '&nbsp;' . $valores2['apellidos'] . '</option>';
                                }
                            }
                            ?>

                        </select>
                        <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                        <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                        <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                        <input name="codigo" type="hidden" value="<?php echo $codigo; ?>" />
                        <textarea REQUIRED id="reasignar" name="aclaracion" rows=3 cols=20 placeholder="Razón opcional de asignación"></textarea>
                        <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                        <input name="idTarea" type="hidden" value="<?php echo $idTarea; ?>" />

                        <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>
                        <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" style='width:200px; height:50px'>Asignar</button>
                        </body>



    </form>

</div>

</div>

</div>

</div>

</div>

</div>
</div>

<div class="container">
    <div class="modal fade" tabindex="-1" id="colaborador">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="width:900px;" id="video">
            <div class="modal-content">
                <div class="modal-header">
                    <b>Colaboradores </b>
                    <button class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="video">
                    <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }

                        th,
                        td {
                            text-align: left;
                            padding: 8px;
                        }

                        tr:nth-child(even) {
                            background-color: #f2f2f2
                        }

                        th {
                            background-color: #04AA6D;
                            color: white;
                        }
                    </style>
                    <table id="datos" style="width:20px;">


                        <a data-toggle='modal' data-target='#añadir'><i class="fa fa-plus-square" aria-hidden="true"></i>Añadir colaborador </a>
                        <br>
                        <br>
                        <form action="borar_colaboradores.php" method="post" enctype="multipart/form-data">

                            Buscar usuario o colaborador , borrar colaborar mediante clave<input list="colores" name="usuarios" type="text" id="searchTerm" type="text" onkeyup="doSearch(this.value)" placeholder="Puedes buscar mediante el correo,nombre y telefono" />
                            <input name="codigos" type="hidden" value="<?php
                                                                        $n = $_GET['codigo'];
                                                                        echo $n; ?>" />
                            <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                            <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                            <input name="colab" type="hidden" value="<?php echo $fecha_creador_colab; ?>" />

                            <button class="btn btn-primary" style='width:200px; height:50px'>Eliminar colaborador</button>

                        </form>

                        <?php

                        ?>
                        <br>

                        <br>
                        <br>

                        <th>Clave de usuarios </th>
                        <th>Nombre</th>
                        <th></th>
                        <th>Telefono</th>
                        <th>Correo electronico</th>



                        <?php


                        include("conexion2.php");

                        $query2 = $mysqli->query("SELECT *FROM colaborador WHERE id_tarea='$idTarea'");
                        if ($query2) {
                            while ($valores2 = mysqli_fetch_array($query2)) {


                                $query3 = $mysqli->query("SELECT id_usuario,nombre,apellidos,Telefono_celular,correo FROM usuario WHERE id_usuario=" . $valores2['id_colab'] . "");
                                if ($query3) {
                                    while ($valores3 = mysqli_fetch_array($query3)) {
                                        echo " <tr>";
                                        echo ' <td ="' . $valores3['id_usuario'] . '">' . $valores3['id_usuario'] . '</td>';
                                        echo ' <td ="' . $valores3['id_usuario'] . '">' . $valores3['nombre'] . '</td>';

                                        echo ' <td ="' . $valores3['id_usuario'] . '">' . $valores3['apellidos'] . '</td>';
                                        echo ' <td ="' . $valores3['id_usuario'] . '">' . $valores3['Telefono_celular'] . '</td>';
                                        echo ' <td ="' . $valores3['id_usuario'] . '">' . $valores3['correo'] . '</td>';
                                    }
                                }
                                echo "    </tr>";
                            }
                        }

                        ?>





                        <script type="text/javascript">
                            function mostrar(valor)

                            {

                                document.getElementById("resultado").innerHTML = valor;

                            }
                        </script>

                        <?php $resultado = " <div id='resultado'></div>" ?>
                        <tr class='noSearch hide'>

                            <td colspan="5"></td>

                        </tr>

                    </table>



                    <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>
                    <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" style='width:200px; height:50px'>Enviar</button>
                    </body>
                </div>
            </div>
        </div>
    </div>


    </form>
</div>


<div class="modal fade" tabindex="-1" id="añadir">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width:900px;" id="video">
        <div class="modal-content">
            <div class="modal-header">


                <h1>Colaboradores</h1>

                <form action="perfil.php" method="post" enctype="multipart/form-data">

                    <datalist id="colores">
                        <?php
                        include("conexion2.php");

                        $query2 = $mysqli->query("SELECT *FROM usuario where id_rol=1");
                        if ($query2) {
                            while ($valores2 = mysqli_fetch_array($query2)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                echo '<option ="' . $valores2['id_rol'] . '">' . $valores2['nombre'] . '</option>';
                                echo '<option ="' . $valores2['id_rol'] . '">' . $valores2['correo'] . '</option>';
                                echo '<option ="' . $valores2['id_rol'] . '">' . $valores2['telefono'] . '</option>';
                                echo '<option ="' . $valores2['id_rol'] . '">' . $valores2['apellidos'] . '</option>';
                            }
                        }
                        ?>

                    </datalist>
                    Buscar usuario <input name="usuarios" type="text" style="width:20%" id="search" onkeyup="doSearch(this.value)" placeholder="Puedes buscar mediante el correo,nombre y telefonoPuedes buscar mediante el correo,nombre y telefono">

                    <button class="btn btn-success" style='width:200px; height:50px'>Ver perfil</button>
                    <input name="codigos" type="hidden" value="<?php echo $codigo; ?>" />
                    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                    <input name="idTarea" type="hidden" value="<?php echo $idTarea; ?>" />
                </form>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


                <table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th>Clave de usuarios </th>
                            <th>Nombre</th>
                            <th></th>
                            <th>Telefono_casa</th>
                            <th>Telefono_celular</th>
                            <th>Correo electronico</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php


                            include("conexion2.php");

                            $query2 = $mysqli->query("SELECT id_usuario,nombre,apellidos,Telefono_casa,Telefono_celular,correo FROM usuario");
                            if ($query2) {
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                    echo " <tr>";
                                    echo ' <td ="' . $valores2['id_usuario'] . '">' . $valores2['id_usuario'] . '</td>';
                                    echo ' <td ="' . $valores2['id_usuario'] . '">' . $valores2['nombre'] . '</td>';

                                    echo ' <td ="' . $valores2['id_usuario'] . '">' . $valores2['apellidos'] . '</td>';
                                    echo ' <td ="' . $valores2['id_usuario'] . '">' . $valores2['Telefono_casa'] . '</td>';
                                    echo ' <td ="' . $valores2['id_usuario'] . '">' . $valores2['Telefono_celular'] . '</td>';

                                    echo ' <td ="' . $valores2['id_usuario'] . '">' . $valores2['correo'] . '</td>';
                                    echo "    </tr>";
                                }
                            }

                            ?>

                        </tr>
                    </tbody>
                </table>

                <br>
                <br>
                <br>
                <form action="colaborador.php" method="post" enctype="multipart/form-data">
                    <p style="background:#9ef6a2; color:white; font-weight:bold; padding:10px;">

                        <b> Crear nuevo usuario: </b>
                    </p>
                    <b>Dirección de correo electrónico:</b>
                    <br>
                    <input class="w3-input" id="correos" name="email" type="text"> <b>*</b>
                    <b>

                        Nombre completo:</b>
                    <br>
                    <input class="w3-input" id="nombres_t" name="nombre_usuario" type="text"> <b>*</b>
                    <b>

                        Numero de telefono:</b>
                    <br>
                    <input class="w3-input" id="telefonia" name="telefono" type="text"> <b>*</b>
                    <b>Ext</b>


                    <input class="w3-input" id="extensiones" name="ext" type="text">
                    <br>
                    <b>Notas internas:</b>

                    <textarea name="notas" id="cajita" rows="10" cols="40">

</textarea>
                    <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                    <input name="codigo" type="hidden" value="<?php echo $n; ?>" />

                    <input name="colab" type="hidden" value="<?php echo $fecha_creador_colab; ?>" />

                    <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>
                    <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" style='width:200px; height:50px'>Añadir nuevo usuario</button>
                </form>
                <br>
                <br>
                <br>



                </body>
            </div>
        </div>
    </div>
</div>




</div>


</div>

</div>
</div>

<div class="container">
    <form action="cerrar.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" tabindex="-1" id="detalles">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="video">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Detalles </b>
                        <button class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" id="video">


                        <h4> <?php echo "Cerrar tarea #$idTarea" ?></h4>
                        <input type="text" readonly="readonly" name="apellidos_creador" maxlength="4" value="<?php echo $valores2["apellidos"]; ?>">

                        <textarea id="cerrar" name="respuesta" rows=3 cols=20 placeholder="Motivo opcional para el cambio de estado (internal note)"></textarea>
                        <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>
                        <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" style='width:200px; height:50px'>Enviar</button>
                        </body>
                    </div>
                </div>
            </div>
        </div>


    </form>



    <div class="container">
        <form action="cerrar.php?" method="post" enctype="multipart/form-data">
            <div class="modal fade" tabindex="-1" id="informacion">
                <div class="modal-dialog modal-lg modal-dialog-centered" id="video">
                    <div class="modal-content">
                        <div class="modal-header">
                            <b>Detalles </b>
                            <button class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body" id="video">


                            <h4> <?php echo "Cerrar tarea #$id_us" ?></h4>

                            <p style="background: #dcd089; color: #000000; font-weight: bold; padding: 15px; border: 2px solid #fe8a00; border-radius: 6px;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"> ¿Está seguro que desea cambiar el estado de esta tarea?</i>
                                <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                                <input name="codigo" type="hidden" value="<?php echo $codigo; ?>" />
                                <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />


                            </p> <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                            <textarea name="respuesta" rows=3 cols=20 placeholder="Motivo opcional para el cambio de estado (internal note)"></textarea>
                            <button type="button" class="btn btn-primary" style='width:200px; height:50px'>Restablecer</button>
                            <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" style='width:200px; height:50px'>Enviar</button>
                            </body>
                        </div>
                    </div>
                </div>
            </div>


        </form>

    </div>



    <div class="container">

        <body>
            <form action="regresar.php?" method="post" enctype="multipart/form-data">

                <div class="modal fade" tabindex="-1" id="actualizar">
                    <div class="modal-dialog modal-xs modal-dialog-centered" style="width:1250px;" id="video">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b> <?php echo "Editar Tarea:#$idTarea" ?></b>
                                <p>Describa el problema</p>
                                <button class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body" id="video">

                                <b>Titulo</b>
                                <b> <?php echo "Editar Tarea:#$idTarea" ?></b>

                                <input class="w3-input" id="tit" name="titulo" type="text" size=40 style="width:510px" value="<?php echo $Titulo; ?>"> <b>*</b>

                                <b>Notas internas:</b>
                                <br>
                                <textarea id="tareas" required name="respuesta" rows=3 cols=20 placeholder="Razón para modificar la tarea (opcional)" style="min-width: 70% "></textarea>
                                <input name="codigos" type="hidden" value="<?php
                                                                            $n = $_GET['codigo'];
                                                                            echo $n; ?>" />
                                <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                                <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                                <br>
                                <button type="button" class="btn btn-primary" style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>
                                <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-success" style='width:200px; height:50px'>Actualizar</button>
                            </div>
            </form>
            <div class="modal-footer">

        </body>
    </div>
</div>
</div>
</div>


<div class="container">

    <body>
        <form action="regresar2.php?" method="post" enctype="multipart/form-data">

            <div class="modal fade" tabindex="-1" id="eliminar">
                <div class="modal-dialog modal-xs modal-dialog-centered" style="width:1250px;" id="video">
                    <div class="modal-content">
                        <div class="modal-header">
                            <b> <?php echo "#$idTarea: Eliminar" ?></b>
                            <button class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body" id="video">
                            <p style="background: #dcd089; color: #000000; font-weight: bold; padding: 5px; border: 1px solid #fe8a00; border-radius: 6px;">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"> ¿Está seguro que desea ELIMINAR esta tarea?</i>

                            </p>


                            <textarea name="respuesta" rows=3 cols=20 placeholder="Razón para borrar esta tarea (opcional)" style="min-width: 70% "></textarea>
                            <input name="codigos" type="hidden" value="<?php echo $usur; ?>" />
                            <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                            <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                            <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
                            <input name="nombre_archivo" type="hidden" value="<?php echo $nombre_archivo; ?>" />
                            <input name="imagen" type="hidden" value="<?php echo $foto_archivo; ?>" />


                            <input name="codigos1" type="hidden" value="<?php
                                                                        $n = $_GET['codigo'];
                                                                        echo $n; ?>" />

                            <br>
                            <button type="button" class="btn btn-primary" style='width:200px; height:50px'>Restablecer</button>
                            <button type="button" class="btn btn-warning" style='width:200px; height:50px' data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-success" style='width:200px; height:50px'>Eliminar</button>
                        </div>
        </form>

    </body>
</div>
</div>
</div>
</div>


</div>


</div>
<!-- Modal HTML -->
<div id="aclaraciones" class="modal fade">
    <div class="modal-dialog modal-confirm" style="width:700px;">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                </div>
                <div class="menu">
                    <div data-dismiss="modal" class="back"><i class="fa fa-chevron-left"></i> <img src="data:image/jpg;base64,<?php echo base64_encode($perfil); ?>" draggable="false" /></div>
                    <div class="name"><?php echo " Agente : $nombre_logeado $apellido_logeado" ?></div>
                    <div class="last"><?php date_default_timezone_set('America/Mexico_City');

                                        echo date("F j, Y, g:i a"); ?></div>
                </div>
                <ol class="chat">
                    <li class="other">

                    </li>
                    <center>
                        <h3>Aclaraciones de las modificaciones que ha hecho el creador de la tarea</h3>

                    </center>
                    <div class="modal-body">
                        <?php
                        include("conexion1.php");
                        $aclaraciones = "SELECT*FROM aclaraciones WHERE idTarea ='$idTarea'";
                        $aclaraciones_hechas = $conexion->query($aclaraciones);
                        if ($aclaraciones_hechas) {
                            while ($aclar = $aclaraciones_hechas->fetch_assoc()) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                include("../conexion.php");

                                $respo_aclar = "SELECT*FROM usuario WHERE id_usuario =" . $aclar["id_usuario"] . "";
                                $hiloaclar = $conexion->query($respo_aclar);
                                if ($hiloaclar) {
                                    while ($respuest_aclar = $hiloaclar->fetch_assoc()) {
                                        include("../conexion.php");

                                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.



                        ?>

                                        <li id="respuesta" class="self">

                                            <div class="avatar"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAA21BMVEX///9LiMYCAgIAAAAwMDBGf7lNjMwiPlpKh8Z0dHROjc339/fr6+vu7u76+vrW1tZ9fX29vb1PT0/i4uI9gcNXV1eoqKiSkpKzs7M5OTldXV2ZmZnOzs5JSUl3d3cqKirHx8cdHR04ZZNpaWmKiooNDQ1DebC6z+dBQUEVFRWurq6FrNbs8vk/cqYIDhQNFyEuVHocM0oyWoMTIjHP3e52odHd6POpw+FYkMooSGkgOlQXKTu90eiUtdswV34QHCiVqb+BqdWhwOQxR15rdoMcFg15k69oms7V4vFAkI6kAAANrklEQVR4nO1d63raMBLFETiAuYYQCHdCSEPuNGlSmqbZdi/p+z/R2tZIlmTZWLYJ8q7Pj34NyGKOJc9oRqNxoZAjR44cOXLkyJEjR44cOXLkyJEjR44cOXLkyPF/hmb7ZDK4PC0Wi6eXg8lJu7lvgdJEYzQcIz/Gw1Fj36Klgcas4vI5EOF+WpllnaR1UpSxY1gWT6x9C5kAjZ509MSR7GV2HPvb6FGS/X2LGgudI46fT9Fw3x119i2uOvoMB5fRaWXYHzXr9Xpn1B9WTnmWGRzGiie+zWTam/lazHpTxDaqfL6QCdDoUtkRWrWCrHuztWLadTOkcKwjT27UC7MGVs8bR3SUGbvROPUItrZJbbU8iqdZGcUxIvyKUVafzSLhiMY7ly0VTCjBSrQxaVC1hCY7li0VXIG4CA0jXzOk11ztULKU0IklrHdb9Df9l/FGg1K83JFcqeGKEOwpXtgjFDWfp9YS5BwoXzqAK5d6W8VzMoQxriWDeJ66VCmijqVEaBbj4hm5uJ62WCliCMOwCG3VeH56ebv+ZuP67eXpmc7KBVwd3cp8PlZoq8p/fvlmlI+PywD7f8bHy1/3KzA0aPVJ0sZAGwahFdTg5uW7Q87g4NA0Xm7sr1twffsTZVbDIPxBunmzqchhk7x+po+xuiL+JFggoNyXbbyVg/jBUF7DkhYhXQ0GmaRSh+LJOC6HEXQ4mv/QfJpW8AhMZd+9hY4fHcb7sFmwfxSxeJL1WuMjCkHDMDe4i+LnCx8FRNn7J6n1fdsEJQxvt5ubPWIG1synJiITNIzSHe5ktgf5t6MXpOo/IhM0zHXgTNcAoGh8C+fraM8gZrjRWdV0kVTTf1EgaJhnuJPuXhhsQcNVpUhUNDfiIi2c4a2rrlBRx7hifYlkavC3CkHDuMAMlzp6UHhRiea8bE8qc9QgylRPH7GGGQorGgU96qBs3GOGtf2QCEVNthxRHULDfMfdaMzwlPtQcQgNo5oxhs+qQ5g5hn/KphqqejN0dcRqUqGY/PNQGXc6axrwC8Kx3NbgQFuG9WipJa/RElB0tIcRGX79H2eIkBGtmY4MrXkU0dfVdZRmcx2jbVYxiuhn1bMozYo6MiR7o6GS39lLz7sI7fTcJ+1GkPzBNMyHCO209IDJ1lGY4Pfuyux+e8Pwzat9oQIB62C50a1pUD8+oA3+V884Dd7/Rcsg8RF6qOLV9UMgRXQXEM7SAkMIk1Xk8iO0MYkTuAlq8uMQd6LnJinemLEfoYVMfnsETeIslk3pKNoEqz/kATs90MTOxdhNcUKi8LYlZN3AM3+GNEK/qsarNGCnCToQqLGNdWfAEbD/OCyZBguzdCg2WV+YBgnT6LlvUVsyYbLmgvWINhc8P5fjxYZt8uPWtNuUIJioo/NUoLtr5P7P/vX6fn//uH64Nfz8XI7G7cP68f7+/XVzZlTdNhda765BXqmnJX4eVx2YZlA4quyELXAT4AxBfV3zTBeCpv+pHIeCFZ2mBr9QOMHi0VwT5WAp3Xo62SeNEIBBpH6BeizRfNV5g5QaRJq1d6POEOlsLAoku5DGySxlhiWItO2VRRimvDJtGIoxfaJKdTUWJEufbsI3visOIVGlgXlxe8eJoGpU92WqoGj0TYRuCo+R4v5v2QjMyNEGoApH8OebGkOyia+voqHpGGRV86KmTM1fmidfFmjS0BH8qbhsg2Cxpg4+BnkQwSIqLmpKBzq7vxj1OWcRb5QMIrGGWkb0KRYkVuNCzSCah9zFmqLPpzGrGUSwFXqfeSYbwWCzrxUYml8zcKCkQO0F5CuomAuSo6CzrXDAZ7Mr+MCQHqxrqJQBYk2igodI1qQ6L2gwwOjDUEQ2F7ap0N/cYxBdM3XVaeS1NzmHoLuecUAOL7nxsqgJwmALdd104kEzh5yAWcR1WxVyUDIxhN4hRDdiFulBJHumKgfc94oiodiMZvPpprCQuqkv6JH8ZSeKA1WFYyQ6RxFFtGn9AFTYOoZVRFvrvSLlcO6VSNhmL8wL2jYLepSCZJ6gf/9HvrPmPYMkgUj7BakAUoMHoa/VkFGsntGyJlnRMgQW2cFGaBOwQWq4IWDaTmvPXgLK0Emalexxu/xKP5hSWBlmeCDkYXgzlM3hyzRDm6J/GM3Smq9Kl2mGbrrJhemRNM3SRkioySpDphwbWp+VqvhQRensB1PEDGWZIVpOWY4Hj4cPZw+bxzuW3wqn+mWOIZygmbPlBb2zGMwng8Kc3znOBGr9AbhDy0JhNg/OtXSrScEYokE/IySt9oAOk8PQraon42h/WnEcXlJ4ycagrf9cnS3YWQjeQmchy0REXews9RHzGVrM9ij9NjRGLeEpo4vpTmvOMUdoWaHO4EB4Ulua1ohunotFkbnzWVa7MqWaZr7oMwGZmngZKp5rt8NWG55KJqKQvGXV2sPhYjhs14Sn7UQyhU+HGumdRnvMTU4w4mgumWx1WTStAQaDz6hF47YWs7UxmvD0XNOON3MlWxBd2WERHPVAB75+0GTvj6RvdjoP2XkHRD7ytT9BSJJ4eAQ3pHM+9/W239k6Goiz01GEzjdT+Y68o1P850ObzEl+rI75Lgejwl5QH65EWZbUmJ3IN6zdLGJfBvCCTyqdLZZix6vh58fCmxXffOqyFgByf/jhAp0pzNOaL0+o3u/6eq98rv0YdcW7PBUeFzgixAUIid0TiMua2g/4VPyJ7udN1vYl7x7YD5/vBkMdEMSqQnp8j9OnDWjpm4dN/pG0/3/5OfvD7anwu+MrmUaf8A9XgbPr/o/R4e+fN2Ifjaux8FvT3XMcjfm5swwquA4K0ouCdjhZvR2KUzyEt+Xj8rcvPpLN1pL/wfFu56o14ZfP036wt9PFks/I321OddCxwFVL0avploi0SYo9Wn2+/j6a7NDDmvE/FW6nQHTvkWNdCC+CDzfiDIepnDqYfpKjAf/DszRJsRiyP3PQ2rYVBnWjaDNvmvo+RPdMsNEm+Vucrp3WAfvjO9pIZQrgI9TbvpaCDDDv/EuPXu+VY4MSaF/5cGr52Pj9xOuvGvuOgd1kglOCaMv7DgB/r8EM0LaNFdjDFRXegja+gHjZJcl1yLxHYScUz73eK9v5Pb/ZWgMy770BIwlTnsqH7JsH2caGo3jentleLa8Af/qbjX3a9Xjr8unm5cMtpQuHCRk38UhwObBjiFBJunPjkvx4YR/JJjVWaW8Ye9Xyt967n9/KUIsVJ8mwm9eudWfMPX4ZDToM2UV1LMhP5pFktpdTZdgl3W5ZU7izk+yIktx7z5dws4mYZ2gM1j58n9ju8tqbrTRJINW6C7SYeChB68sHX+gZV7L0TieAAaGHfkb4DqzDCcJspQakTYSZpcjwEvoMOxf4/OarFAzpeJ59F/ykAWftt5C0BxKX/XYCBa44KZYHaSLRtPnw9OGr022jylfQa8L8Al0FjuG9bPs0YCB/uhe24Ian5zKCWUZBUSHrpSwv9EzS7+HJA4VMVA8IGmkI6UD+uSEOV5qHaZHPE2LhFCIPTLdYslYf3kADb5MBa7+MzA9zPLZtJHhcqWXbzsTFCc8vYPzwID6wNwfekgQu1UmItQ8nef2MBMclIVrBc8K6LodXYAWr76pP+noP/JKOYri1D8ExOZqR1toN33rZDXvZWme9CqezHTPTpMbaURFwLnoTUc9wSPmwaScokPL8sZUgLSrrrNToNpqraiAMfBGDIJ0aKa1r4Gb7lhBfIlUIrq5pcLhFGbZolGMdZwi9qtjphG1aoouA8RZhAA2vzPrCy3VzRxTCwFsWbIG9pnpi+EhYemH8iXqUAp+FsSd5fUUZruoQbXyPN4SSJW8CgCxCQZXohyeJVuh5G6H2IqenbO15kLOKaUT74dQknxx5E22KYuCSpHMuXoodw7uY/LxTUmks3KDAFf9Wu28qh9LgeC9TBAz+r27tvU5TLJkFi1LOpVY7/opnFFfIDT6IYe0Jw7P0lqZzyXRQO4YONVl88MqbxWAIKnqenGBD8OnczxTLQVwgGcW41t4FVCcI9neiY4TvFVdq/a9i0RJ5zdK41h76hKNgybcxriSmVbGSAD09KTCMae2hT1A1yWtoVCS+oYomxeI8+imixyQE6bHh5Kqm6J8MltIrK1xxJIVn41t73OVtSu5FQ+L9qj6GNsrvIkX0rnqbBJRSUjUkE4TtR/UxNKjVZxn+SjSE5O1XycNRtKAlA8WyMy5KQuXWJNYew0ypTKYsUUK1/JODqmD14/n2HMONRLQYGPhvlHoJLwclIUEm6RCm9Vqhxqk/WqBeSs8Bb/WTWXsMiI8kfK0QeaUD64bFUDSGaPWTWXsM8tKdZLEacA45VzqOojFoxUBM8DU5QVqCMNm6TZaBp1qFjQjEWP2E1h6D1BxO5iK2/J2ovYSLBbX66D05v7SiUWN/FCrGigYkoq+2EFMvYvZ3K3mEVNGQBF6V3hTHg1RcP0iBn0GVaaJ1WwffJe4VxIpl5hgQq5/c2gOggHsSZdqXbLYqu04UJlksl9KYpPYde5SEkBQBUc2JVaeofS/FB47wrxP0wOFQHo1XAU3BSAs76S7Jui3wXJ1OSLIVbGWB4EGS46ezjDCcxWZ4lRGG8eNtlfR0wk4RP952NC1mAVP/+aocOXLkyJEjR44cOXLkyJEjR44cOXLkyJEjRw4N8V8PK/5kbTGJIAAAAABJRU5ErkJggg==" draggable="false" /></div>
                                            <div class="msg">
                                                <center>

                                                    <div class="avatar"> <img id="mediana" height="100%" src="data:image/jpg;base64,<?php echo base64_encode($respuest_aclar['foto']); ?>" /></div>

                                                    <p><?php echo "" . $respuest_aclar["nombre"] . "<br>" . $respuest_aclar["apellidos"] . ""; ?></p>
                                                    <p><?php echo $aclar["Motivo"]; ?></p>
                                                    <p><?php echo $aclar["fecha_creacion"]; ?></p>
                                                </center>

                                            </div>

                                        </li>
                                        <?php

                                        if ($aclar["id_usuario"] == $n) {

                                        ?>



                        <?php
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                </ol>





            </div>


        </div>
    </div>
</div>
</div>
<!-- Modal HTML -->


<form action="hilo2.php" method="post" enctype="multipart/form-data">>
    <div class="modal fade" tabindex="-1" id="modal1">

        <div class="modal-dialog modal-lg  modal-dialog-centered" id="modales">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="" style="position: absolute; left:0;" data-dismiss="modal">&times;</button>

                    <input name="idusuario" type="hidden" value="<?php echo   $n = $_GET['codigo']; ?>" />

                </div>
                <div class="modal-body">
                    <br>
                    <b>Descripcion: *</b>
                    <br>

                    <button type="button" id="close" onclick="MostrarDatos();"><img src="../imagenes/fuentes.png" width="30" height="30" /></button>
                    <button type="button" onclick="Negritas();"><img src="../imagenes/negritas.png" width="30" height="30" /></button>
                    <button type="button" onclick="Quitarnegritas();"><img src="../imagenes/basurero.png" width="30" height="30" /></button>
                    <button type="button" onclick="PonerItalic();"><img src="../imagenes/italic.png" width="30" height="30" /></button>
                    <button type="button" onclick="underline();"><img src="../imagenes/underline.png" width="30" height="30" /></button>
                    <button itype="button" onclick="linea();"><img src="../imagenes/linea.png" width="30" height="30" /></button>
                    <br>
                    <button type="button" onclick="fuentes();"><img src="../imagenes/arial.png" width="30" height="30" /></button>

                    <button type="button" data-toggle='modal' data-target='#modal3'><img src="../imagenes/video.png" width="30" height="30" /></button>
                    <button type="button" onclick="borrar();"><img src="../imagenes/borrar.jpg" width="60" height="60" /></button>
                    <button type="button"><img src="../imagenes/guardar.png" width="30" height="30" /></button>

                    <div id="fuentes" class="dropdown">


                        <div tabindex="0" class="onclick-menu">
                            <ul class="onclick-menu-content">
                                <li><button type="button" id="close" onclick="Limpiar2();" value="">-Seleccione-</button></li>
                                <li><button type="button" onclick="Arial();" id="Arial">Arial</button></li>
                                <li><button type="button" onclick="Helvetica();" id="Helvetica">Helvetica</button></li>
                                <li><button type="button" onclick="Georgia();" id="Helvetica">Georgia</button></li>
                                <li><button type="button" onclick="Times_New_Roman();" id="Helvetica">Times New Roman</button></li>
                                <li><button type="button" onclick="monospace();" value="servicios">Monospace</button></li>
                                <li><button type="button" onclick="Remove_Font_Family();" value="sicea">Remove Font Family</button></li>

                            </ul>
                        </div>

                    </div>


                    <div id="formatos" class="selecionar">

                        <body>


                            <div tabindex="0" class="onclick-menu">
                                <ul class="onclick-menu-content">
                                    <li><button onclick="Limpiar();" value="">-Seleccione-</button></li>
                                    <li><button onclick="Normal_texto();" id="Arial">Normal texto</button></li>
                                    <li><button onclick="heading_1();" id="Helvetica">Heading 1</button></li>
                                    <li><button onclick="heading_2();">Heading 2 </button></li>
                                    <li><button onclick="heading_3();" id="Helvetica">Heading 3</button></li>
                                    <li><button onclick="heading_4();" value="servicios">Heading 4 </button></li>
                                    <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>
                                    <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>

                                </ul>
                            </div>
                    </div>


                    <ul id="dynamic-list"></ul>

                    <textarea id="comentarios_notas" name="comentarios" id="caja" rows="10" cols="40">

                                            </textarea>
                    <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                    <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
                    <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />


                    <a href="#" class="btn btn-success" role="button" onclick="borrar_detalles();" aria-pressed="true">Restablecer</a>
                    <button class="btn btn-danger">
                        Publicar</button> <a href="#" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal" aria-pressed="true">Cancelar</a>
                    <style>
                        .btn-file {
                            position: relative;
                            overflow: hidden;
                        }

                        .form-group {
                            padding: 30px;
                        }

                        .btn-file input[type=file] {
                            position: absolute;
                            top: 0;
                            right: 0;
                            min-width: 100%;
                            min-height: 100%;
                            font-size: 100px;
                            text-align: right;
                            filter: alpha(opacity=0);
                            opacity: 0;
                            outline: none;
                            background: white;
                            cursor: inherit;
                            display: block;
                        }

                        .input-group {
                            margin-bottom: 30px;
                        }

                        #img-upload {
                            width: 150px;
                            height: 150px;
                        }

                        .as-console-wrapper {
                            display: none !important;
                        }
                    </style>
                    <script>
                        $(document).ready(function() {
                            $(document).on('change', '.btn-file :file', function() {
                                var input = $(this),
                                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                                input.trigger('fileselect', [label]);
                            });

                            $('.btn-file :file').on('fileselect', function(event, label) {

                                var input = $(this).parents('.input-group').find(':text'),
                                    log = label;

                                if (input.length) {
                                    input.val(log);
                                } else {
                                    if (log) alert(log);
                                }

                            });

                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#img-upload').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $("#imgInp").change(function() {
                                readURL(this);
                            });
                        });
                    </script>
                    <div class="container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Suba una imagen</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Subir <input class="btn btn-success" type="file" name="imagen" accept="image/*" id="imgInp">
                                        </span>
                                    </span>
                                    <input type="text" name="img" class="form-control" readonly>
                                </div>
                                <img id='img-upload' />
                            </div>
                        </div>
                    </div>
</form>
</div>
</div>
</div>
</div>

</div>

</div>
</div>

<div class="container">


    <form action="tarea3.php" method="post" enctype="multipart/form-data">

        <div class="modal fade" tabindex="-1" id="crear_tarea">
            <div class="modal-dialog modal-lg  modal-dialog-centered" id="modales">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="" style="position: absolute; left:0;" data-dismiss="modal">&times;</button>

                        <input name="idusuario" type="hidden" value="<?php echo   $n = $_GET['codigo']; ?>" />
                        <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />

                    </div>
                    <div class="modal-body">
                        <h6>Por favor describa el problema</h6>
                        <b>Titulo:*</b>
                        <input class="w3-input" id="titulos" name="titulos_creacion" type="text"> <br>
                        <b>Descripcion: *</b>
                        <br>
                        <input name="id_cola" type="hidden" value="<?php echo $id_cola = $_GET["id_cola"]; ?>" />

                        <button type="button" id="close" onclick="MostrarDatos();"><img src="../imagenes/fuentes.png" width="30" height="30" /></button>
                        <button type="button" onclick="Negritas();"><img src="../imagenes/negritas.png" width="30" height="30" /></button>
                        <button type="button" onclick="Quitarnegritas();"><img src="../imagenes/basurero.png" width="30" height="30" /></button>
                        <button type="button" onclick="PonerItalic();"><img src="../imagenes/italic.png" width="30" height="30" /></button>
                        <button type="button" onclick="underline();"><img src="../imagenes/underline.png" width="30" height="30" /></button>
                        <button itype="button" onclick="linea();"><img src="../imagenes/linea.png" width="30" height="30" /></button>
                        <br>
                        <button type="button" onclick="fuentes();"><img src="../imagenes/arial.png" width="30" height="30" /></button>

                        <button type="button" id="close" data-toggle='modal' data-target='#imagenesfoto'><img src="../imagenes/images.png" width="30" height="30" /></button>
                        <button type="button" data-toggle='modal' data-target='#modal3'><img src="../imagenes/video.png" width="30" height="30" /></button>
                        <button type="button" onclick="borrar();"><img src="../imagenes/borrar.jpg" width="60" height="60" /></button>
                        <button type="button"><img src="../imagenes/guardar.png" width="30" height="30" /></button>

                        <div id="fuentes" class="dropdown">


                            <div tabindex="0" class="onclick-menu">
                                <ul class="onclick-menu-content">
                                    <li><button type="button" id="close" onclick="Limpiar2();" value="">-Seleccione-</button></li>
                                    <li><button type="button" onclick="Arial();" id="Arial">Arial</button></li>
                                    <li><button type="button" onclick="Helvetica();" id="Helvetica">Helvetica</button></li>
                                    <li><button type="button" onclick="Georgia();" id="Helvetica">Georgia</button></li>
                                    <li><button type="button" onclick="Times_New_Roman();" id="Helvetica">Times New Roman</button></li>
                                    <li><button type="button" onclick="monospace();" value="servicios">Monospace</button></li>
                                    <li><button type="button" onclick="Remove_Font_Family();" value="sicea">Remove Font Family</button></li>

                                </ul>
                            </div>

                        </div>


                        <div id="formatos" class="selecionar">

                            <body>


                                <div tabindex="0" class="onclick-menu">
                                    <ul class="onclick-menu-content">
                                        <li><button onclick="Limpiar();" value="">-Seleccione-</button></li>
                                        <li><button onclick="Normal_texto();" id="Arial">Normal texto</button></li>
                                        <li><button onclick="heading_1();" id="Helvetica">Heading 1</button></li>
                                        <li><button onclick="heading_2();">Heading 2 </button></li>
                                        <li><button onclick="heading_3();" id="Helvetica">Heading 3</button></li>
                                        <li><button onclick="heading_4();" value="servicios">Heading 4 </button></li>
                                        <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>
                                        <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>

                                    </ul>
                                </div>
                            </body>
                        </div>


                        <ul id="dynamic-list"></ul>

                        <textarea name="comentarios" id="caja" rows="10" cols="40">

                                            </textarea>

                        <br>
                        <br>

                        <label class="control-label" for="fichero1">Añadir nuevo fichero</label>
                        <div class="controls">

                            <label for="email1">Titulo del archivo</label>
                            <input type="text" name="Titulo"> <br><br>
                            <label for="email1">Descripcion del archivo</label>
                            <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
                            <input id="fichero1" type="file" style="display:none" name="uploadedFile">
                            <div class="input-append">
                                <input id="falso1" class="input-xlarge" type="text">
                                <a class="btn btn-file btn btn-primary btn-lg active "></a><i class="fa fa-folder-open-o"></i> Seleccionar</a>
                            </div>
                        </div>

                        <script type="text/javascript">
                            // http://duckranger.com/2012/06/pretty-file-input-field-in-bootstrap/ 
                            // Cuando se pulsa el falso manda el click al autentico
                            $('.btn-file').on('click', function() {
                                $(this).parent().prev().click();
                            });
                            // Cuando el autentico cambia hace cambiar al falso
                            $('input[type=file]').on('change', function(e) {
                                $(this).next().find('input').val($(this).val());
                            });
                        </script>
                        <h5> Visibilidad y asignación de tarea:* </h5>
                        <b>Departamento:*</b>

                        <select id="departa" name="departamentos">
                            <?php
                            include("conexion2.php");

                            $query2 = $mysqli->query("SELECT *FROM departamento");
                            if ($query2) {
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                    echo '<option ="' . $valores2['id_rol'] . '">' . $valores2['nombre'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <div id="proct">
                            <b>Procurador: </b>
                            <br>
                            <select id="depart" name="procurador">

                                <?php
                                include("conexion2.php");

                                $query2 = $mysqli->query("SELECT *FROM usuario where id_rol=1");
                                if ($query2) {
                                    while ($valores2 = mysqli_fetch_array($query2)) {
                                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                        echo '<option ="">' . $valores2['id_usuario'] . '&nbsp;&nbsp;' . $valores2['nombre'] . '&nbsp;' . $valores2['apellidos'] . '</option>';
                                    }
                                }
                                ?>

                            </select>

                            <?php
                            include("conexion2.php");

                            $n = $_GET['codigo'];
                            $query2 = $mysqli->query("SELECT *FROM usuario where id_usuario='$usur'");
                            if ($query2) {
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                            ?>
                                    <b>Creador de la tarea: </b>
                                    <input type="text" readonly="readonly" name="creador_nombre2" maxlength="4" value="<?php echo $valores2["nombre"]; ?>">
                                    <input type="text" readonly="readonly" name="apellidos_creador2" maxlength="4" value="<?php echo $valores2["apellidos"]; ?>">


                            <?php
                                }
                            }
                            ?>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                M.AutoInit();
                            });
                        </script>
                        <div class="row">
                            <div class="col 14 offset-14">
                                <br>

                                <p><span>Coloque la fecha de vencimiento</span></p>
                                <input id="fechas_creacion" type="text" class="datepicker" name="fech" width="40%" height="40%" name="" value=""> <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                    <label for="">Ingresar tu fecha</label>

                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m3"></div>
                                    <div class="col s12 m6">
                                        <b>Hora de vencimiento</b>

                                        <div class="input-field">
                                            <input type="text" id="time" name="hora" class="timepicker">
                                        </div>

                                        <script>
                                            const timer = document.querySelector('timepicker');
                                            M.Timepicker.init(time, {
                                                showClearBtn: true,
                                                i18n: {
                                                    clear: 'remove',
                                                    cancel: 'No',
                                                    done: 'Yes'
                                                }
                                            });
                                        </script>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <a href="#" class="btn btn-success" role="button" onclick="borrar_detalles();" aria-pressed="true">Restablecer</a>

                        <button class="btn btn-danger">
                            Crear tarea
                        </button> <a href="#" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal" aria-pressed="true">Cancelar</a>

                    </div>

                </div>
            </div>

        </div>
</div>


<div class="container">

    <body>
        <div class="modal fade" tabindex="-1" id="imagenesfoto">
            <div class="modal-dialog modal-xs modal-dialog-centered" id="video">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Imagen</b>
                        <button class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" id="video">


                        <center>
                            <label for="imageUpload" type="button"><img src="../imagenes/images.png" width="60" height="60" />Suba una imagen</label>
                            <input type="file" name="imagen" accept="image/*" id="imageUpload" style="display: none" style="text-shadow: 0 0 30px rgb(48, 26, 241); box-shadow: 0 0 20px rgb(19, 70, 238);" onchange="loadFile(event)">
                            <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                            <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />

                            </p> <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                        </center>
                        <img width="50%" height="50%" style="border-radius: 10em; text-shadow: 0 0 30px rgb(48, 26, 241); box-shadow: 0 0 20px rgb(19, 70, 238);" class="sombra" id="output" />

                    </div>
                </div>
                <div class="modal-footer">

    </body>
</div>
</div>
</div>
</div>




</form>
</div>

</div>
<div class="container">

    <body>



        <div class="container">

            <body>
                <div class="modal fade" tabindex="-1" id="modal3">
                    <div class="modal-dialog modal-xs modal-dialog-centered" id="video">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b>VIDEOS</b>
                                <button class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body" id="video">

                                <div class="file-upload">
                                    <h3>Suba dreccion de video</h3>
                                    <textarea name="video" id="videos" cols="30" rows="10">URL:</textarea>
                                    <button type="button" onclick="redireccionar();" class="btn btn-primary" type="submit">Subir link</button>
                                </div>
                            </div>
                            <div class="modal-footer">

            </body>
        </div>
</div>
</div>
</div>


</div>
</div>
</div>


<form action="hilo.php" method="post" enctype="multipart/form-data">

    <div class="modal fade" tabindex="-1" id="editar_hilo">
        <div class="modal-dialog modal-lg  modal-dialog-centered" id="modales">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="" style="position: absolute; left:0;" data-dismiss="modal">&times;</button>

                    <input name="idusuario" type="hidden" value="<?php echo   $n = $_GET['codigo']; ?>" />

                </div>
                <div class="modal-body">
                    <h6>Modificar entrada del hilo</h6>
                    Publicar <b>Descripcion: *</b>
                    <br>

                    <button type="button" id="close" onclick="MostrarDatos();"><img src="../imagenes/fuentes.png" width="30" height="30" /></button>
                    <button type="button" onclick="Negritas();"><img src="../imagenes/negritas.png" width="30" height="30" /></button>
                    <button type="button" onclick="Quitarnegritas();"><img src="../imagenes/basurero.png" width="30" height="30" /></button>
                    <button type="button" onclick="PonerItalic();"><img src="../imagenes/italic.png" width="30" height="30" /></button>
                    <button type="button" onclick="underline();"><img src="../imagenes/underline.png" width="30" height="30" /></button>
                    <button itype="button" onclick="linea();"><img src="../imagenes/linea.png" width="30" height="30" /></button>
                    <br>
                    <button type="button" onclick="fuentes();"><img src="../imagenes/arial.png" width="30" height="30" /></button>

                    <button type="button" data-toggle='modal' data-target='#modal3'><img src="../imagenes/video.png" width="30" height="30" /></button>
                    <button type="button" onclick="borrar();"><img src="../imagenes/borrar.jpg" width="60" height="60" /></button>
                    <button type="button"><img src="../imagenes/guardar.png" width="30" height="30" /></button>

                    <div id="fuentes" class="dropdown">


                        <div tabindex="0" class="onclick-menu">
                            <ul class="onclick-menu-content">
                                <li><button type="button" id="close" onclick="Limpiar2();" value="">-Seleccione-</button></li>
                                <li><button type="button" onclick="Arial();" id="Arial">Arial</button></li>
                                <li><button type="button" onclick="Helvetica();" id="Helvetica">Helvetica</button></li>
                                <li><button type="button" onclick="Georgia();" id="Helvetica">Georgia</button></li>
                                <li><button type="button" onclick="Times_New_Roman();" id="Helvetica">Times New Roman</button></li>
                                <li><button type="button" onclick="monospace();" value="servicios">Monospace</button></li>
                                <li><button type="button" onclick="Remove_Font_Family();" value="sicea">Remove Font Family</button></li>

                            </ul>
                        </div>

                    </div>


                    <div id="formatos" class="selecionar">

                        <body>


                            <div tabindex="0" class="onclick-menu">
                                <ul class="onclick-menu-content">
                                    <li><button onclick="Limpiar();" value="">-Seleccione-</button></li>
                                    <li><button onclick="Normal_texto();" id="Arial">Normal texto</button></li>
                                    <li><button onclick="heading_1();" id="Helvetica">Heading 1</button></li>
                                    <li><button onclick="heading_2();">Heading 2 </button></li>
                                    <li><button onclick="heading_3();" id="Helvetica">Heading 3</button></li>
                                    <li><button onclick="heading_4();" value="servicios">Heading 4 </button></li>
                                    <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>
                                    <li><button onclick="heading_5();" value="sicea">Heading 5</button></li>

                                </ul>
                            </div>
                        </body>
                    </div>


                    <br>



                    <ul id="dynamic-list"></ul>

                    <textarea name="comentarios2" id="caja" rows="10" cols="40">
                                            <?php echo $descripcion_tarea ?>
                                            </textarea>
                    <a href="#" class="btn btn-success" role="button" onclick="borrar();" aria-pressed="true">Restablecer</a>

                    <a href="#" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal" aria-pressed="true">Cancelar</a>

                    <button class="btn btn-danger">
                        Actualizar </button>
                    <br>
                    <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden" style="max-width:30%;width:auto;height:auto;">

                        <div id="start">

                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Seleccione una imagen</div>
                            <div id="notimage" class="hidden">Por favor escoja una imagen</div>
                            <span id="file-upload-btn" class="btn btn-primary">seleciona el archivo</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <b>Imagen nueva</b>

                            <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                            <br>
                            <b>Imagen actual</b>
                            <br>
                            <td><img id="mediana" style="max-width:30%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($imagenes); ?>" />


                                < </div>
                    </label>
                    <br>

                    </p> <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                    <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
                    <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />

                    </p> <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />

                </div>


            </div>

        </div>

    </div>
    </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modalvideo">
        <div class="modal-dialog modal-xs modal-dialog-centered" id="">
            <div class="modal-content">
                <div class="modal-header">
                    <b>VIDEOS</b>
                    <button class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="video">

                    <div class="file-upload">
                        <h3>Suba dreccion de video</h3>
                        <textarea name="video" id="videos2" cols="30" rows="10">URL:</textarea>
                        <button type="button" onclick="redireccionar2();" class="btn btn-primary" type="submit">Subir link</button>
                    </div>
                </div>
                <div class="modal-footer">


                    </body>
                </div>


            </div>
        </div>
    </div>
    </div>

</form>

</div>
</div>
</div>
<form action="equipos.php" method="POST">
    <div class="modal fade" tabindex="-1" id="equipo" role="dialog">
        <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:800px;" id="modales">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">
                    <h6>Asignar equipo</h6>

                    <b>Equipo: </b>
                    <br>

                    <select id="depart" REQUIRED name="equipos_selec">
                        <?php
                        include("conexion2.php");

                        $query2 = $mysqli->query("SELECT *FROM equipo WHERE idEquipo!=894");
                        if ($query2) {
                            while ($valores2 = mysqli_fetch_array($query2)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                include("conexion2.php");

                                $equipo = $mysqli->query("SELECT *FROM usuario WHERE id_usuario=" . $valores2['idUsuario'] . "");
                                if ($equipo) {
                                    while ($recorre_equipo = mysqli_fetch_array($equipo)) {
                                        echo '<option ="">' . $recorre_equipo['id_usuario'] . '&nbsp;&nbsp;' . $recorre_equipo['nombre'] . '&nbsp;' . $recorre_equipo['apellidos'] . '</option>';
                                    }
                                }
                            }
                        }
                        ?>

                    </select>
                    <br>
                    <br>

                    <textarea REQUIRED name="aclaracion_equipo" placeholder="Razón para borrar esta tarea (opcional)" id="caja" rows="10" cols="40">

                                            </textarea>

                    <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                    <input name="id_usuario" type="hidden" value="<?php echo $usur; ?>" />
                    <a href="#" class="btn btn-success" role="button" onclick="borrar();" aria-pressed="true">Restablecer</a>
                    <button name="asignar_equipo" class="btn btn-danger" style="width:200px;" value="<?php
                                                                                                        $agente = 'equpo';
                                                                                                        echo $agente; ?>">
                        Asignacion de equipo</button> <a href="#" class="btn btn-primary btn-lg active" role="button" data-dismiss="modal" aria-pressed="true">Cancelar</a>

</form>
</div>

</div>

</div>

</div>

</div>



</div>
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
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/mostrar.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>

</html>