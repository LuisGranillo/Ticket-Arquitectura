 



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
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <link href="../assets/css/basic.css" rel="stylesheet" />
   <!--CUSTOM MAIN STYLES-->
   <link href="../assets/css/custom.css" rel="stylesheet" />
   <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.css">
   <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
   <!-- Minified Bootstrap CSS -->

<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Minified Bootstrap JS -->
   <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../CSSAGENTE/tablas.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="../CSSAGENTE/estilos.css">
   <link rel="stylesheet" href="../CSSAGENTE/tareas_2.css">

   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="../CSSAGENTE/Tareas.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script type="text/javascript" src="../js/materialize.js"></script>
   <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.7.0/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../js/check.js"></script>

</head>

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
                 $n=$_POST['codigo'];
                    include("conexion4.php");
                 $si= "SELECT * FROM usuario WHERE id_usuario = $n";
                 $si2=mysqli_query($conexion,$si);
                 $fin=mysqli_fetch_array($si2);
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
        <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                        <div class="user-img-div">
                            <center> 
                        <div class="user-img-div">
                                <?php
                                include("conexion4.php");
                       

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
<br>
<br>
                                      
                                 
<?php

include("conexion3.php");

                               
$cuenta=0;                                 
$querycolas = $mysqli -> query ("SELECT*FROM  colas_de_tareas WHERE id_creador='$n'");

if($querycolas)
{ while ($colas = mysqli_fetch_array($querycolas)) {
    if ($colas['estado']=='Abierto') {
        $cuenta += 1;
    }
}
}
include("conexion3.php");
                                         
                              $cuenta3=0;  
$querycolas = $mysqli -> query ("SELECT*FROM colas_de_tareas WHERE id_creador='$n'");
if ($querycolas) {
    while ($colas = mysqli_fetch_array($querycolas)) {
        if ($colas['estado']=='Completado') {
            $cuenta3 += 1;
        }
    }
}
$cuenta2=0;
$queryc = $mysqli -> query ("SELECT *FROM tarea WHERE id_usuario='$n'");
while ($valoresc = mysqli_fetch_array($queryc)) {

   $cuenta2 += 1;    


} 
include ("conexion2.php");
$cuenta4=0;
$procuradores_de_tareas = $mysqli -> query ("SELECT *FROM usuario WHERE id_usuario='$n'");
if ($procuradores_de_tareas) {
    while ($rescatar = mysqli_fetch_array($procuradores_de_tareas)) {
        $nombre_completo= $rescatar['nombre'].'\n'.$rescatar['apellidos'];
        include("conexion3.php");
        $procurador_tr = $mysqli -> query("SELECT *FROM tarea WHERE procurador='$nombre_completo'");
        while ($restt = mysqli_fetch_array($procurador_tr)) {
            $cuenta4 += 1;
        }
    }
}
include("conexion3.php");
$cuenta_equipo=0;
$tareas_asignadas_por_equipo = $mysqli -> query ("SELECT *FROM tarea WHERE idequipo='$n'");
if ($tareas_asignadas_por_equipo) {
    while ($restt = mysqli_fetch_array($tareas_asignadas_por_equipo)) {
        $cuenta_equipo += 1;
    }
}
    
     
                                    
                                       ?>   
       <?php                                     
            include ("conexion2.php");
            $cuenta_colaborando=0;

            $colaborador_tarea = $mysqli -> query ("SELECT *FROM colaborador WHERE id_actualizaciones='$n'");
            if ($colaborador_tarea) {
                while ($colaborador = mysqli_fetch_array($colaborador_tarea)) {
                    $tar=$colaborador['id_tarea'];
         
                    include("conexion3.php");

                    $tareas_asignada_colab = $mysqli -> query("SELECT *FROM tarea WHERE idTarea=".$colaborador['id_tarea']."");
                    if($tareas_asignada_colab)
                    {
                    while ($tar_asig = mysqli_fetch_array($tareas_asignada_colab)) {
                        $cuenta_colaborando += 1;
                    }
                    }
                }
            }
           ?>             
        
                        
        
           
                        <nav class="navegacion">
       
			<ul class="menu">

<li>               <form action="regreso_correo.php" method="post">

<button ><img src="../imagenes/task.jpg" width="70" height="70" /></button>

