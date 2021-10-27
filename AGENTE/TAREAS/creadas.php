
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
   
   <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../CSSAGENTE/tablas.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="../CSSAGENTE/estilos.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="../CSSAGENTE/Tareas.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script type="text/javascript" src="../js/materialize.js"></script>
   <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="../js/mostrar.js"></script>
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
     echo "Bienvenido " .   ($row['nombre']);
     echo "<br>";
     echo ($row['apellidos']);
     }
     ?>
   </div>
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
                    <li>
                        <a href="../TAREAS/tareas.html"><i class="fa fa-edit "></i>Tareas </a>    
                        <ul class="nav nav-second-level">
                            <li>
                            <?php echo "<a href='../TAREAS/tareas.php?codigo=$n'>"?><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Abierto</a>
                            </li>
                           
                                             
                            
                           
                        </ul>                    
                    </li>                     
   <li>
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

                                         
$querycolas = $mysqli -> query ("SELECT*FROM  colas_de_tareas WHERE estado='Abierto'");
if ($querycolas) {
    while ($colas = mysqli_fetch_array($querycolas)) {
        $quien_abrio_tarea=$colas['id_creador'];
    }
}

include("conexion3.php");
                                         
                                       $queryc = $mysqli -> query ("SELECT *FROM tarea where id_usuario='$quien_abrio_tarea'");
                                       if ($queryc) {
                                           while ($valoresc = mysqli_fetch_array($queryc)) {
                                               $cuenta += 1;
                                           }
                                       }
                                     include("conexion3.php");
                                         
                                     $queryc = $mysqli -> query ("SELECT *FROM tarea where id_usuario='$n'");
                                     if ($queryc) {
                                         while ($valoresc = mysqli_fetch_array($queryc)) {
                                             $cuenta2 += 1;
                                         }
                                     }
                                       ?>        
                        <button data-toggle='modal' data-target='#modal1' ><img src="../imagenes/abierto.jpeg" width="70" height="70" /></button>
                        <a href="#" data-toggle='modal' data-target='#modal1'><i></i>Nueva tarea</a>
                        <br>
                        <br>
                       <form action="abierto.php" method="post">
                        <button ><img src="../imagenes/new.png" width="70" height="70" /></button>
                      <?php  $n=$_POST['id_usuarios'];?>
                    <input name="id_usuarios" type="hidden" value="<?php echo $n; ?>" />

                        <a><i></i><?php echo "Abierto: $cuenta" ?></a>
                        <input name="id_usuarios" type="hidden" value="<?php echo $n; ?>" />

                        </form>
                        <br>
                        <form action="creadas.php" method="post">
                        <button  ><img src="../imagenes/task.png" width="70" height="70" /></button>
                        <a href="#"><i></i><?php echo "Mis tares: $cuenta2" ?></a>
                        <input name="id_usuarios" type="hidden" value="<?php echo $n; ?>" />

                        </form>
                        <br>
                        <br>
                       
                        <div class="dropdown">
                        Buscador de tareas<input list="colores" name="usuarios" type="text" id="searchTerm"  type="text" onkeyup="doSearch(this.value)"placeholder="Encontrar tarea" />
                
                            <a href="social.html"><i class="fa fa-search "></i></a>
                        
                            <button  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../imagenes/opc.png" width="20" height="20" />
                            </button>
                            <div class="dropdown-menu" >
                              <a class="dropdown-item" href="new.html"></i>Creado más reciente</a>
                              <a class="dropdown-item" href="update.html">Actualización más reciente</a>
                              <a class="dropdown-item" href="time_tarea.html">Fecha de Vencimiento</a>
                              <a class="dropdown-item" href="tareas.html"><i class="fa fa-arrow-down fa-lg"></i>Tarea Número</a>
                              <a class="dropdown-item" href="hilos.html">Hilos más largos</a>

                            </div>
                          </div>





                        <br>
               
                        <button ><img src="../imagenes/CARGA.png" width="40" height="40" /></button>

                        <a href="#" data-toggle='modal' data-target='#modal1'><i></i><h3>TAREAS</h3> </a>
                        
                        <br>
                        <table id="datos" style="width: 100%;"  class="w3-table w3-bordered w3-striped" >

                    <tr class="w3-teal">
                    <th >n.º</th>
                    <th style="width: 2%;">Ticket</th>
                    <th>Fech de creación</th>
                    <th >Titulos y Departamento</th>

                    <th style="width: 15%;"> </th>

             

                  
                    <th style="width: 20%;">Hora  </th>






                                         <?php
                                          
                                             $n=$_POST['id_usuarios'];
                                             include("conexion3.php");
                                         
                                             $querycolas = $mysqli -> query ("SELECT*FROM  colas_de_tareas WHERE estado='Abierto'");
                                             if ($querycolas) {
                                                 while ($colas = mysqli_fetch_array($querycolas)) {
                                                     $quien_abrio_tarea=$colas['id_creador'];
                                                 }
                                             }

                                      include("conexion3.php");
                                         
                                              $query2 = $mysqli -> query ("SELECT*FROM  tarea WHERE id_usuario='$n'");
                                              if ($query2) {
                                                  while ($valores2 = mysqli_fetch_array($query2)) {
                                                      $rp=$_GET['rp'];
                                                    
                                                      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                      echo "<tr>";
                                                      echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['idTarea'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
                                                      echo ' <td ="'.$valores2[''].'">'.$valores2['id_ticket'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
                                                      echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Creacion_tarea'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a id="cclinico" href="tareas2.php?id='.$valores2['idTarea'].'&codigos='.$n.'&codigo='.$n.'';
              

                                                      echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Titulo'].'</td>';
                                                      echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Departamento'].'</td>';
                                                      echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['Creador'].'</td>';
                                                      echo ' <td ="'.$valores2['idTarea'].'">'.$valores2['hora'].'</td>';

                                                      echo "</tr>";
                                                  }
                                              }
                                                ?>
                                                               <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>

</table>
           
                        
           
                                        <form action="variables.php" method="post" enctype="multipart/form-data" >
                                        
                                        <div class="modal" tabindex="-1" id="modal1" >
                                <div class="modal-dialog modal-lg  modal-dialog-centered" style="width:700px;" id="modales" >
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button class=""style="position: absolute; left:0;" data-dismiss="modal">&times;</button>
                                   
                                        <input name="idusuario" type="hidden" value="<?php echo $n=$_GET['codigo']; ?>" />
                                     
                                        </div>
                                          <div class="modal-body">
                                            <h6>Por favor describa el problema</h6>  
                                            <b>Titulo:*</b>
                                            <input class="w3-input" id="tit" name="titulo" type="text">                                            <br>
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
                                                        <li><button onclick="Limpiar();"value="">-Seleccione-</button></li>
                                                        <li><button onclick="Normal_texto();"id="Arial">Normal texto</button></li>
                                                        <li><button  onclick="heading_1();"id="Helvetica">Heading 1</button></li>
                                                        <li><button  onclick="heading_2();">Heading 2 </button></li>
                                                        <li><button onclick="heading_3();"id="Helvetica">Heading 3</button></li>
                                                        <li><button onclick="heading_4();"value="servicios">Heading 4 </button></li>
                                                        <li><button onclick="heading_5();"value="sicea">Heading 5</button></li>
                                                            <li><button onclick="heading_5();"value="sicea">Heading 5</button></li>

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
<label for="email1" >Descripcion del archivo</label>
<input id="fichero1" type="file" style="display:none" name="uploadedFile">  <div class="input-append">
    <input id="falso1" class="input-xlarge" type="text">
    <a class="btn btn-file btn btn-primary btn-lg active " ></a><i class="fa fa-folder-open-o"></i> Seleccionar</a>
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
                                  
                                            <select class="form-control form-control-lg" id="departa" name="departamentos" >
                                            <?php
                                             include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM departamento");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['nombre'].'</option>';
                                                      }
                                                  }
                                                ?>                      
