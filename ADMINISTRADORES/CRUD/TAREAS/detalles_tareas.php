<?php
 
 $n=$_REQUEST['cod'];
 $detalles=$_REQUEST["detalles"];

include("../conexion_ticket.php");
$colas_abierta="SELECT*FROM colas_de_tareas WHERE idTarea ='$detalles'";
 $encontrardo=$conexion->query($colas_abierta);
                                              if($encontrardo){ 
                                                $id_colaw=0;
                                                while ($colas_entrantes=$encontrardo->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                  
                                                  $id_colaw=$colas_entrantes["id_cola"];
                                                }
                                              }
                                              if($id_colaw==null){
                                                echo "<script> 
                                                alert('No se ha trabajado aun en esta tarea, no se puede ver o hacer cambios externos.'); 
                                                window.location.href='tareas.php?cod=$n'; 
                                                </script>"; 
                                                
                                              }



 //Seguridad de sesiones paginacion
 include("../conexion.php");
 session_start();

$n=$_REQUEST['cod'];
$detalles=$_REQUEST["detalles"];

 $varsesion=$_SESSION['correo'];


$si= "SELECT * FROM usuario WHERE correo ='$varsesion' and id_usuario = $n";
$si2=mysqli_query($conexion,$si);
$fin=mysqli_fetch_array($si2);