<?php  $n=$_POST['codigo'];?>
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />
<br>
<br>
<a><i></i><?php echo "Tareas creadas: $cuenta2 " ?></a>


                </form>
                </li>
				<li> <button data-toggle='modal' data-target='#modal1' ><img src="../imagenes/abierto.jpeg" width="70" height="70" /></button>
  <br>
                <a href="#" data-toggle='modal' data-target='#modal1'><i></i>Nueva tarea</a>
</li>
				<li>               <form action="abierto.php" method="post">

<button ><img src="../imagenes/task.png" width="70" height="70" /></button>

<?php  $n=$_POST['codigo'];?>
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />
<br>
<br>
<a><i></i><?php echo "Abierto: $cuenta" ?></a>

</form></li>
<li>               <form action="completado.php" method="post">

<button ><img src="../imagenes/completamente.png" width="70" height="70" /></button>

<?php  $n=$_POST['codigo'];?>
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />
<br>
<br>
<a><i></i><?php echo "Completadas: $cuenta3" ?></a>


</form>

<li>               <form action="jefe_equipo.php" method="post">

<button ><img src="../imagenes/jefe.png" width="70" height="70" /></button>

<?php  $n=$_POST['codigo'];?>
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />
<br>
<br>
<a><i></i><?php echo "    &nbsp;&nbsp;&nbsp;&nbsp;Equipos: $cuenta_equipo" ?></a>


</form>
</li> 
<li>               <form action="colaborador_asignado.php" method="post">

<button ><img src="../imagenes/colab.png" width="70" height="70" /></button>

<?php  $n=$_POST['codigo'];?>
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />
<br>
<br>
<a><i></i><?php echo "    &nbspColaboraciones: $cuenta_colaborando" ?></a>


</form>
</li> 
<form action="asignadas.php" method="post">

<button ><img src="../imagenes/asignado.jpg" width="70" height="70" /></button>

<?php  $n=$_POST['codigo'];?>
<input name="codigo" type="hidden" value="<?php echo $n; ?>" />
<br>
<br>
<a><i></i><?php echo "Mis tareas asignadas: $cuenta4" ?></a>

</form></li>
       </ul>
   </nav>
     
                        <div class="dropdown">
              <center>
                        <button ><img src="../imagenes/CARGA.png" width="40" height="40" /></button>

<a href="#" data-toggle='modal' data-target='#modal1'><i></i><h3>TAREAS</h3> </a>

<br>
</center>
<br>
<br>
<br>    
<div class="search-box">
                      <input list="colores"  class="search-input" name="usuarios" type="text" id="searchTerm"  type="text" onkeyup="doSearch(this.value)"placeholder="TAREAS" />
                      <img src="../imagenes/b.png" style="border raidus: 5px;"width="20" height="20" />

                    </a>     
</div>


