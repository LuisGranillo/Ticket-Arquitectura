<?php
 
 include("../conexion.php");
 
 //Seguridad de sesiones paginacion
 
 session_start();

$n=$_REQUEST['cod'];
 $varsesion=$_SESSION['correo'];
 header("Refresh: 300; URL='tareas.php?cod=$n'");


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
    <title>TAREAS</title>
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
                            $n=$_REQUEST['cod'];

                            $query="SELECT*FROM usuario WHERE id_usuario='$n'";
                            $resultado=$conexion->query($query);
                            if($resultado){
                            while($row=$resultado->fetch_assoc()){
                          ?>
                          
                              <td><img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"/></td>
                                        
                         
                         </tr>
                         <?php
                         
                             
                               echo "<br>";
                               echo "<p font size='10' style='color:white;' > <font size='3'>Bienvenido  " .   ($nombre_logeado=$row['nombre']);
                              echo "<br>";
                              echo ($apellido_logeado=$row['apellidos'] . "</font></p>");
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
                        <br>
                        <br>
                    
<!-- Container -->
<div class="container">
<style>
  input[type=checkbox] {
  position: absolute;
  cursor: pointer;
  width: 0px;
  height: 0px;
}

input[type=checkbox]:checked:before {
      content: "";
  display: block;
  position: absolute;
  width: 34px;
  height: 34px;
  border: 4px solid #FFCB9A;
  border-radius: 20px;
  background-color: #445768;  
  transition: all 0.2s linear;
}


input[type=checkbox]:before {
  content: "";
  display: block;
  position: absolute;
  width: 34px;
  height: 34px;
  border: 4px solid #FFCB9A;
  border-radius: 3px;
  background-color: #445768;
}


input[type=checkbox]:after {
  content: "";
  display: block;
  width: 0px;
  height: 0px;
  border: solid #FFCB9A;
  border-width: 0 0px 0px 0;
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
  position: absolute;
  top: 0px;
  left: 50px;
  transition: all 0.2s linear;
}

input[type=checkbox]:checked:after {
  content: "";
  display: block;
  width: 12px;
  height: 21px;
  border: solid #FFCB9A;
  border-width: 0 5px 5px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  position: absolute;
  top: 2px;
  left: 14px;
}
</style>
<!-- Main Content-->
<div >
 <button style=" border-radius: 100%;" data-toggle='modal' data-target='#modal1' ><img src="../TAREAS/imagenes_tareas/abierto.jpeg" style=" border-radius: 100%;" width="70" height="70" /></button>
           <a href="#" data-toggle='modal' data-target='#modal1'><i></i>Nueva tarea</a>
                                     <br>
                                     <br>
<i class="fa fa-search fa-2x" aria-hidden="true"></i><input type="search" id="buscar" onkeyup="buscar()" placeholder="Buscar " title="Empieza a escribir para buscar">
  <br>
  <br>
  <br>

<form method="POST" id="cambiar">

    <table  class="bordered" class="table" id="tabla" data-sort="table">
     
    <thead>
        <tr >

        <th colspan="1">Seleccionar</th>

        <th>Clave de la tarea</th>
          <th>Tiutlo</th>
          <th>Descripcion</th>
          <th>Vencimiento</th>
          <th>hora</th>

          <th>Procurador</th>

          <th>Departamento</th>

          <th>Editar <i class="fa fa-pencil-square-o fa-4x" aria-hidden="true"></i></th>
          <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>
        <tr >


          <?php
                                        

                                        include("../conexion_ticket.php");
                                    
                                        $tareas="SELECT*FROM tarea";
                                        $tareas_pr=$conexion->query($tareas);
                                  
                                            
                                        if($tareas_pr){ 
                                         while ($valores2=$tareas_pr->fetch_assoc()) {
                                          include("../conexion_ticket.php");
                                    

                                               $n=$_REQUEST['cod'];
                                               
                                               $Arreglo='TAREAS[]';
                                               echo "<tr>";
                                               $Arreglo2=  "<td>  <input type='checkbox' name='$Arreglo' value='" .$valores2['idTarea'] . "'></td>";
                                               echo $Arreglo2;
        
                                   echo ' <td id="valores"="'.$valores2['idTarea'].'">'.$valores2['idTarea'].'</td>';

                                     echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Titulo'].'</td>';
         

                                     echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Descripcion'].'</td>';

                                     echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Vencimiento'].'</td>';
                                     echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['hora'].'</td>';

                                     echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['procurador'].'</td>';
                                     echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Departamento'].'</td>';


                                   echo '<td><button id="rescatar_id" onclick =pasarvalor()   data-toggle="modal" data-target="#myModal" type="button"  class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Modificar tarea</span><span>Editar</span></button></td>';   
                                
                                     ?>
                                         <td><a data-toggle="modal" class="edicion_res" href="#eliminar_tarea" id_resp="<?php echo $valores2['idTarea']; ?>" ><button id='eliminacion_tarea'   class='custom-btn btn-12'  type='button'name='tarea'>
                                     <img src='../TAREAS/imagenes_tareas/eliminar.jpg' width='60' height='60'/></a></td>
                   
                                     <?php
                                     echo "</tr>";
                                     
                                    }
                                  }
                                     ?>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
             
                               
                                           <script>
                                               $(document).ready(function() {

$(".box").hover(function() {
$(".box-right").toggleClass('cl-box2');
$(".bar").toggleClass('cl-bar2');
});

$(".bar").click(function() {
});
});
                                           </script>  
                                                      
                                          <td colspan="11">Seleccionar:   <input type="checkbox" onclick="marcar(this);" /> <br> <br>
                              Todos| Ninguno 
                            <button id="eliminacion"    type="button"  class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Seleccionadas</span><span>Eliminar tareas</span></button>  </td> 
          
                </tr>
                </form>

                <br>
                <br>    
      </tbody>
    </table>
    
                                         <br>
                                            
    </div>

  </div>
</div>
</div>

                   
<center>
                   
<div>                                    
<style>
.modal-body{
  height: 300px;
  width: 100%;
  overflow-y: auto;
}
.modal-confirm {		
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;		
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}		
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
</style>
<p id="respa"></p>    
  
<!-- Modal HTML -->
<div id="eliminar_tarea" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
        <form method="POST"  id="una_tarea">
		
				<h4 class="modal-title w-100">¿ESTAS SEGURO QUE DESEAS ELIMINAR LA TAREA?</h4>	
    
        <input type="" id="id_tareas" name="detalles"  value="" class="form-control">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Una vez dado en el boton de eliminar ya no habra forma de recuperarla</p>
			</div>
			<div class="modal-footer justify-content-center">
        <center>				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button id="eliminar_una" type="button" class="btn btn-danger">Eliminar</button>
        </center>
        </form>

			</div>
		</div>
	</div>
</div> 


                       

                                                     <form  method="post" action="variables.php" enctype="multipart/form-data" >
                                        
                                        <div class="modal fade" tabindex="-1" id="modal1" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>

                                        <input name="idusuario" type="hidden" value="<?php echo $n=$_REQUEST['cod']; ?>" />
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Por favor describa el problema</h6>  
                                            <b>Titulo:*</b>
                                            <input class="w3-input" id="tit" REQUIRED name="titulo" type="text">                                            <br>
                                            <br>
                                         
                                            <button type="button" id="close" onclick="MostrarDatos();" ><img src="../TAREAS/imagenes_tareas/fuentes.png" class="crud" width="30" height="30" /></button>
                                            <button type="button" onclick="Negritas();" ><img src="../TAREAS/imagenes_tareas/negritas.png" class="crud" width="30" height="30" /></button>
                                            <button type="button" onclick="Quitarnegritas();" ><img src="../TAREAS/imagenes_tareas/basurero.png" class="crud" width="30" height="30" /></button>
                                            <button type="button"  onclick="PonerItalic();" ><img src="../TAREAS/imagenes_tareas//italic.png" class="crud" width="30" height="30" /></button>
                                            <button type="button"  onclick="underline();"><img src="../TAREAS/imagenes_tareas/underline.png" class="crud" width="30" height="30" /></button>
                                            <button itype="button"  onclick="linea();"><img src="../TAREAS/imagenes_tareas/linea.png" class="crud" width="30" height="30" /></button>
                                          <br>
                                            <button type="button"  onclick="fuentes();"><img src="../TAREAS/imagenes_tareas/arial.png" class="crud" width="30" height="30" /></button>
                                         
                                            <button type="button" id="close" data-toggle='modal' data-target='#modal2'><img src="../TAREAS/imagenes_tareas/images.png" class="crud" width="30" height="30" /></button>
                                            <button type="button" data-toggle='modal' data-target='#modal3'><img src="../TAREAS/imagenes_tareas/video.png" class="crud" width="30" height="30" /></button>
                                            <button type="button"  onclick="borrar();"><img src="../TAREAS/imagenes_tareas/borrar.jpg" class="crud"width="30" height="30" /></button>
                                            <button type="button" ><img src="../TAREAS/imagenes_tareas/guardar.png" class="crud" width="30" height="30" /></button>

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
                                            <b>Descripcion: *</b>

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
                                            <b>Procurador</b>
      <select class="form-control form-control-lg"  id="depart"  name="procurador" >
                                                <?php
include("../conexion.php");
                                         
$depart="SELECT*FROM usuario where id_rol=1";
$encontrados=$conexion->query($depart);
if($encontrados){ 
  while ($ciclo=$encontrados->fetch_assoc()) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

    echo '<option ="">'.$ciclo['id_usuario'].'&nbsp;&nbsp;'.$ciclo['nombre'].'&nbsp;'.$ciclo['apellidos'].'</option>';
  }
  }
  ?>                          
</select>        <b>Departamento</b>
       
          <select class="form-control form-control-lg" id="Departamento"  name="departamentos" >
                                            <?php
 include("../conexion.php");
                                         
 $query="SELECT*FROM departamento";
 $resultado=$conexion->query($query);
                                              if($resultado){ 
                                                while ($depart=$resultado->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                        echo '<option ="'.$depart['idDepartamento'].'">'.$depart['nombre'].'</option>';
                                                  }
                                                }
                                                ?>                      
</select>
          
                                        <?php
                                          
   $n=$_REQUEST['cod'];
   include("../conexion.php");
                                         
$query2="SELECT*FROM usuario where id_usuario='$n'";
$vae=$conexion->query($query2);
if($vae){ 
  while ($valores2=$vae->fetch_assoc()) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

                                       
                                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                        <br>
                                        <b>Creador de la tarea: </b>
                                        <input type="text" readonly="readonly" name="creador_nombre" maxlength="4" value= "<?php echo $valores2["nombre"];?>"> 
                                        <input type="text" readonly="readonly" name="apellidos_creador" maxlength="4" value= "<?php echo $valores2["apellidos"];?>">
           

                                      
                                        <?php
                                     }
                                    }
                                     ?>
                                     <br>
                                     <br>
    
                                   <script >