$id=$fin['id_usuario'];
header("Refresh: 300; URL='detalles_tareas.php?cod=$n&detalles=$detalles'");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DETALLES DE TAREAS</title>

 
    <link href="/UTP/ADMINISTRADORES/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="/UTP/ADMINISTRADORES/assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="../TAREAS/css_tareas/Tareas.css">
    <link rel="stylesheet" href="../TAREAS/css_tareas/detalles.css">
    <link rel="stylesheet" href="../TAREAS/css_tareas/Tareas.css">
    <link rel="stylesheet" href="../TAREAS/css_tareas/crud.css">

    <!-- GOOGLE FONTS-->




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
                         include("../conexion.php");

                            $n=$_REQUEST['cod'];
                            $query="SELECT*FROM usuario WHERE id_usuario='$n'";
                            $resultado=$conexion->query($query);
                            while($row=$resultado->fetch_assoc()){
                          ?>
                          
                              <td><img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($perfil=$row['foto']);?>"/></td>
                                        
                         
                         </tr>
                         <?php
                         
                             
                               echo "<br>";
                              echo "<p font size='10' style='color:white;' > <font size='3'>Bienvenido  " .   ($nombre_logeado=$row['nombre']);
                              echo "<br>";
                              echo ($apellido_logeado=$row['apellidos'] . "</font></p>");
                              }
                              include("../conexion_ticket.php");
                              $detalles="";
                              if(@$_REQUEST["detalles"]!=null){
                                  $detalles=$_REQUEST["detalles"];
                              }
                              if(@$_REQUEST["detalles"]==null){
                                  $detalles="";
                              
                                  echo "No hay nada en la variable";
                              
                              }
 $query="SELECT*FROM tarea WHERE idTarea ='$detalles'";
 $resultado=$conexion->query($query);
                                              if($resultado){ 
                                                while ($tarea=$resultado->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                   $titulo=$tarea["Titulo"];
                                                   $vencimiento=$tarea["Vencimiento"];
                                                   $procurador=$tarea["procurador"];
                                                   $hora=$tarea["hora"];
                                                   $Departamento=$tarea["Departamento"];
                                                   $id_usuario=$tarea["id_usuario"];
                                                   $pr=$tarea["pr"];
                                                   $idequipo=$tarea["idequipo"];
                                                   $desc=$tarea["Descripcion"];
                                                   $id_archivo=$tarea["id_archivo"];


                                                  }
                                                }
                                                $archivo="SELECT*FROM archivo WHERE id_archivo ='$id_archivo'";
 $archivo_tar=$conexion->query($archivo);
                                              if($archivo_tar){ 
                                                while ($arch=$archivo_tar->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                   $imgtar=$arch["imagen"];
                                                
                                                   $nombre_archivo=$arch["nombre_archivo"];


                                                  }
                                                }
                                                include("../conexion.php");

                                                $creador="SELECT*FROM usuario WHERE id_usuario ='$id_usuario'";
                                        $encontrado=$conexion->query($creador);
                                              if($encontrado){ 
                                                while ($datos=$encontrado->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                   $foto=$datos["foto"];
                                                   $nombre=$datos["nombre"];
                                                   $appellidos=$datos["apellidos"];
                                                  }
                                                }
                                                
                                                $procuradores="SELECT*FROM usuario WHERE id_usuario ='$pr'";
                                            $destinatario=$conexion->query($procuradores);
                                              if($destinatario){ 
                                                while ($dir=$destinatario->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                   $img=$dir["foto"];
                                                  
                                                  }
                                                }
                                                include("../conexion.php");
                                                $equipos_de_tarea="SELECT*FROM equipo WHERE idEquipo='$idequipo'";
                                                $asignado=$conexion->query($equipos_de_tarea);
                                                                                             if($asignado){ 
                                                                                             $equis="";
                                                                                              while ($eq=$asignado->fetch_assoc()) {
                                                                                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                                                                  $equis=$eq["nombre"];

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
                        <div style="background:#771e37" class="user-img-div">
                  
                              <td><img style="width: 10%; altura: 100%; "   src="../TAREAS/imagenes_tareas/escuela.jpg"/></td>
                                        <form action="regresar.php" method="post">
                              <button name="subir" id=""type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Tareas</span><span> Regresar </span></button></td>       
                  <input name="cod" type="hidden" value="<?php echo $n ?>" />
 
                  </form>
                     <div id="pnl_Reportes" class="pnl_Reportes texto-no-seleccionable row" style="margin: 50px 20px; background-color: #eeeeee;">			
				<div class="col-xs-12 col-sm-12 col-lg-3 col-xl-3 pnlCardReporte draggable-element organizar-reportes" data-original-size="3" data-id-bdd="1" data-orden="1" data-sp-action="1">
                    <div class="cardReporte sombra_2px panel panel-default no-margin"><div class="panel-heading drag-area"><h5><b> Creador de la tarea</b></h5></div><div class="contenido-reporte collapse in">
                        
                        <div class="panel-body"><span class="class_nombre"></span><br>                              <td><img  id=""style="width: 50%; altura: 100%"  src="data:image/jpg;base64,<?php echo base64_encode($foto);?>"/><b><br><?php echo "$nombre $appellidos"?></b></td>
     
                        </div></div></div></div><div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6 pnlCardReporte draggable-element organizar-reportes" data-original-size="6" data-id-bdd="2" data-orden="2" data-sp-action="2">
                            <div class="cardReporte sombra_2px panel panel-default no-margin"><div class="panel-heading drag-area"><h5><b><b>Titulo de la tarea</b><br><?php echo $titulo?></b></h5></div><div class="contenido-reporte collapse in"><div class="panel-body"><table class="table table-bordered">
                                                      
                            <tbody><tr><td><b>Vencimiento </b><br><?php echo $vencimiento?></td> <td><b>Procurador </b><br><?php echo $procurador?></td> <td><b>Hora de vencimiento <br></b><center><?php echo $hora?></center></td> <td><b>Departamento <br></b><center><?php echo $Departamento?></center></tr></tbody></table>         
                              </div></div></div></div><div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6 pnlCardReporte draggable-element organizar-reportes" data-original-size="6" data-id-bdd="3" data-orden="3" data-sp-action="2"><div class="cardReporte sombra_2px panel panel-default no-margin">
                                  <div class="panel-heading drag-area"><h5><b>Equipo </b><?php echo $equis?></h5></div><div class="contenido-reporte collapse in"><div class="panel-body">
                                      <table class="table table-bordered"><tbody><tr><td></td> <td><b>Descripcion :</b><br><b><?php echo $desc?></b></td> <td><b>Numero de tarea: </b><?php echo $detalles?></td> 
                                    </tr></tbody></table>           </div></div></div></div><div class="col-xs-12 col-sm-12 col-lg-3 col-xl-3 pnlCardReporte draggable-element organizar-reportes" data-original-size="3" data-id-bdd="4" data-orden="4" data-sp-action="1"><div class="cardReporte sombra_2px panel panel-default no-margin"><div class="panel-heading drag-area"><h5><b>Procurador</b></h5></div><div class="contenido-reporte collapse in"><div class="panel-body"><br><img  id=""style="width: 50%; altura: 100%"  src="data:image/jpg;base64,<?php echo base64_encode($img);?>">           </div></div></div></div>
                                    <button id="rescatar_id" onclick =pasarvalor()   data-toggle="modal" data-target="#respuestas" type="button"  class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Visualizar</span><span>Ver respuestas</span></button></td>   
                              <button   data-toggle="modal" data-target="#respuestas_admin" type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>respuesta</span><span> Editar </span></button></td>     
                            <button   data-toggle="modal" data-target="#aclaraciones" type="button" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>aclaraciones</span><span> Ver  </span></button></td>       
                                      <button   data-toggle="modal" data-target="#hilos" type="button" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>hilo</span><span> Ver  </span></button></td> 
                                           <button   data-toggle="modal" data-target="#colaborador" type="button" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Colaboradores</span><span> Ver  </span></button></td>       
        <button   data-toggle="modal" data-target="#archivo" type="button" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>o archivo</span><span> Ver imagen </span></button></td>       
 
</div>
  
                              </div>
                              
  </div>
<div>
<div>
</body>
<style>




</style>
<script>
  //      <li class="self">
//            <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
//            <div class="msg">
//            <p>Ehh, me crashea el Launcher... <emoji class="cryalot"/></p>
//              <time>18:08</time>
//            </div>
//      </li>

$(document).ready(function() {
  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var currentTime = hours+":"+minutes;
  $('input').keydown(function(k) {
    var windowHeight = $(document).height();
    var chat = $('.chat');
    var chatLast = chat.children().last();
    var self = '<li class="self"><div class="avatar"><img src="https://e7.pngegg.com/pngimages/530/46/png-clipart-computer-icons-user-system-administrator-vijay-miscellaneous-recruiter.png" draggable="false"/></div><div id="respuesta" class="msg"><p id="respuestas_tar" class="resp">'+$("input.textarea").val();+'</p></div></li>';
    function sendSelfchat(keyword) {
      chatLast.after(keyword);
      setTimeout(function() {$(chatLast).find('div.msg').append('<time>'+currentTime+'</time>')}, 250);
      $(window).scrollTop(windowHeight);
    };
    var respondTo = $('input.textarea').val();
    var response = ["Hello", "Howdy", "Good Morning!"];
    
   



    if(k.keyCode == 13) {
      sendSelfchat(self);
      
      $('input.textarea').val('')
    }
    $('div.return-1').click(function() {
      sendSelfchat(self);
      $('input.textarea').val('')
    }
    )
  //=================================================================================================================================
    var chatLast = chat.children().last();

    function sendResponse(choice) {
      setTimeout(function() {chatLast.after(other); $(window).scrollTop(windowHeight);}, 1000);
    };
    var responseCheck = chatLast.val()
    switch(respondTo.toLowerCase()) {
      case "hello":
      case "hi":
      case "hey":
        sendResponse(0);
        break;
      case "good morning":
        sendResponse(2);
        break;
      case "how are you":
      	sendResponse(3);
        break;
    }
  });
  
  $('.message-return').hover(function() {
    $(this).find('.return-1').css('background-color', '#ddd');
  }, function() {
    $(this).find('.return-1').css('background-color', 'white');
  });
  
  //emoji icon expands selection window
  $('.emojis').click(function() {
    $('.emojis-menu').slideToggle(300).toggleClass('emojis-menu-show');
  });
  
  //Can't figure out how to add emoji into the text area
  $('.emojis-menu emoji').click(function() {
    var emoji = $(this).html();
  })

});

</script>
            <!-- Modal HTML -->
<div id="respuestas" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
				</div>						
        <div class="menu">
            <div data-dismiss="modal" class="back"><i class="fa fa-chevron-left"></i> <img src="data:image/jpg;base64,<?php echo base64_encode($perfil);?>"  draggable="false"/></div>
            <div class="name"><?php echo " Administrador : $nombre_logeado $apellido_logeado"?></div>
            <div class="last"><?php date_default_timezone_set('America/Mexico_City');

echo date("F j, Y, g:i a"); ?></div>
        </div>
    <ol class="chat">
    <li class="other">

    </li>
    <center>
    <h3>Respuestas dadas en la tarea</h3>

    </center>

      <?php
      include ("../conexion_ticket.php");
      
      $colas="SELECT*FROM colas_de_tareas WHERE idTarea ='$detalles'";
 $encontrar_colas=$conexion->query($colas);
                                              if($encontrar_colas){ 
                                                $id_cola=0;
                                                $id_colitas=0;
                                                while ($col=$encontrar_colas->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                  
                                                  $id_colitas=$col["id_cola"];
                                                  $id_cola=$col["id_cola"];
                                                  include ("../conexion_ticket.php");

                                                $resp="SELECT*FROM respuesta WHERE id_cola ='$id_colitas'";
                                                $hilorep=$conexion->query($resp);
                                                                                             if($hilorep){ 
                                                                                               while ($respuestas_col=$hilorep->fetch_assoc()) {
                                                                                                include ("../conexion.php");

                                                                                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                                                                 $hilos="SELECT*FROM usuario WHERE id_usuario =".$respuestas_col["id_usuario"]."";
                                                                                                 $rps=$conexion->query($hilos);
                                                                                                 if($rps){ 
                                                                                                  while ($ciclo_rep=$rps->fetch_assoc()) {

                                                                                           
                                                ?>
    
    <li id="respuesta" class="self">
        <div class="avatar"><img src="data:image/png;base64,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" draggable="false"/></div>
      <div class="msg">

    <div class="avatar"> <img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($ciclo_rep['foto']);?>"/></div>        
        <p><?php echo "".$ciclo_rep["nombre"]."<br>" .$ciclo_rep["apellidos"].""; ?></p>
        <p><?php echo $respuestas_col["descripcion"];?></p>
        <div class="avatar"> <img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($respuestas_col['imagen']);?>"/> </div>     
        <p><?php echo $respuestas_col["fecha_creacion"];?></p>
      </div>
    </li>
    <?php
   
   
                                }
                                                                                                 }
                                                                                                }
                                                                                               }
                                                                                              }
                                                                                            }
                                                                                            ?>
    </ol>
    <form method="POST"  action="resp.php"  enctype="multipart/form-data" >


    <input id="uploadFile" name="foto" class="f-input" />

<div class="fileUpload btn btn--browse">
    <span>Subir imagen </span>
    <input id="uploadBtn" name="foto" type="file" class="upload" />
</div>

<input class="textarea" name="comentario" type="text" placeholder="Escriba una respuestas" value=""/>
<button   data-toggle="modal" data-target="#respuestas" type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Enviar</span><span> respuesta</span></button></td>   
<br>
<br>

<input name="id_tarea" type="hidden" value="<?php echo $detalles ?>" />
<input name="cod" type="hidden" value="<?php echo $n ?>" />

</form>
</div>


			</div>
		</div>
	</div>
</div> 
       <!-- Modal HTML -->
       <div id="aclaraciones" class="modal fade">
	<div class="modal-dialog modal-confirm" >
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
				</div>						
        <div class="menu">
            <div data-dismiss="modal" class="back"><i class="fa fa-chevron-left"></i> <img src="data:image/jpg;base64,<?php echo base64_encode($perfil);?>"  draggable="false"/></div>
            <div class="name"><?php echo " Administrador : $nombre_logeado $apellido_logeado"?></div>
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
      include ("../conexion_ticket.php");
      
      $aclaraciones="SELECT*FROM aclaraciones WHERE idTarea ='$detalles'";
 $aclaraciones_hechas=$conexion->query($aclaraciones);
                                              if($aclaraciones_hechas){ 
                                                while ($aclar=$aclaraciones_hechas->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                  
                                                  include ("../conexion.php");

                                                $respo_aclar="SELECT*FROM usuario WHERE id_usuario =".$aclar["id_usuario"]."";
                                                $hiloaclar=$conexion->query($respo_aclar);
                                                                                             if($hiloaclar){ 
                                                                                               while ($respuest_aclar=$hiloaclar->fetch_assoc()) {
                                                                                                include ("../conexion.php");

                                                                                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                                                                 

                                                                                           
                                                ?>
    
    <li id="respuesta" class="self">
        <div class="avatar"><img src="data:image/png;base64,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" draggable="false"/></div>
      <div class="msg">

    <div class="avatar"> <img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($respuest_aclar['foto']);?>"/></div>        
        <p><?php echo "".$respuest_aclar["nombre"]."<br>" .$respuest_aclar["apellidos"].""; ?></p>
        <p><?php echo $aclar["Motivo"];?></p>
        <p><?php echo $aclar["fecha_creacion"];?></p>
      </div>
    </li>

<?php

if($aclar["id_usuario"]==$n){

  ?>
  
    <td><a data-toggle="modal" class="valores_ar" href="#eliminar_resp" id="<?php echo $aclar['id_aclaracion']; ?>">Eliminar<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

    <td><a data-toggle="modal" class="edicion_res" href="#myModal2" id_resp="<?php echo $aclar['id_aclaracion']; ?>" Motivo="<?php echo $aclar['Motivo']; ?>">Editar respuesta<i class="fa fa-check-square-o"></i></a></td>


<?php
                                                                                                }

                                                                                                }
                                                                                               }
                                                                                              }
                                                                                            }
                                                                                            ?>
    </ol>
    <form method="POST" id="resp_aclaracion"  >



<input class="textarea" name="aclar" type="text" placeholder="Escriba una respuestas" value=""/>
<button  id="enviar_aclar" type="button" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Enviar</span><span> respuesta</span></button></td>   
<br>
<br>

<input name="id_tarea" type="hidden" value="<?php echo $detalles ?>" />
<input name="cod" type="hidden" value="<?php echo $n ?>" />

</form>
</div>


			</div>
		</div>
	</div>
</div> 
<!-- Modal HTML -->
<div id="hilos" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
				</div>						
        <div class="menu">
            <div data-dismiss="modal" class="back"><i class="fa fa-chevron-left"></i> <img src="data:image/jpg;base64,<?php echo base64_encode($perfil);?>"  draggable="false"/></div>
            <div class="name"><?php echo " Administrador : $nombre_logeado $apellido_logeado"?></div>
            <div class="last"><?php date_default_timezone_set('America/Mexico_City');

echo date("F j, Y, g:i a"); ?></div>
        </div>
    <ol class="chat">
    <li class="other">

    </li>
    <center>
    <h3>Hilo de creaciones de tareas dentro de la tarea #<?php echo $detalles;?></h3>

    </center>
    <div class="modal-body">
      <?php
      include ("../conexion_ticket.php");
      
      $hilo="SELECT*FROM hilo WHERE tarea_anterior ='$detalles'";
 $hilotareas=$conexion->query($hilo);
                                              if($hilotareas){ 
                                                while ($hil=$hilotareas->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                  
                                                  include ("../conexion.php");

                                                $creador_hilo="SELECT*FROM usuario WHERE id_usuario =".$hil["usuario"]."";
                                                $crear_hilo=$conexion->query($creador_hilo);
                                                                                             if($crear_hilo){ 
                                                                                               while ($hiloresp=$crear_hilo->fetch_assoc()) {
                                                                                                include ("../conexion.php");

                                                                                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                                                                 

                                                                                           
                                                ?>
    
    <li id="respuesta" class="self">
        <div class="avatar"><img src="data:image/png;base64,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" draggable="false"/></div>
      <div class="msg">

    <div class="avatar"> <img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($hiloresp['foto']);?>"/></div>        
        <p><?php echo "".$hiloresp["nombre"]."<br>" .$hiloresp["apellidos"].""; ?></p>
        <center>

        <b>Descripcion de tarea</b>
        <p><?php echo $hil["descripcion"];?></p>
        </center>
<center>

        <b>Tarea donde fue creada la nueva tarea</b>
        <p><?php echo $hil["tarea_anterior"];?></p>
        <p><?php echo $hil["titulo"];?></p>
        <p><?php echo $hil["fecha_creacion"];?></p>

        <b>Numero de tarea nueva</b>
        <p><?php echo $hil["idTarea"];?></p>

        </center>

      </div>
    </li>


  
    <td><a data-toggle="modal" class="valores_ar" href="#eliminar_resp2" id_hilos="<?php echo $hil['id_hilo']; ?>">Eliminar<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>


    
<?php
                                                                                           

                                                                                                }
                                                                                               }
                                                                                              }
                                                                                            }
                                                                                            ?>
    </ol>
    <form method="POST" id="resp_aclaracion"  >


    <button   data-toggle="modal" data-target="#modal1" type="button" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Nueva tarea</span><span> Crear  </span></button></td>       
<br>
<br>

<input name="id_tarea" type="hidden" value="<?php echo $detalles ?>" />
<input name="cod" type="hidden" value="<?php echo $n ?>" />

</form>


			
</div>
		</div>
	</div>
</div> 
                                        
                                        <div class="modal fade" tabindex="-1" id="modal1" role="dialog" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">

                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <form  method="post" action="crear_hilo.php" enctype="multipart/form-data" >

                                        <input name="idusuario" type="hidden" value="<?php echo $n=$_REQUEST['cod']; ?>" />
                                        <input name="id_tarea" type="hidden" value="<?php echo $detalles ?>" />

                                        </div>
                                        <div class="modal-body">

                                            <h6>Por favor describa el problema</h6>  
                                            <b>Titulo:*</b>
                                            <input class="w3-input" id="tit" REQUIRED name="titulo" type="text">                                            <br>
                                            <br>
                                         
                                            <button type="button" id="close" onclick="MostrarDatos();" ><img src="../TAREAS/imagenes_tareas/fuentes.png" class="curd" width="30" height="30" /></button>
                                            <button type="button" onclick="Negritas();" ><img src="../TAREAS/imagenes_tareas/negritas.png" class="curd" width="30" height="30" /></button>
                                            <button type="button" onclick="Quitarnegritas();" ><img src="../TAREAS/imagenes_tareas/basurero.png" class="curd" width="30" height="30" /></button>
                                            <button type="button"  onclick="PonerItalic();" ><img src="../TAREAS/imagenes_tareas//italic.png" class="curd" width="30" height="30" /></button>
                                            <button type="button"  onclick="underline();"><img src="../TAREAS/imagenes_tareas/underline.png" class="curd" width="30" height="30" /></button>
                                            <button itype="button"  onclick="linea();"><img src="../TAREAS/imagenes_tareas/linea.png" class="curd" width="30" height="30" /></button>
                                          <br>
                                            <button type="button"  onclick="fuentes();"><img src="../TAREAS/imagenes_tareas/arial.png" class="curd" width="30" height="30" /></button>
                                         
                                            <button type="button" id="close" data-toggle='modal' data-target='#modal2'><img src="../TAREAS/imagenes_tareas/images.png" class="curd" width="30" height="30" /></button>
                                            <button type="button" data-toggle='modal' data-target='#modal3'><img src="../TAREAS/imagenes_tareas/video.png" class="curd" width="30" height="30" /></button>
                                            <button type="button"  onclick="borrar();"><img src="../TAREAS/imagenes_tareas/borrar.jpg" class="curd" width="60" height="60" /></button>
                                            <button type="button" ><img src="../TAREAS/imagenes_tareas/guardar.png" class="curd" width="30" height="30" /></button>

                                            <div id="fuentes" class="dropdown">
               
                                        
                                                <div tabindex="0" class="onclick-menu">
                                                    <ul class="onclick-menu-content">
                                                        <li class="other"><button type="button" id="close" onclick="Limpiar2();"value="">-Seleccione-</button></li>
                                                        <li class="other" ><button type="button" onclick="Arial();"id="Arial">Arial</button></li>
                                                        <li class="other"><button type="button" onclick="Helvetica();"id="Helvetica">Helvetica</button></li>
                                                        <li class="other"><button type="button" onclick="Georgia();"id="Helvetica">Georgia</button></li>
                                                        <li class="other"><button type="button"onclick="Times_New_Roman();"id="Helvetica">Times New Roman</button></li>
                                                        <li class="other"><button type="button"onclick="monospace();"value="servicios">Monospace</button></li>
                                                        <li class="other"><button type="button"onclick="Remove_Font_Family();"value="sicea">Remove Font Family</button></li>

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
                                            <label for="email1">Titulo del archivo</label>
<input type="text" name="Titulo"> <br><br>
<label for="email1" >Descripcion</label>
<textarea name="descripcion" id="" cols="30" rows="10"></textarea>
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                                            <div class="controls">
<input id="fichero1" style="width:200px;" type="file" style="display:none" name="uploadedFile">  <div class="input-append">
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
         
<label for="appt">Seleccione la hora:</label>
  <input type="time"name="hora" id="appt" name="appt"><br>   
<br>


<br>
      

<div class="modal-body">

                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
                                        <input name="cod" type="hidden" value="<?php echo $id_us; ?>" />

<button type="" class="btn btn-danger" style="width:200px;">
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
                                                                  <input width="100%" height="100%"  class="file-upload-input" type='file' name="imagen" onchange="readURL(this);" accept="image/*" />
                                                                  <div class="drag-text">
                                                                    <h4>Seleccione una imagen</h4>
                                                                  </div>
                                                                </div>
                                                                <div class="file-upload-content">
                                                                  <img class="file-upload-image" src="#" alt="your image" />
                                                                  <div class="image-title-wrap">
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
<style>

.modal-confirm h4 {
	text-align: center;
	font-size: 66px;
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
a {
display: inline-block;
}
</style>

          <!-- Modal HTML -->
          <div id="respuestas_admin" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
      <div class="modal-header">
				<div class="icon-box">
				</div>						

        <div class="menu">
            <div data-dismiss="modal" class="back"><i class="fa fa-chevron-left"></i> <img src="data:image/jpg;base64,<?php echo base64_encode($perfil);?>"  draggable="false"/></div>
            <div class="name"><?php echo " Administrador : $nombre_logeado $apellido_logeado"?></div>
            <div class="last"><?php date_default_timezone_set('America/Mexico_City');

echo date("F j, Y, g:i a"); ?></div>
        </div>
    <ol class="chat">
    <li class="other">

    </li>
    <center>
    <h3>Respuestas dadas en la tarea</h3>

    </center>
   
      <?php
      include ("../conexion_ticket.php");
      
      $colas="SELECT*FROM colas_de_tareas WHERE idTarea ='$detalles'";
 $encontrar_colas=$conexion->query($colas);
                                              if($encontrar_colas){ 
                                                while ($col=$encontrar_colas->fetch_assoc()) {
                                                  // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                  
                                                  $id_colitas=$col["id_cola"];
                                                  include ("../conexion_ticket.php");

                                                $resp="SELECT*FROM respuesta WHERE id_cola ='$id_colitas'";
                                                $hilorep=$conexion->query($resp);
                                                                                             if($hilorep){ 
                                                                                               while ($respuestas_col=$hilorep->fetch_assoc()) {
                                                                                                include ("../conexion.php");

                                                                                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                                                                 $hilos="SELECT*FROM usuario WHERE id_usuario ='$n'";
                                                                                                 $rps=$conexion->query($hilos);
                                                                                                 if($rps){ 
                                                                                                  while ($ciclo_rep=$rps->fetch_assoc()) {

                                                                                           
                                                ?>
            <div class="modal-body">

    <li id="respuesta" class="self">
        <div class="avatar"><img src="data:image/png;base64,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" draggable="false"/></div>
      <div class="msg">

    <div class="avatar"> <img  id="mediana" height="100%"  src="data:image/jpg;base64,<?php echo base64_encode($ciclo_rep['foto']);?>"/></div>        
    <table  class="bordered" class="table" id="tabla" data-sort="table">
     
     <thead>
         <tr >
 
          
         <th>Clave de la respuesta</th>
           <th>Creador de la respuesta</th>
           <th>Imagen</th>

           <th>Descripcion</th>
          
 
           <th>Editar <i class="fa fa-pencil-square-o fa-4x" aria-hidden="true"></i></th>
 <th>Eliminar</th>
         </tr>
       </thead>
       <tbody>
         <tr >
           <?php
                                         
 
               
 
                                               
                                                
                                                echo "<tr>";
                                       
                                    echo ' <td id="valores"="'.$respuestas_col['id_respuesta'].'">'.$respuestas_col['id_respuesta'].'</td>';
 
                                      echo ' <td ="'.$ciclo_rep['id_usuario'].'">'.$ciclo_rep['nombre'].''.$ciclo_rep['apellidos'].'</td>';
          
                                      echo '<td><img style="max-width:80%;width:auto;height:auto;"  src="data:image/jpeg;base64,'.base64_encode($respuestas_col["imagen"]).'"/></td>';

                                      echo ' <td ="'.$respuestas_col['id_respuesta'].'">'.$respuestas_col['descripcion'].'</td>';
 
 
 
                                    echo '<td><button id="rescatar_id" onclick =pasarvalor()   data-toggle="modal" data-target="#myModal" type="button"  class="custom-btn btn-12" style="width: width: 10px;
                                      height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Modificar tarea</span><span>Editar</span></button></td>';   
                                    
                                      
                                   
                                      echo "</tr>";  
                                      
                                      ?>
                             <form action='eliminar_resp.php'  method='post' enctype='multipart/form-data'>
                              <input name='id_respuesta' type='hidden' value=<?php echo"".$respuestas_col['id_respuesta'].""?>/>;
                              <input name='id_usuario' type='hidden' value=<?php echo $n;?>/>;
                              <input name='detalles' type='hidden' value=<?php echo $detalles;?>/>;

                                      x<button id="rescatar_id"   data-toggle="modal" data-target="" type="submit"  class="custom-btn btn-12" style="width: width: 10px;
                                      height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Respuesta </span><span>Eliminar</span></button> 
                                      
                                   </form>
                                     
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
                                             
                                 
                                             </tr>
                <br>
                <br>    
      </tbody>
    </table>
     
    <?php                                                                                        }
                                                                                                 }
                                                                                                }
                                                                                               }
                                                                                              }
                                                                                            }
                                                                                            ?>

                                                                      
    </ol>
    <form method="POST"  action="resp.php"  enctype="multipart/form-data" >



<input name="id_tarea" type="hidden" value="<?php echo $detalles ?>" />
<input name="cod" type="hidden" value="<?php echo $n ?>" />

</form>
</div>

<script>
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
};

</script>
			</div>
		</div>
	</div>
</div> 
        
<!-- Modal HTML -->
<div id="eliminar_resp" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
<center>
<img src="https://media.tenor.com/images/3e8f09612511fc78ad674ff8f890a404/tenor.gif" alt="80">

</center>
        
        </div>						
				<h5 class="modal-title w-100">¿ESTAS SEGURO QUE DESEAS ELIMINAR LA RESPUESTA DE ACLARACION?</h5>	
        <p>Id de aclaracion <br> 
  </p> 
  <p> 
  <span class="idss"></span>

  </p>      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
        <form method="POST" id="eliminar_aclar">
      <input type="hidden" name="detalles_ce" id="deta"class="form-control" value="">

				<p>Una vez dado en el boton de eliminar ya no habra forma de recuperarla</p>
  <center>

        <img src="https://1.bp.blogspot.com/-GccPU9rMDGg/Xp9I6Ub3mfI/AAAAAAAADRA/5B3c9gn9ptYOOTzvlwh38w_Fsk-1bEfEgCLcBGAsYHQ/s320/HOMMER.gif
" alt="80">
</center>

      </div>
			<div class="modal-footer justify-content-center">
        <center>
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button id="eliminacion_aclarm" type="button" class="btn btn-danger">Eliminar</button>
        </center>  
      </form>

			</div>
		</div>
	</div>
</div> 

    
<!-- Modal HTML -->
<div id="eliminar_resp2" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
<center>
<img src="https://media.tenor.com/images/3e8f09612511fc78ad674ff8f890a404/tenor.gif" alt="80">

</center>
        
        </div>						
				<h4 class="modal-title w-100">¿ESTAS SEGURO QUE DESEAS ELIMINAR LA RESPUESTA DE ACLARACION?</h4>	
        <p>Id de aclaracion <br> 
 <br><span id="motiv" name="id_motivo" class="Motivo4"></span>
  </p> 
  <span class="ids"></span>

  </p>      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
        <form method="POST" id="eliminar_hilo">
      <input type="hidden" name="hilos" id="deta"class="form-control" value="">

				<p>Una vez dado en el boton de eliminar ya no habra forma de recuperarla</p>
  <center>

        <img src="https://1.bp.blogspot.com/-GccPU9rMDGg/Xp9I6Ub3mfI/AAAAAAAADRA/5B3c9gn9ptYOOTzvlwh38w_Fsk-1bEfEgCLcBGAsYHQ/s320/HOMMER.gif
" alt="80">
</center>

      </div>
			<div class="modal-footer justify-content-center">
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button id="eliminar_hilos" type="button" class="btn btn-danger">Eliminar</button>
        </form>

			</div>
		</div>
	</div>
</div> 

<script>
        $(".btn-12").on('click',function(){

$tr=$(this).closest('tbody tr');
var datos=$tr.children(" tbody td").map(function(){
return $(this).text();
});
$("#resp").val(datos[0]);
$("#clave").val(datos[1]);


$("#sincroni").val(datos[3]);


});

</script>           
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
</body>
     
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form method="POST" action="edit_resp.php"enctype="multipart/form-data" > >
   <h3>Editar respuesta seleccionada</h3>
          <b>Clave de la respuesta</b>
             <input type="text" id="resp" name="id_respuesta"class="form-control" value=""readonly="readonly" >
             <b>Respuesta</b>
             <input id="sincroni" name="resp"class="form-control" value="" >
             <input name="cod" type="hidden" value="<?php echo $n; ?>" />
             <input name="detalles" type="hidden" value="<?php echo $detalles; ?>" />

     <b>Insertar imagen si es que lo desea</b>

<div class="fileUpload btn btn--browse">
  <br>
  <input id="uploadFile" name="foto" class="f-input" value="Seleccione una imagen" />

    <span>Subir imagen </span>
    <input id="uploadBtn" name="foto" type="file" class="upload" />
</div>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit"  id="" class="btn btn-primary">Actualizar</button>
     
</form>

<script>
        $(".btn-12").on('click',function(){

$tr=$(this).closest('tbody tr');
var datos=$tr.children(" tbody td").map(function(){
return $(this).text();
});
$("#resp").val(datos[0]);
$("#clave").val(datos[1]);


$("#sincroni").val(datos[3]);


});
function MostrarDatos(){ 
        
        document.getElementById("formatos").style.display="block";
        }
        function Limpiar(){ 
          
            document.getElementById("formatos").style.display="none";
            }
            function Limpiar2(){ 
          
              document.getElementById("fuentes").style.display="none";
              }
        function Normal_texto(){ 
            var x=document.getElementById("caja").value
            document.getElementById("caja").value=x.toLowerCase();   
        }
            function heading_1(){ 
                document.getElementById('caja').style.fontSize = '3em';
               }
               function heading_2(){ 
                document.getElementById('caja').style.fontSize = '2em';
               }
               function heading_3(){ 
                document.getElementById('caja').style.fontSize = '1.5em';
               }
               function heading_4(){ 
                document.getElementById('caja').style.fontSize = '1.2em';
               }
               function heading_5(){ 
                document.getElementById('caja').style.fontSize = '1.0em';
               }
               function heading_6(){ 
                var x=document.getElementById("caja").value
       document.getElementById("caja").value=x.toUpperCase();
      }
      function Negritas() {
      
        document.getElementById("caja").style.fontWeight='bold';
      
        }
        function Quitarnegritas() {
      
            document.getElementById("caja").style="font-family: Arial;";
      
      }
      function PonerItalic() {
      
        document.getElementById("caja").style="font-style: italic;";
        
        }
        function underline() {
      
            document.getElementById("caja").style.textDecoration = "underline";                        
          
          }
      
          function linea() {
      
            document.getElementById("caja").style.setProperty("text-decoration", "line-through");                      
            
            }
        
                function Arial() {
                    document.getElementById("caja").style="font-family: Arial;";
                  
                }    
                function Helvetica() {
                    document.getElementById("caja").style="font-family: Helvetica;";
                
                } 
              function Georgia() {
                    document.getElementById("caja").style="font-family: Georgia;";
                
                } 
              function Times_New_Roman() {
                    document.getElementById("caja").style="font-family: Times New Roman;";
                
                }
              function monospace() {
                    document.getElementById("caja").style="font-family: monospace;";
                
                }
              function Remove_Font_Family() {
                    document.getElementById("caja").style="font-family: Remove Font Family;";
                
                }
                function fuentes(){ 
            
                    document.getElementById("fuentes").style.display="block";
                    }
                // File Upload
      // 
      function ekUpload(){
        function Init() {
      
          console.log("Upload Initialised");
      
          var fileSelect    = document.getElementById('file-upload'),
              fileDrag      = document.getElementById('file-drag'),
              submitButton  = document.getElementById('submit-button');
      
          fileSelect.addEventListener('change', fileSelectHandler, false);
      
          // Is XHR2 available?
          var xhr = new XMLHttpRequest();
          if (xhr.upload) {
            // File Drop
            fileDrag.addEventListener('dragover', fileDragHover, false);
            fileDrag.addEventListener('dragleave', fileDragHover, false);
            fileDrag.addEventListener('drop', fileSelectHandler, false);
          }
        }
      // Write on keyup event of keyword input element
      $(document).ready(function(){
        $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#mytable tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
        $(this).hide();
        else
        $(this).show();
        });
        });
       });
        function fileDragHover(e) {
          var fileDrag = document.getElementById('file-drag');
      
          e.stopPropagation();
          e.preventDefault();
      
          fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }
      
        function fileSelectHandler(e) {
          // Fetch FileList object
          var files = e.target.files || e.dataTransfer.files;
      
          // Cancel event and hover styling
          fileDragHover(e);
      
          // Process all File objects
          for (var i = 0, f; f = files[i]; i++) {
            parseFile(f);
            uploadFile(f);
          }
        }
      
        // Output
        function output(msg) {
          // Response
          var m = document.getElementById('messages');
          m.innerHTML = msg;
        }
      
        function parseFile(file) {
      
          console.log(file.name);
          output(
            '<strong>' + encodeURI(file.name) + '</strong>'
          );
          
          // var fileType = file.type;
          // console.log(fileType);
          var imageName = file.name;
      
          var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
          if (isGood) {
            document.getElementById('start').classList.add("hidden");
            document.getElementById('response').classList.remove("hidden");
            document.getElementById('notimage').classList.add("hidden");
            // Thumbnail Preview
            document.getElementById('file-image').classList.remove("hidden");
            document.getElementById('file-image').src = URL.createObjectURL(file);
          }
          else {
            document.getElementById('file-image').classList.add("hidden");
            document.getElementById('notimage').classList.remove("hidden");
            document.getElementById('start').classList.remove("hidden");
            document.getElementById('response').classList.add("hidden");
            document.getElementById("file-upload-form").reset();
          }
        }
      
        function setProgressMaxValue(e) {
          var pBar = document.getElementById('file-progress');
      
          if (e.lengthComputable) {
            pBar.max = e.total;
          }
        }
      
        function updateFileProgress(e) {
          var pBar = document.getElementById('file-progress');
      
          if (e.lengthComputable) {
            pBar.value = e.loaded;
          }
        }
      
        function uploadFile(file) {
      
          var xhr = new XMLHttpRequest(),
            fileInput = document.getElementById('class-roster-file'),
            pBar = document.getElementById('file-progress'),
            fileSizeLimit = 1024; // In MB
          if (xhr.upload) {
            // Check if file is less than x MB
            if (file.size <= fileSizeLimit * 1024 * 1024) {
              // Progress bar
              pBar.style.display = 'inline';
              xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
              xhr.upload.addEventListener('progress', updateFileProgress, false);
      
              // File received / failed
              xhr.onreadystatechange = function(e) {
                if (xhr.readyState == 4) {
                  // Everything is good!
      
                  // progress.className = (xhr.status == 200 ? "success" : "failure");
                  // document.location.reload(true);
                }
              };
      
              // Start upload
              xhr.open('POST', document.getElementById('file-upload-form').action, true);
              xhr.setRequestHeader('X-File-Name', file.name);
              xhr.setRequestHeader('X-File-Size', file.size);
              xhr.setRequestHeader('Content-Type', 'multipart/form-data');
              xhr.send(file);
            } else {
              output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
            }
          }
        }
      
        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
          Init();
        } else {
          document.getElementById('file-drag').style.display = 'none';
        }
      }
      ekUpload();
      
        
      
      
        $(function fecha() {
      
          // INITIALIZE DATEPICKER PLUGIN
          $('.datepicker').datepicker({
              clearBtn: true,
              format: "dd/mm/yyyy"
          });
      
      
          // FOR DEMO PURPOSE
          $('#reservationDate').on('change', function () {
              var pickedDate = $('input').val();
              $('#pickedDate').html(pickedDate);
          });
      });
      
      
      const $dropdown = $(".dropdown");
      const $dropdownToggle = $(".dropdown-toggle");
      const $dropdownMenu = $(".dropdown-menu");
      const showClass = "show";
      
      $(window).on("load resize", function() {
      if (this.matchMedia("(min-width: 768px)").matches) {
        $dropdown.hover(
          function() {
            const $this = $(this);
            $this.addClass(showClass);
            $this.find($dropdownToggle).attr("aria-expanded", "true");
            $this.find($dropdownMenu).addClass(showClass);
          },
          function() {
            const $this = $(this);
            $this.removeClass(showClass);
            $this.find($dropdownToggle).attr("aria-expanded", "false");
            $this.find($dropdownMenu).removeClass(showClass);
          }
        );
      } else {
        $dropdown.off("mouseenter mouseleave");
      }
      });
      function borrar_detalles()
      {
         document.getElementById('estado_tarea').value="";
         document.getElementById('actualizar_fecha').value="";
         document.getElementById('cambio_fecha').value="";
         document.getElementById('aclaracion').value="";
         document.getElementById('reasignar').value="";
         document.getElementById('cerrar').value="";
         document.getElementById('tareas').value="";
         document.getElementById('tit').value="";
         document.getElementById('searchTerm').value="";
         document.getElementById('search').value="";
         document.getElementById('correos').value="";
         document.getElementById('nombres_t').value="";
      
         document.getElementById('telefonia').value="";
         document.getElementById('extensiones').value="";
         document.getElementById('cajita').value="";
         document.getElementById('cajota').value="";
         document.getElementById('titulos').value="";
         
         document.getElementById('fechas_creacion').value="";
         document.getElementById('time').value="";
      
         document.getElementById('comentarios_notas').value="";
      
         
      }
      
      function borrar()
      {
         document.getElementById('caja').value="";
         document.getElementById('tit').value="";
         document.getElementById('date').value="";
         document.getElementById('depart').value="";
         document.getElementById('departa').value="";
         document.getElementById('titulos_creacion').value="";
         document.getElementById('fechas_creacion').value="";
      
         
         
         
      }
      function pasarvalor()
      {
      var valor = document.getElementById("caja_link").value;
      document.getElementById("caja").value = valor;
      }
      
      $("#date").datetimepicker({
        uiLibrary: 'bootstrap'
      });
      
      
      
      
      
      
      var container= document.getElementById('container');
      setTimeout(function(){
      container.classList.add('cerrar');
      },9000);
      
      var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('output');
          output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
      };
      function redireccionar()
      {
      document.getElementById('caja2').value=document.getElementById('videos2').value;
      
      
         
         
      }
      
      document.getElementById('usuarios').value=document.getElementById('colab').value;
      
      
         
         
      
      
      
         
      
      
      function readURL(input) {
      if (input.files && input.files[0]) {
      
        var reader = new FileReader();
      
        reader.onload = function(e) {
          $('.image-upload-wrap').hide();
      
          $('.file-upload-image').attr('src', e.target.result);
          $('.file-upload-content').show();
      
          $('.image-title').html(input.files[0].name);
        };
      
        reader.readAsDataURL(input.files[0]);
      
      } else {
        removeUpload();
      }
      }
      
      function removeUpload() {
      $('.file-upload-input').replaceWith($('.file-upload-input').clone());
      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();
      }
      $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
      });
      $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
      });
      /* W3 Example */
      function busqueda() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("buscar");
      filter = input.value.toUpperCase();
      table = document.getElementById("tabla");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
      }
      function doSearch(valor)
      
      {
      
        const tableReg = document.getElementById('datos');
      
        const searchText = document.getElementById('searchTerm').value.toLowerCase();
        let total = 0;
      
      
      
        // Recorremos todas las filas con contenido de la tabla
      
        for (let i = 1; i < tableReg.rows.length; i++) {
      
            // Si el td tiene la clase "noSearch" no se busca en su cntenido
      
            if (tableReg.rows[i].classList.contains("noSearch")) {
      
                continue;
      
            }
      
            document.cookie = "variable = " + searchTerm; //Este es el que estás ya obteniendo vía JS
         
            let found = false;
      
            const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
      
            // Recorremos todas las celdas
      
            for (let j = 0; j < cellsOfRow.length && !found; j++) {
      
                const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
      
                // Buscamos el texto en el contenido de la celda
      
                if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
      
                    found = true;
      
                    total++;
      
                }
      
            }
      
            if (found) {
      
                tableReg.rows[i].style.display = '';
      
            } else {
      
                // si no ha encontrado ninguna coincidencia, esconde la
      
                // fila de la tabla
      
                tableReg.rows[i].style.display = 'none';
      
            }
      
        }
      
      
      
        // mostramos las coincidencias
      
        const lastTR=tableReg.rows[tableReg.rows.length-1];
      
        const td=lastTR.querySelector("td");
      
        lastTR.classList.remove("hide", "red");
      
        if (searchText == "") {
      
            lastTR.classList.add("hide");
      
        } else if (total) {
      
            td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
      
        } else {
      
            lastTR.classList.add("red");
      
            td.innerHTML="No se han encontrado coincidencias";
      
        }
      
      }