</button>
                            <div class="dropdown-menu" >
                              <?php echo "<a  href='../TAREAS/new.php?codigo=$n'>"?><i class='dropdown-item'></i>Creado más reciente</a>
                              <?php echo "<a  href='../TAREAS/time_tarea.php?codigo=$n'>"?><i class='dropdown-item'></i>Fecha de Vencimiento</a>

                              <?php echo "<a  href='../TAREAS/tareas.php?codigo=$n'>"?><i class="fa fa-arrow-down fa-lg"></i>Tarea Número</a>
                              <?php echo "<a  href='../TAREAS/hilos.php?codigo=$n'>"?><i class='dropdown-item'></i>Hilos más largos</a>

                     

                            </div>
                            <form action="eliminacion.php" method="POST">

                            <button  type="button"  data-toggle='modal' data-target='#modal3' aria-haspopup="true" aria-expanded="false">
                                <img src="../imagenes/eliminar_tarea.png" width="40" height="40" />
                            </button>
                            <button  type="button"  data-toggle='modal' data-target='#agente' aria-haspopup="true" aria-expanded="false">
                                <img src="../imagenes/agentes.png" width="60" height="60" />
                            </button>
                            <button  type="button"  data-toggle='modal' data-target='#departamento' aria-haspopup="true" aria-expanded="false">
                                <img src="../imagenes/departamento.jpeg" width="60" height="60" />
                            </button>
                            <button  type="button"  data-toggle='modal' data-target='#equipo' aria-haspopup="true" aria-expanded="false">
                                <img src="../imagenes/equipos.png" width="60" height="60" />
                            </button>
                            <input name="idusuario" type="hidden" value="<?php echo $n=$_POST['codigo']; ?>" />

                          </div>

                        

                        <br>
               
                        <button ><img src="../imagenes/CARGA.png" width="40" height="40" /></button>

                        <a href="#" data-toggle='modal' data-target='#modal1'><i></i><h3>TAREAS</h3> </a>
                        
                   
                        <br>
               
              
                        <table id="datos" style="width: 100%;"  class="w3-table w3-bordered w3-striped" >

                        <tr >
                    <th colspan="1">Seleccionar</th>
                    <th >n.º</th>
                    <th>Fech de Vencimiento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Titulo</th>
                    <th>Departamento</th>


             

                  
                    <th >Asignado a:</th>






                                         <?php
                                          
                                             $n=$_POST['codigo'];
                                             include("conexion3.php");
                                                                          
         $querycolas2 = $mysqli -> query ("SELECT*FROM  colas_de_tareas WHERE id_creador='$n'");
    while ($colas2 = mysqli_fetch_array($querycolas2)) {
if($colas2['estado']=='Abierto'){
    if($colas2['id_creador']==$n){

                                         
        $query2 = $mysqli -> query ("SELECT*FROM  tarea WHERE id_cola=". $colas2['id_cola'] ."");
        if ($query2) {
            while ($valores2 = mysqli_fetch_array($query2)) {
                $n=$_POST['codigo'];
              
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                echo "<tr>";
                $Arreglo='TAREAS[]';
                echo "<tr>";
                $Arreglo2=  "<td>  <input type='checkbox' name='$Arreglo' value='" .$valores2['idTarea'] . "'></td>";
                echo $Arreglo2;
                echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['idTarea'].'</td>';

                echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Vencimiento'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a id="cclinico" href="tareas2.php?id='.$valores2['idTarea'].'&codigos='.$n.'&codigo='.$n.'';


                echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Titulo'].'</td>';

                echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Departamento'].'</td>';
                echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['procurador'].'</td>';

                echo "</tr>";
            }
        }
      
    }
     }

}
                                 
                           
                                             
                           
                                                ?>
                                                
                                        
                                                <tr class='noSearch hide'>

<td colspan="5"></td>
<tr>
                                          
                                          <td colspan="11">Seleccionar :   <input type="checkbox" onclick="marcar(this);" /> Todos| Ninguno </td> 
                                     </tr>
             
</tr>

</table>
                          
</div>
                                                    </div>
                                                </div>               
                                      
                                                <div class="modal fade" tabindex="-1" id="agente" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                   
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Asignar agente</h6>  
 
                                                        <b>Procurador: </b>
                                                <br>
                                         
                                                <select class="form-control form-control-lg"  id="depart" REQUIRED name="procurador" >
                                                <?php
 include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM usuario where id_rol=1");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                          echo '<option ="">'.$valores2['id_usuario'].'&nbsp;&nbsp;'.$valores2['nombre'].'&nbsp;'.$valores2['apellidos'].'</option>';
                                                      }
                                                  }
                                                ?>      
     
</select>
                                     <br>
                                     <br>
                               
                                            <textarea REQUIRED name="explicacion"   placeholder="Razón para borrar esta tarea (opcional)" id="caja" rows="10" cols="40">

                                            </textarea>
                                            <input name="id_usuario" type="hidden" value="<?php echo $n; ?>" />

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
<button name="asignar_agente" class="btn btn-danger" style="width:200px;"value="<?php 
$agente='Asignacion de agente'; echo $agente; ?>" >
Asignacion de agente</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
                            
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
                                      
                                                <div class="modal fade" tabindex="-1" id="departamento" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                   
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Transferir</h6>  
                                            <b>Departamento:*</b>
                                  
                                            <select class="form-control form-control-lg" id="departa" REQUIRED name="departamentos" >
                                            <?php
 include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM departamento ");
                                                 
                                                 if($query2)
                                                 { while ($valores2 = mysqli_fetch_array($query2)) {
                                                     // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                     echo '<option ="'.$valores2['id_rol'].'">'.$valores2['nombre'].'</option>';
                                                 }
                                                }
                                                ?>                      