$("#date").datetimepicker({
    uiLibrary: 'bootstrap'
});
</script>
<br>
<b>Vencimiento</b>
          <br>
<input type="date" name="dateofbirth" id="dateofbirth">  <br><br>

<b>Hora</b>
         
         <input type="text" name="hora" id="timePicker">
   
<br>


<br>
      

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
                                        <input name="cod" type="hidden" value="<?php echo $id_us; ?>" />

<button id=""type="submit" class="btn btn-danger" style="width:200px;">
    Crear tarea
</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
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
                                                                  <input width="100%" height="100%"  class="file-upload-input" type='file' name="imagen" onchange="readURL(this);" accept="image/*" />
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
</div>

<!-- /container -->
              <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form method="POST" id="actualizar_mi_tarea">
   <h3>Editar tarea seleccionada</h3>
          <b>Clave de la tarea</b>
         
             <input type="text" id="idAwb" name="id_tarea"class="form-control" value=""readonly="readonly" >
 
             <b>Titulo de la tarea</b>
          <input type="text" id="Tiutlo" name="titulo" class="form-control" value="">
          <b>Descripcion de la tarea</b>
          <input type="text" id="descripcion" name="DESCRIPCION"class="form-control" value="">
          <b>Procurador</b>
      <select class="form-control form-control-lg"   name="procurador" >
                                                <?php