</script>           
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
</body>
          </div>
		</div>
	</div>
</div> 
</div>
	
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar respuesta de la aclaracion</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form method="POST" id="envio_motivo"> <br>

              <p>Id de aclaracion <br> 
              </p>
  <p> 
  <span class="ids"></span>

  </p>      
  <p>Motivo actual <br> 
 <br><span id="motivar" name="id_motivo" class="Motivo2"></span>
  </p> 
  
        
      
  <center>

  <span>El motivo por el que se cambiara</span><br>
  
  <input type="hidden" name="motivo_act" id="resp">
  <input type="text" name="motv">

  </center>      
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="actualizar_aclaracion" class="btn btn-primary">Actualizar</button>
                </form>

              </div>
            </div>
          </div>
        </div>
 
        <div class="modal fade" tabindex="-1" id="colaborador" >
                                                <div class="modal-dialog modal-lg modal-dialog-centered" style="width:900px;" id="video">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <b>Colaboradores </b>
                                                        <button class="close" data-dismiss="modal">&times;</button>
                                                          
                                                        </div>
                                                          <div class="modal-body"  id="video">
                                                          <style>
                                                          table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
                                                          </style>
                                                          <table id="datos" style="width:20px;" >


                                                          <a data-toggle='modal' data-target='#añadir'><i  class="fa fa-plus-square" aria-hidden="true"></i>Añadir colaborador </a>
                                                          <br>
                                                          <br>
                                                          <form action="borar_colaboradores.php"  method="post" enctype="multipart/form-data">