</select>
                                     <br>
                                     <br>
                               
                                            <textarea REQUIRED name="explicacion_nuevamente"   placeholder="Razón para borrar esta tarea (opcional)" id="caja" rows="10" cols="40">

                                            </textarea>
                                            <input name="id_usuario" type="hidden" value="<?php echo $n; ?>" />

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
<button name="asignar_departamento" class="btn btn-danger" style="width:200px;"value="<?php 
$departamentos='Departamento'; echo $departamentos; ?>" >
Transferir</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
                            
</div>

                                      
</div>
                                                    </div>
                                                </div>               
                                      
                                                <div class="modal fade" tabindex="-1" id="equipo" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                   
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Asignar equipo</h6>  
 
                                                        <b>Equipo: </b>
                                                <br>
                                         
                                                <select class="form-control form-control-lg"  id="depart" REQUIRED name="equipos_selec" >
                                                <?php
 include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM equipo");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                          include("conexion2.php");

                                                          $equipo = $mysqli -> query("SELECT *FROM usuario WHERE id_usuario=".$valores2['idUsuario']."");
                                                          if($equipo)
                                                          { while ($recorre_equipo = mysqli_fetch_array($equipo)) {
                                                              echo '<option ="">'.$recorre_equipo['id_usuario'].'&nbsp;&nbsp;'.$recorre_equipo['nombre'].'&nbsp;'.$recorre_equipo['apellidos'].'</option>';
                                                          }
                                                        }
                                                      }
                                                  }
                                                ?>      
     
</select>
                                     <br>
                                     <br>
                               
                                            <textarea REQUIRED name="aclaracion_equipo"   placeholder="Razón para borrar esta tarea (opcional)" id="caja" rows="10" cols="40">

                                            </textarea>
                                            <input name="id_usuario" type="hidden" value="<?php echo $n; ?>" />

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
<button name="asignar_equipo" class="btn btn-danger" style="width:200px;"value="<?php 
$agente='equpo'; echo $agente; ?>" >
Asignacion de equipo</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
                            
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
                                        
                                        <div class="modal fade" tabindex="-1" id="modal3" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                   
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Eliminar tarea seleciionada</h6>  
                                            <p style="background: #dcd089; color: #000000; font-weight: bold; padding: 5px; border: 1px solid #fe8a00; border-radius: 6px;">
                                                          <i class="fa fa-exclamation-triangle" aria-hidden="true"> ¿Está seguro que desea ELIMINAR tarea seleccionada?</i>                    

                                                        </p>  
                                            <b>Las tareas borradas NO PUEDEN ser recuperadas, incluyendo los adjuntos asociados *</b>
                                            <br>
                                         
                                  
                                            
                                            
                                            <ul id="dynamic-list"></ul>
                               
                                            <textarea REQUIRED name="comentarios"   placeholder="Razón para borrar esta tarea (opcional)" id="caja" rows="10" cols="40">

                                            </textarea>
                                            <input name="id_usuario" type="hidden" value="<?php echo $n; ?>" />
                                            <input name="activar" type="hidden" value="<?php 
                                            $verdadero='verdadero';
                                            echo $verdadero; ?>" />

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
                                        
<button name="borrar"class="btn btn-danger" style="width:200px;" value="<?php 
$borrar='Eliminar tarea'; echo $borrar; ?>" >
Eliminar tarea</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
                                 
</form>
</div>

                                    </div>

                                </div>
                          
                                </div>