include("../conexion.php");
                                         
$depart="SELECT*FROM usuario where id_rol=1";
$encontrados=$conexion->query($depart);
if($encontrados){ 
  while ($ciclo=$encontrados->fetch_assoc()) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

    echo '<option ="">'.$ciclo['id_usuario'].'&nbsp;&nbsp;'.$ciclo['nombre'].'&nbsp;'.$ciclo['apellidos'].'</option>';
  }
  }
  ?>                          
</select> 
          <b>Hora</b>
          <label for="appt">Select a time:</label>
  <input type="time"name="hora" id="appt" name="appt"><br>

         <script>
     function pasarvalor()
{
var valor = document.getElementById("AM").value;
var hora = document.getElementById("hour").value;
var mimutos = document.getElementById("minute").value;
var response = hora + ':' + mimutos +':'+ valor;
response;
document.getElementById("timePicker").value = response;
}
function pasarvalor2()
{
var valor = document.getElementById("PM").value;
var hora = document.getElementById("hour").value;
var mimutos = document.getElementById("minute").value;
var response = hora + ':' + mimutos +':'+ valor;
response;
document.getElementById("timePicker").value = response;
}
function pasarvalo3()
{
var valor = document.getElementById("AM2").value;
var response = valor + ':' + valor +':'+ valor;
document.getElementById("appt").value = response;
}
   </script>
  
   <br>
 <style>
 form{
   max-width:320px;
   
}

