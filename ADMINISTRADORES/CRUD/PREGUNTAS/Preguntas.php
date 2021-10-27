<?php
include ('../conexion.php');
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
$id=$_GET['id'];
$q = "SELECT * FROM pregunta";
$q2 ="SELECT id_categ, tema FROM categoria";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Preguntas</title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- FONTAWESOME STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets.JF/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets.JF/css/basic.css" rel="stylesheet" />
    <link href="../assets.JF/css/custom.css" rel="stylesheet" />    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">
                        Toggle navigation
                    </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../TAREAS/mensajeria.php?cod=<?php echo $n?>">UTP</a>
                <img src="../assets.JF/img/oficial-logo.png" class="img-thumbnail" width="75px" />
            </div>
            <div class="header-right">
                <?php echo "<a style='color:white;'href='/UTP/AGENTE/PANEL DE CONTROL/panel_control.php?cod=$n'>";?> Panel Agente</a>   | <a style="color:white;"href="/UTP/ADMINISTRADORES/cerrar_sesion.php">Cerrar sesión</a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <?php
                                include "../conexion.php";
                                $query="SELECT * FROM usuario WHERE id_usuario='$n'";
                                $resultado=$conexion->query($query);
                                while($row=$resultado->fetch_assoc()){
                            ?>
                            <img  id="mediana" height="100%" class="img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?> "/>
                            <div class="inner-text">
                                <?php
                                    echo "<p style='color:white;'> Bienvenido " .($row['nombre']).' '. ($row['apellidos'] . "</p>");  
                                }?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <?php echo "<a href='../USUARIO/Usuarios.php?cod=$n'><i class='fa fa-user' aria-hidden='true'></i>Usuarios</a>";?>
                    </li>
                    <li>
                        <?php echo "<a href='../ORGANIZACIONES/departamentos.php?cod=$n'><i class='fa fa-building' aria-hidden='true'></i>Departamentos</a>";?>
                    </li>
                    <li>
                        <?php echo "<a href='../EQUIPOS/Equipos.php?cod=$n'><i class='fa fa-comments' aria-hidden='true'></i>Equipos</a>";?>
                    </li>
                    <li>
                        <?php echo "<a href='../ROLES/Roles.php?cod=$n'><i class='fa fa-hand-o-up'  aria-hidden='true'></i>Roles</a>";?>
                    </li>
                    <li>
                        <?php echo "<a href='../ESTATUS/Estatus.php?cod=$n'><i class='fa fa-cog' aria-hidden='true'></i>Estatus</a>";?>
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
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Preguntas</h1>
                        <div class="headerseparador">
                            <label for="btn-modal" class="btn btn-success">Insertar Nueva Pregunta</label>
                        </div>
                        <div class="container">                                                        
                            <br>
                            <input type="checkbox" id="btn-modal">
                            <div class="modal">
                                <form action="insertar.php?cod=<?php echo $n?>" method="post">
                                    <div class="contenedor">
                                        <header>Nuevo Registro</header>
                                        <label for="btn-modal">X</label>
                                        <div class="contenido"> 
                                            <h4>Categoria:</h4>
                                            <select name="categoria" id="categoria" class="btn btn-primary">
                                                <?php include "../conexion.php";$respuesta2 = mysqli_query($conexion, $q2);
                                                    while($row2=mysqli_fetch_row($respuesta2)) {?>
                                                    <option value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>
                                                <?php } mysqli_free_result($respuesta2) ?>
                                            </select>
                                            <br>
                                            <h4>Pregunta:</h4>
                                            <input type="text" style="width: 430px" name="pregunta" id="pregunta" placeholder="Escriba la pregunta">
                                            <br>
                                            <h4>Respuesta:</h4>
                                            <input type="text" style="width: 430px" name="respuesta" id="respuesta" placeholder="Escriba la respuesta">
                                            <br>
                                            <div class="header-right">
                                                <button class="btn btn-success">Aceptar</button>
                                            </div>
                                            <br><br>
                                        </div>                                            
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr> 
                                        <th><i class="bi bi-stickies-fill"></i> ID PREGUNTA </th>
                                        <th><i class="bi bi-calendar-check"></i> CREACION </th>
                                        <th><i class="bi bi-calendar-check"></i> ACTUALIZACION </th>
                                        <th><i class="bi bi-award"></i> CATEGORIA </th>
                                        <th><i class="bi bi-exclamation-lg"></i> PREGUNTA </th>
                                        <th><i class="bi bi-hand-index-thumb"></i> RESPUESTA </th>
                                        <th><i class="bi bi-bar-chart-steps"></i> OPCIONES </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include "../conexion.php";$respuesta = mysqli_query($conexion, $q);
                                        while($row=mysqli_fetch_row($respuesta)) {?>
                                        <form action="actualizar.php?cod=<?php echo $n?>" method="post">
                                            <tr>
                                                <td>
                                                     ° <?php echo $row[0] ?>
                                                    <input type="hidden" name="id" value="<?php echo $row[0] ?>">    
                                                </td>
                                                <td><?php echo $row[1] ?></td>
                                                <td><?php echo $row[2] ?></td>
                                                <td>
                                                    <select name="categoria" id="categoria" class="btn btn-primary" style="width: 100px">
                                                        <?php $respuesta2 = mysqli_query($conexion, $q2);
                                                            while($row2=mysqli_fetch_row($respuesta2)) {
                                                            if ($row2[0] == $row[3])
                                                            {?>
                                                                <option value="<?php echo $row2[0] ?>" selected="selected"><?php echo $row2[1] ?></option>
                                                            <?php }
                                                            else { ?>
                                                                <option value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>
                                                        <?php } } mysqli_free_result($respuesta2) ?>                                                        
                                                    </select>
                                                </td>
                                                <td><input type="text" name="pregunta" style="width: 150px" value="<?php echo $row[5] ?>"></td>
                                                <td><input type="text" name="respuesta" style="width: 180px" value="<?php echo $row[4] ?>"></td>
                                                <td>                                                    
                                                    <button class="btn btn-warning">Actualizar</button>                                                    
                                                    <button class="btn btn-danger"><a class="table__item" href="eliminar.php?id=<?php echo $row[0]; ?>&cod=<?php echo $n?>">Eliminar</a></button>
                                                </td>
                                            </tr>
                                        </form> 
                                    <?php } mysqli_free_result($respuesta) ?>                             
                                </tbody>
                            </table>
                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div id="footer-sec">
        &copy; 2021 Universidad Tecnologica de Puebla |  Hecho por: UTP Team
    </div>
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