</div>


                     
                                                                        
                               

                       
                </div>
        
                        
           
                                        <form action="variables.php" method="post" enctype="multipart/form-data" >
                                        
                                        <div class="modal fade" tabindex="-1" id="modal1" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                   
                                        <input name="idusuario" type="hidden" value="<?php echo $n=$_POST['codigo']; ?>" />
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Por favor describa el problema</h6>  
                                            <b>Titulo:*</b>
                                            <input class="w3-input" id="tit" REQUIRED name="titulo" type="text">                                            <br>
                                            <b>Descripcion: *</b>
                                            <br>
                                         
                                            <button type="button" id="close" onclick="MostrarDatos();" ><img src="../imagenes/fuentes.png" width="30" height="30" /></button>
                                            <button type="button" onclick="Negritas();" ><img src="../imagenes/negritas.png" width="30" height="30" /></button>
                                            <button type="button" onclick="Quitarnegritas();" ><img src="../imagenes/basurero.png" width="30" height="30" /></button>
                                            <button type="button"  onclick="PonerItalic();" ><img src="../imagenes/italic.png" width="30" height="30" /></button>
                                            <button type="button"  onclick="underline();"><img src="../imagenes/underline.png" width="30" height="30" /></button>
                                            <button itype="button"  onclick="linea();"><img src="../imagenes/linea.png" width="30" height="30" /></button>
                                          <br>
                                            <button type="button"  onclick="fuentes();"><img src="../imagenes/arial.png" width="30" height="30" /></button>
                                         
                                            <button type="button" id="close" data-toggle='modal' data-target='#modal2'><img src="../imagenes/images.png" width="30" height="30" /></button>
                                            <button type="button" data-toggle='modal' data-target='#modal3'><img src="../imagenes/video.png" width="30" height="30" /></button>
                                            <button type="button"  onclick="borrar();"><img src="../imagenes/borrar.jpg" width="60" height="60" /></button>
                                            <button type="button" ><img src="../imagenes/guardar.png" width="30" height="30" /></button>

                                            <div id="fuentes" class="dropdown">
               
                                        
                                                <div tabindex="0" class="onclick-menu">
                                                    <ul class="onclick-menu-content">
                                                        <li><button type="button" id="close" onclick="Limpiar2();"value="">-Seleccione-</button></li>
                                                        <li><button type="button" onclick="Arial();"id="Arial">Arial</button></li>
                                                        <li><button type="button" onclick="Helvetica();"id="Helvetica">Helvetica</button></li>
                                                        <li><button type="button" onclick="Georgia();"id="Helvetica">Georgia</button></li>
                                                        <li><button type="button"onclick="Times_New_Roman();"id="Helvetica">Times New Roman</button></li>
                                                        <li><button type="button"onclick="monospace();"value="servicios">Monospace</button></li>
                                                        <li><button type="button"onclick="Remove_Font_Family();"value="sicea">Remove Font Family</button></li>

                                                    </ul>
                                                </div>
                                          
                                            </div>
                   
                                     
                                            <div id="formatos" class="selecionar">
               <body>
                   
            
                                                <div tabindex="0" class="onclick-menu">
                                                    <ul  class="onclick-menu-content">
                                                        <li><button type="button" onclick="Limpiar();"value="">-Seleccione-</button></li>
                                                        <li><button type="button" onclick="Normal_texto();"id="Arial">Normal texto</button></li>
                                                        <li><button  type="button" onclick="heading_1();"id="Helvetica">Heading 1</button></li>
                                                        <li><button  type="button" onclick="heading_2();">Heading 2 </button></li>
                                                        <li><button type="button" onclick="heading_3();"id="Helvetica">Heading 3</button></li>
                                                        <li><button type="button" onclick="heading_4();"value="servicios">Heading 4 </button></li>
                                                        <li><button type="button" onclick="heading_5();"value="sicea">Heading 5</button></li>
                                                            <li><button type="button" onclick="heading_5();"value="sicea">Heading 5</button></li>

                                                    </ul>
                                                </div>
                                            </body>
                                            </div>
                                            
                                            
                                            <ul id="dynamic-list"></ul>
                               
                                            <textarea REQUIRED name="comentarios" id="caja" rows="10" cols="40">

                                            </textarea>

                                            <br>
                                            <br>
                                     
                                            <label class="control-label" for="fichero1">Añadir nuevo fichero</label>
<div class="controls">
<label for="email1">Titulo del archivo</label>
<input type="text" name="Titulo"> <br><br>
<label for="email1" >Descripcion del archivo</label>
<textarea name="descripcion" id="" cols="30" rows="10"></textarea>
<input id="fichero1" style="width:200px;" type="file" style="display:none" name="uploadedFile">  <div class="input-append">
    <input id="falso1"   class="form-control"  type="text">
   <a class="btn btn-file btn btn-primary btn-lg active " style="width:200px;"> <i class="fa fa-folder-open-o"></i> Seleccionar</a>
  </div>
</div>