.time-picker{
   display:flex;
   justify-content:center;
   flex-direction:column;
   transition:all .4s ease;
   height:0;
   overflow:hidden;
  }.set-time{
      display:flex;
      justify-content:center;
      margin-bottom:15px;
    }
   .label{
         width:60px;
         margin:0 5px;
         text-align:center;
         line-height:34px;
         color:#292929;
         display:inline-style;
        }.car{
            display:block;
            border:1px solid #292929;
            cursor:pointer;
            font-size:20px;
            font-weight:bold;
            border-radius:3px;
           
         
         .set{
            text-align:center;
            box-sizing:border-box;
            width:100%;
            height:40px;
            line-height:34px;
            font-size:20px;
            font-weight:bold;
         }
      
   #submitTime{
      text-align:center;
      line-height:34px;
      border:1px solid #292929;
      width:128px;
      margin:auto;
      border-radius:3px;
      cursor:pointer;
      text-transform:uppercase;
      font-weight:bold;
   }
 }

.time-picker.open{
   border:1px solid #292929;
   padding:15px;
   transition:all .5s ease;
   height:auto;
   background-color:#FCFCFC;
}

  </style>
  <script>
    function timePicker(id){
   var input = document.getElementById(id);
   var timePicker = document.createElement('div');
   timePicker.classList.add('time-picker');
   input.value = '08:30';
  
   //open timepicker
   input.onclick= function(){
      timePicker.classList.toggle('open');
      
      this.setAttribute('disabled','disabled');
      timePicker.innerHTML +=`
      <div class="set-time">
         <div class="label">
            <a class="car" id="plusH" >+</a>
            <input class="set" type="text" id="hour" value="08">
         
            <a class="car" id="minusH">-</a>
         </div>
         <div class="label">
            <a class="car" id="plusM">+</a>
            <input class="set" type="text" id="minute" value="30">
            <a class="car" id="minusM">-</a>
         </div>
         <button id="AM" type="button" onclick="pasarvalor();" value="AM">AM</button>
            <button id="PM" type="button" value="PM" onclick="pasarvalor2();">PM</button>

      </div>
      <div id="submitTime">Coloque la fecha que va modificar</div>`;
      
      this.after(timePicker);
      var plusH = document.getElementById('plusH');
      var minusH = document.getElementById('minusH');
      var plusM = document.getElementById('plusM');
      var minusM = document.getElementById('minusM');
      var h = parseInt(document.getElementById('hour').value);
      var m = parseInt(document.getElementById('minute').value);
     //increment hour
      plusH.onclick = function(){
         h = isNaN(h) ? 0 : h;
         if(h===23){
            h =-1;
         }
          h++; 
         document.getElementById('hour').value = (h<10?'0':0)+h;
      }
      //decrement hour
      minusH.onclick = function(){
         h = isNaN(h) ? 0 : h;
         if(h===0){
            h =24;
         }
         h--;
         document.getElementById('hour').value = (h<10?'0':0)+h;
      }
      //increment hour
      plusM.onclick = function(){
         m = isNaN(m) ? 0 : m;
         if(m===45){
            m =-15; 
         }
          m = m+15; 
         document.getElementById('minute').value = (m<10?'0':0)+m;
      }
      //decrement hour
      minusM.onclick = function(){
        m = isNaN(m) ? 0 : m;
         if(m===0){
            m =60;
         }
         m = m-15;
         document.getElementById('minute').value = (m<10?'0':0)+m;
      }
      
      //submit timepicker
      var submit = document.getElementById("submitTime");
      submit.onclick = function(){
         input.removeAttribute('disabled');
         timePicker.classList.toggle('open');
         timePicker.innerHTML = '';
      }
   }
}