Buscar usuario <input list="colores" name="usuarios" type="text" id="searchTerm"  type="text" onkeyup="doSearch(this.value)"placeholder="Buscador" />
<input name="codigos" type="hidden" value="<?php 
                   $n=$_REQUEST['cod'];
                echo $n; ?>" />
                <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                <input name="colab" type="hidden" value="<?php echo $fecha_creador_colab; ?>" />

<button    type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Colaborador</span><span> Eliminar  </span></button></td>       
                    </form>       
               
<?php          

                            ?>      
                      <br>
                            
                       <br>
                       <br>                                       
                                                                 
                            <th>Clave de usuarios </th>
  <th>Nombre</th><th></th><th>Telefono</th><th>Correo electronico</th>
                            
                           
                           
                            <?php
                                                          
                            
                                                          include("../conexion.php");

                                                          $query2 ="SELECT *FROM colaborador WHERE id_tarea='$detalles'";
                                                          $resultado_col=$conexion->query($query2);

                                                                       if($resultado_col){ 
                                                            while($valores2=$resultado_col->fetch_assoc()){

                            
                                                           $query3 = "SELECT id_usuario,nombre,apellidos,Telefono_celular,correo FROM usuario WHERE id_usuario=".$valores2['id_colab']."";
                                                           $user=$conexion->query($query3);

                                                           if($user){ 
                                                            while($valores3=$user->fetch_assoc()){
                                                              echo " <tr>";
                                                           echo ' <td ="'.$valores3['id_usuario'].'">'.$valores3['id_usuario'].'</td>';
                                                           echo ' <td ="'.$valores3['id_usuario'].'">'.$valores3['nombre'].'</td>';

                                                            echo ' <td ="'.$valores3['id_usuario'].'">'.$valores3['apellidos'].'</td>';
                                                            echo ' <td ="'.$valores3['id_usuario'].'">'.$valores3['Telefono_celular'].'</td>';
                                                            echo ' <td ="'.$valores3['id_usuario'].'">'.$valores3['correo'].'</td>';
                                                          }   
                                                        }
                                                          echo "    </tr>";
                                                        }
                                                      }
                                                     
                                                        ?>
                          
                             


                            
                            <script type="text/javascript">