</select>
            <div id="proct" >
                                                <b>Procurador: </b>
                                                <br>
                                         
                                                <select class="form-control form-control-lg"  id="depart" name="procurador" >
                                                <?php
                                             include("conexion2.php");
                                         
                                                  $query2 = $mysqli -> query ("SELECT *FROM usuario where id_rol=1");
                                                  if ($query2) {
                                                      while ($valores2 = mysqli_fetch_array($query2)) {
                                                          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
           
                                                          echo '<option ="'.$valores2['id_rol'].'">'.$valores2['nombre'].'</option>';
                                                      }
                                                  }
                                                ?>           
</select>
                                                        <?php
                                             include("conexion2.php");
                                          
   $n=$_GET['codigo'];
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
  <b>Elija una fecha </b>
                                   <input class="form-control form-control-lg"  name="fech" width="40%" height="40%" id="date" type="date" value="2021-06-01">
<br>
<br>
                                                  <b>Hora de vencimiento</b>
    <input id="timepicker" width="270" name="hora" style="width:500px;"/>
    <script>
        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap'
        });
    </script>

                           
                                        <a href="#" class="btn btn-success" role="button"  onclick="borrar();" aria-pressed="true">Restablecer</a>      
                                        
<button class="btn btn-danger" style="width:200px;">
    Crear tarea
</button>                                        <a href="#" class="btn btn-primary btn-lg active" role="button"  data-dismiss="modal" aria-pressed="true">Cancelar</a>                                 
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
                                      
                                                                        
                                
                                        
                                        </form>
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
                                                                <textarea name="video" id="videos" cols="30" rows="10">URL:</textarea>
                                                                <button type="button" onclick="redireccionar();"class="btn btn-primary" type="submit">Subir link</button>
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
     <!-- WIZARD SCRIPTS -->
    <script src="../assets/js/wizard/modernizr-2.6.2.min.js"></script>
    <script src="../assets/js/wizard/jquery.cookie-1.3.1.js"></script>
    <script src="../assets/js/wizard/jquery.steps.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script> 
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>