timePicker('timePicker');






  </script>

          <b>Vencimiento</b>
          <br>
<input type="date" name="dateofbirth" id="dateofbirth">   
 <br> 
      <b>Procurador</b>
      <select class="form-control form-control-lg"  id="depart"  name="procurador" >
                                                <?php
include("../conexion.php");
                                         
$depart="SELECT*FROM usuario where id_rol=1";
$encontrados=$conexion->query($depart);
if($encontrados){ 
  while ($ciclo=$encontrados->fetch_assoc()) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.

    echo '<option ="">'.$ciclo['id_usuario'].'&nbsp;&nbsp;'.$ciclo['nombre'].'&nbsp;'.$ciclo['apellidos'].'</option>';
  }
  }
  ?>                          
</select>        <b>Departamento</b>
       
          <select class="form-control form-control-lg" id="Departamento"  name="departamentos" >
                                            <?php
 include("../conexion.php");
                                         
 $query="SELECT*FROM departamento";
 $resultado=$conexion->query($query);
                                              if($resultado){ 
                                                while ($depart=$resultado->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                        echo '<option ="'.$depart['idDepartamento'].'">'.$depart['nombre'].'</option>';
                                                  }
                                                }
                                                ?>                      
</select>
          
        </div>

          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button"  id="actualizar_button" class="btn btn-primary">Actualizar</button>
          </form>
          <form method="POST"  action="detalles_tareas.php">
          <input type="hidden" id="deta" name="detalles"class="form-control" value="">
          <input name="cod" type="hidden" value="<?php echo $n; ?>" />
          <input id="detal" name="detalles" type="hidden" value="" />

          <button type=""  class="btn third" style="width: 90%; altura: 90%">Ver detalle de la tarea</button>
          </form>
          
       

      </div>
    </div>
  </div>

                                             </center>


                                             

  <script >



$(".btn-12").on('click',function(){

  $tr=$(this).closest('#tabla tbody tr');
var datos=$tr.children("#tabla tbody td").map(function(){
  return $(this).text();
});
$("#idAwb").val(datos[1]);
$("#detal").val(datos[1]);

$("#Tiutlo").val(datos[2]);
$("#descripcion").val(datos[3]);
$("#dateofbirth").val(datos[4]);
$("#timePicker").val(datos[5]);

$("#PROCURADOR").val(datos[6]);
$("#Departamento").val(datos[7]);



})

$(function () {
      $(function () {
        $(".edicion_res").click(function (e) {
            e.preventDefault();
            var id_resp = $(this).attr('id_resp');
        


            $("input[name=detalles]").val(id_resp);//Agrego la id al campo oculto que se va a enviar en el formulario

            
            
            $("#eliminar_tarea").modal('show');
        })
    })
    })


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