function mostrar(valor)

{

document.getElementById("resultado").innerHTML=valor;

}

</script>

<?php $resultado = " <div id='resultado'></div>" ?>
<tr class='noSearch hide'>

    <td colspan="5"></td>

</tr>

</table>
                                                                
               
              
                <button type="button" class="btn btn-primary"style='width:200px; height:50px' onclick="borrar_detalles()">Restablecer</button>      
                <button type="button" class="btn btn-warning"style='width:200px; height:50px'data-dismiss="modal">Cancelar</button>
                <button  class="btn btn-success"style='width:200px; height:50px'>Enviar</button>
                                                            </body>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>               
                                      
                                         
                                                </form>                               
                                                </div>
                             
                          
                              <div class="modal fade" tabindex="-1" id="añadir" >
                                                <div class="modal-dialog modal-lg modal-dialog-centered" style="width:900px;" id="video">
                                                    <div class="modal-content">
                                                    <div class="modal-header">


    <h1>Colaboradores</h1>

    <form action="perfil.php"  method="post" enctype="multipart/form-data">

        <datalist id="colores">
        <?php
include("../conexion.php");
                                         
                                                  $query2 ="SELECT *FROM usuario where id_rol=1";
                                                  $userms=$conexion->query($query2);

                                                  if ($userms) {
                                                    while($valores2=$userms->fetch_assoc()){
                                                      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['nombre'].'</option>';
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['correo'].'</option>';
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['telefono'].'</option>';
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['apellidos'].'</option>';
                                                      }
                                                  }
                                                ?>
           