<script type="text/javascript">
  // http://duckranger.com/2012/06/pretty-file-input-field-in-bootstrap/ 
  // Cuando se pulsa el falso manda el click al autentico
  $('.btn-file').on('click', function(){
    $(this).parent().prev().click();
  });
  // Cuando el autentico cambia hace cambiar al falso
  $('input[type=file]').on('change', function(e){
    $(this).next().find('input').val($(this).val());
  });
</script>
                  
                                            <h5> Visibilidad y asignación de tarea:* </h5>
                                            <b>Departamento:*</b>
                                  
                                            <select class="form-control form-control-lg" id="departa" REQUIRED name="departamentos" >
                                            <?php
 include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM departamento ");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['nombre'].'</option>';
                                                      }
                                                  }
                                                ?>                      
</select>
            <div id="proct" >
            <input name="id_usuario" type="hidden" value="<?php
             $n=$_POST['codigo'];
            echo $n; ?>" />

                                                <b>Procurador: </b>
                                                <br>
                                         
                                                <select class="form-control form-control-lg"  id="depart" REQUIRED name="procurador" >
                                                <?php
 include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM usuario where id_rol=1");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                          echo '<option ="">'.$valores2['id_usuario'].'&nbsp;&nbsp;'.$valores2['nombre'].'&nbsp;'.$valores2['apellidos'].'</option>';
                                                      }
                                                  }
                                                ?>      
     
</select>
                                        <?php
 include("conexion2.php");
                                          
   $n=$_POST['codigo'];
                                                  $query2 = $mysqli -> query ("SELECT *FROM usuario where id_usuario=$n");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.?>
                                        <br>
                                        <b>Creador de la tarea: </b>
                                        <input type="text" readonly="readonly" name="creador_nombre" maxlength="4" value= "<?php echo $valores2["nombre"]; ?>"> 
                                        <input type="text" readonly="readonly" name="apellidos_creador" maxlength="4" value= "<?php echo $valores2["apellidos"]; ?>">
           

                                      
                                        <?php
                                                      }
                                                  }
                                     ?>
                                     <br>
                                     <br>
  <b>Establesca una hora y fecha</b>
                                   <input size="16"   name="fech" width="40%" height="40%" id="date">
                                   <script >
$("#date").datetimepicker({
    uiLibrary: 'bootstrap'
});
</script>
<br>
<br>
      

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
                                        
<button class="btn btn-danger" style="width:200px;">
    Crear tarea
</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
                                        </div>

                                    </div>

                                </div>
                          
                                </div>

</div>


                                        
                                <div class="container">
                                        <body>
                                            <div class="modal" tabindex="-1" id="modal2" >
                                                <div class="modal-dialog modal-xs modal-dialog-centered" id="video">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <b>Imagen</b>
                                                        <button class="close" data-dismiss="modal">&times;</button>
                                                          
                                                        </div>
                                                          <div class="modal-body"  id="video">
                                                           
                                                            <div class="file-upload">
                                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Seleccionar</button>
                                                              
                                                                <div class="image-upload-wrap">
                                                                  <input class="file-upload-input" type='file' name="imagen" onchange="readURL(this);" accept="image/*" />
                                                                  <div class="drag-text">
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

</div>

</div>
                                <div class="container">
                                    <body>
                                        
                           
                                                
                                    <div class="container">
                                        <body>
                                            <div class="modal" tabindex="-1" id="modal3" >
                                                <div class="modal-dialog modal-xs modal-dialog-centered" id="video">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <b>VIDEOS</b>
                                                        <button class="close" data-dismiss="modal">&times;</button>
                                                          
                                                        </div>
                                                          <div class="modal-body"  id="video">
                                                           
                                                            <div class="file-upload">
                                                                <h3>Suba dreccion de video</h3>
                                                                <textarea name="video" id="caja_link" cols="30" rows="10">URL:</textarea>
                                                                <button type="button" onclick="pasarvalor()"class="btn btn-primary" >Subir link</button>
                                                            
                                                            <script>
                                                            
                                                            </script>
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
    <script type="text/javascript" src="../js/mostrar.js"></script>

     <!-- WIZARD SCRIPTS -->
    <script src="../assets/js/wizard/modernizr-2.6.2.min.js"></script>
    <script src="../assets/js/wizard/jquery.cookie-1.3.1.js"></script>
    <script src="../assets/js/wizard/jquery.steps.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script> 
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>