</datalist>
Buscar usuario <br> <input name="usuarios" type="search"  style="width:20%" id="search" onkeyup="doSearch(this.value)" placeholder="Buscador">
<button class="btn btn-success"style='width:200px; height:50px'>Ver perfil</button>

<input name="codigos" type="hidden" value="<?php echo $n; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
<input name="idTarea" type="hidden" value="<?php echo $detalles; ?>" />
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">
 <thead>
 <tr role="row">
 <th>Clave de usuarios </th>
  <th>Nombre</th><th></th><th>Telefono_casa</th><th>Telefono_celular</th><th>Correo electronico</th>

 </tr>
 </thead>
 <tbody>
 <tr>
 <?php
                                                          
                            
                                                          include("../conexion.php");
                                                     
                                                          $query2 = "SELECT id_usuario,nombre,apellidos,Telefono_casa,Telefono_celular,correo FROM usuario";
                                                          $usermsw=$conexion->query($query2);

                                                          if ($usermsw) {
                                                            while($valores2=$usermsw->fetch_assoc()){
                                                              echo " <tr>";
                                                                  echo ' <td ="'.$valores2['id_usuario'].'">'.$valores2['id_usuario'].'</td>';
                                                                  echo ' <td ="'.$valores2['id_usuario'].'">'.$valores2['nombre'].'</td>';

                                                                  echo ' <td ="'.$valores2['id_usuario'].'">'.$valores2['apellidos'].'</td>';
                                                                  echo ' <td ="'.$valores2['id_usuario'].'">'.$valores2['Telefono_casa'].'</td>';
                                                                  echo ' <td ="'.$valores2['id_usuario'].'">'.$valores2['Telefono_celular'].'</td>';

                                                                  echo ' <td ="'.$valores2['id_usuario'].'">'.$valores2['correo'].'</td>';
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

                <br>
<br>
<br>

              
               
                                                            </body>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>               
                                      
                                         
                                                <div class="modal fade" id="archivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Imagen o PDF  de apoyo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <div class="form-group">
          <style type="text/css">
    iframe { margin:0; padding:0; height:100%; }
    iframe { display:block; width:100%; border:none; }
</style>
            <label for="email1">Imagen de apoyo porpocionada para la tarea</label>
            <?php
include("../conexion_ticket.php");
$ver_pdf="SELECT*FROM archivo WHERE id_archivo=".$id_archivo;
$si2=mysqli_query($conexion,$ver_pdf);
$fin=mysqli_fetch_array($si2);
if($fin["imagen"]==""){ 
?>

<p>No hay archivos</p>            <?php
          }else{
            ?>
            <center>
<img src="/UTP/AGENTE/TAREAS/subir_archivos/<?php echo $imgtar;?>" style="max-width:30%;width:auto;height:auto;" >
</center>

            <?php 

          }
          ?>
            <form method="POST" action="/UTP/AGENTE/TAREAS/subirimagen.php" enctype="multipart/form-data"  >


  <div class="input-file-container">  
    <input name="archivo_select" class="input-file" id="my-file" type="file">
    <label tabindex="0" for="my-file" class="input-file-trigger">seleccione su imagen</label>
  </div>
  <p class="file-return"></p>

<style>
  .input-file-container {
  position: relative;
  width: 225px;
} 
.js .input-file-trigger {
  display: block;
  padding: 14px 45px;
  background: #39D2B4;
  color: #fff;
  font-size: 1em;
  transition: all .4s;
  cursor: pointer;
}
.js .input-file {
  position: absolute;
  top: 0; left: 0;
  width: 225px;
  opacity: 0;
  padding: 14px 0;
  cursor: pointer;
}
.js .input-file:hover + .input-file-trigger,
.js .input-file:focus + .input-file-trigger,
.js .input-file-trigger:hover,
.js .input-file-trigger:focus {
  background: #34495E;
  color: #39D2B4;
}

.file-return {
  margin: 0;
}
.file-return:not(:empty) {
  margin: 1em 0;
}
.js .file-return {
  font-style: italic;
  font-size: .9em;
  font-weight: bold;
}
.js .file-return:not(:empty):before {
  content: "Selected file: ";
  font-style: normal;
  font-weight: normal;
}


/* Useless styles, just for demo styles */

body {
  font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
  color: #7F8C9A;
  background: #FCFDFD;
}
h1, h2 {
  margin-bottom: 5px;
  font-weight: normal;
  text-align: center;
  color:#aaa;
}
h2 {
  margin: 5px 0 2em;
  color: #1ABC9C;
}
form {
  width: 225px;
  margin: 0 auto;
  text-align:center;
}
h2 + P {
  text-align: center;
}
.txtcenter {
  margin-top: 4em;
  font-size: .9em;
  text-align: center;
  color: #aaa;
}
.copy {
  margin-top: 2em;
}
.copy a {
  text-decoration: none;
  color: #1ABC9C;
}
</style>        
<script>
  document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
</script>

          <input name="codigo" type="hidden" value="<?php echo $n; ?>" />
    <input name="id_tarea" type="hidden" value="<?php echo $detalles; ?>" />
    <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
    <br>
    <?php  if($imgtar==null) {  ?>
    <button name="subir" id=""type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Imagen</span><span> Subir </span></button></td>       
          <?php  } ?>
          </form>
           <form action="/UTP/AGENTE/TAREAS/borrar_imagen.php" method="post">
           <input name="cod" type="hidden" value="<?php echo $n; ?>" />
    <input name="id_tarea" type="hidden" value="<?php echo $detalles; ?>" />
    <input name="id2" type="hidden" value="<?php echo $id_archivo; ?>" />
    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
    <br>
    <button name="subir" id=""type="submit" class="custom-btn btn-12" style="width: width: 10px;
                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Imagen</span><span> borrar </span></button></td>       
           
           </form>
            <div class="box">
            <form method="POST" action="/UTP/AGENTE/TAREAS/subir.php" enctype="multipart/form-data"  >
            <label for="email1">Titulo del archivo</label>
<input type="text" name="titulo"> <br><br>
<label for="email1" >Descripcion</label>
<textarea name="descripcion" id="" cols="30" rows="10"></textarea>
					<input type="file" name="archivo_select" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple="">
					<label for="file-2"><i class="fa fa-paperclip"></i><span>Subir PDF...</span></label>
   <input name="codigo" type="hidden" value="<?php echo $n; ?>" />
    <input name="id_tarea" type="hidden" value="<?php echo $detalles; ?>" />
    <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
    <input name="nombre_archivo" type="hidden" value="<?php echo $nombre_archivo; ?>" />

    <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
    <button name="subir" id=""type="submit" class="custom-btn btn-12" style="width: width: 10px; height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>Archivo</span><span> Subir </span></button></td>       
  </form>
    <table>
<tr>
  <td>Titulo</td>
  <td>Descripcion</td>
  <td>Tamaño</td>
  <td>Tipo</td>
  <td>Nombre</td>
  <td>PDF</td>
  <td>Eliminar archivo</td>

</tr>

<?php
include("../conexion_ticket.php");
$ver_pdf="SELECT*FROM archivo WHERE id_archivo='$id_archivo'";
$arrays_pdf=$conexion->query($ver_pdf);
if($arrays_pdf)
{ 
while($recorrido_pdf=$arrays_pdf->fetch_assoc()){

  ?>
  <tr>
    <td><?php echo $recorrido_pdf['Titulo'];?></td>
    <td><?php echo $recorrido_pdf['descripcion'];?></td>
    <td><?php echo $recorrido_pdf['tamaño'];?></td>
    <td><?php echo $recorrido_pdf['tipo'];?></td>
    <td><?php echo $recorrido_pdf['nombre_archivo'];?></td>

      <form action="/UTP/AGENTE/TAREAS/archivo.php" method="get">
   <input type='hidden' value='<?php echo $recorrido_pdf['id_archivo'];?>' name='id_archivo'> 
   <?php if($nombre_archivo!=null){  ?>
      <td><button name="subir" id=""type="submit" class="custom-btn btn-12" style="width: width: 10px;
         

                                     height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>PDF</span><span> Ver </span></button></td>       
     <?php  }else{  ?>
     <td></td>
     <?php  } ?>
</form>  
<form action="/UTP/AGENTE/TAREAS/borrar.php" method="post">
<input type='hidden' value='<?php echo $recorrido_pdf['id_archivo'];?>' name='id2'> 
<input type='hidden' value='<?php echo $detalles?>' name='id_tarea'> 
<input type='hidden' value='<?php echo $n?>' name='cod'> 
<?php if($nombre_archivo!=null){  ?>

<td><button name="subir" id=""type="submit" class="custom-btn btn-12" style="width: width: 10px;
                               height: 4px;"src="../TAREAS/imagenes_tareas/tarea_creada.jpg"> <span>PDF</span><span> Eliminar </span></button></td>       
  <?php  }else{  ?>
     <td></td>
     <?php  } ?>
</form>  
</tr>

  <?php
  }

}
?>
</table>
                  </div>
      
 
        <style>
          
          /*
https://tympanus.net/codrops/2015/09/15/styling-customizing-file-inputs-smart-way/
*/
.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    /* 20px */
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    /* 10px 20px */
}

.inputfile:focus + label,
.inputfile.has-focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label i,
.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    /* 4px */
    margin-right: 0.25em;
    /* 4px */
}

.inputfile + label {
    color: #004ca8;
    border: 2px solid currentColor;
}

.inputfile:focus + label,
.inputfile.has-focus + label,
.inputfile + label:hover {
    color: #599EFF;
}


        </style>
        <script>
          'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
        </script>
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
      
        <!-- /. NAV SIDE  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
  
 
    <script type="text/javascript">
    $(function () {
      $(function () {
        $(".valores_ar").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
        
            var id_hilos = $(this).attr('id_hilos');
            
            $(".Motivo").html(id);//aqui muestro la id en el campo
            $(".Motivo4").html(id_hilos);//aqui muestro la id en el campo
            $(".idss").html(id);//aqui muestro la id en el campo

            $("input[name=detalles_ce]").val(id);//Agrego la id al campo oculto que se va a enviar en el formulario
            $("input[name=hilos]").val(id_hilos);//Agrego la id al campo oculto que se va a enviar en el formulario

            
            
            $("#myModal2").modal('show');
        })
    })
    })
    $(function () {
      $(function () {
        $(".edicion_res").click(function (e) {
            e.preventDefault();
            var id_resp = $(this).attr('id_resp');
            var Motivo = $(this).attr('Motivo');

            $(".Motivo2").html(Motivo);//aqui muestro la id en el campo
            $(".ids").html(id_resp);//aqui muestro la id en el campo
            $("input[name=motivo_act]").val(id_resp);//Agrego la id al campo oculto que se va a enviar en el formulario

            

            
            
            $("#myModal2").modal('show');
        })
    })
    })
</script>
 
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
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <div class="sharethis-inline-share-buttons"></div>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

</body>
</html>

