
<?php
  $id_rep=$_POST['id_resp'];
  $id_usuario_resp=$_POST['id_usuario_res'];
  $id_usuario=$_POST['id_usuario'];
  $id_cola=$_POST['id_cola'];
  
  $integer = (int)$id_usuario;
  $idTarea=$_POST['idTarea'];
  include("conexion3.php");
$procurador_tr = $mysqli -> query ("SELECT *FROM respuesta WHERE id_respuesta='$id_rep'");
if ($procurador_tr) {
    while ($restt = mysqli_fetch_array($procurador_tr)) {
        $desc=$restt['descripcion'];
        $img=$restt['imagen'];
        $user=$restt['id_usuario'];
    }
    if ($id_usuario!=$id_usuario_resp) {
        echo "<script> 
        alert('No puedes modificar esta respuesta ,no eres el propietario'); 
        window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer'; 
        </script>";
        // header("Location:/UTP/AGENTE/TAREAS/detalles2.php?idTarea=$idTarea&codigo=$integer&id_cola=$id_cola&usur=$integer");
    }
}
  ?>
  <html>
<head>
   <meta charset="utf-8">
   <title>Mostrar Ventane Modal de forma Automático</title>
   <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tareas</title>
     <!-- BOOTSTRAP STYLES-->
     <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->

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


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
    <style>

@import url(http://fonts.googleapis.com/css?family=Open+Sans);
 

 body{
    background: url(https://sintesis.com.mx/puebla/wp-content/uploads/2019/03/05AGO2015-AF_12.jpg) no-repeat fixed center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100%;
    width: 100% ;
    text-align: center;
  
 }

 #pr
 {
    background: url(https://fondosmil.com/fondo/17538.jpg) no-repeat fixed center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100%;
    width: 100% ;
    text-align: center;
  
 }
    </style>
</head>
<body>

   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
     
   <div class="modal-dialog modal-lg modal-dialog-centered" style="width:900px; height:500px;">
        <form id="pr" action="editar_hilo.php" method="post" enctype="multipart/form-data">

           <div class="modal-header" >

                                        <input name="idusuario" type="hidden" value=<?php echo   $n=$_POST['id_usuario']; ?> />
                                     
                                        </div>
                                          <div class="modal-body">
                                                    <br>
                                            <b>Descripcion: *</b>
                                            <br>
                                            <button type="button" class="btn btn-primary"style='width:100px; height:50px' onclick="borrar_detalles();" >Restablecer</button>      
                                        
                                        <button class="btn btn-danger"style='width:100px; height:50px' >
                                        Actualizar</button>                                      <button type="button"  href="#" class="btn btn-primary" role="button" style='width:100px; height:50px' data-dismiss="modal" aria-pressed="true">Cancelar</button>                                 
                                           
                                        
                                            <br>
                                            <textarea  style="width:800px; height:800px;" name="comentarios" id="cajota" rows="10" cols="40"><?php echo $desc; ?></textarea>

                                            <button type="button" id="close" onclick="MostrarDatos();" ><img src="../imagenes/fuentes.png" width="30" height="30" /></button>
                                            <button type="button" onclick="Negritas();" ><img src="../imagenes/negritas.png" width="30" height="30" /></button>
                                            <button type="button" onclick="Quitarnegritas();" ><img src="../imagenes/basurero.png" width="30" height="30" /></button>
                                            <button type="button"  onclick="PonerItalic();" ><img src="../imagenes/italic.png" width="30" height="30" /></button>
                                            <button type="button"  onclick="underline();"><img src="../imagenes/underline.png" width="30" height="30" /></button>
                                            <button itype="button"  onclick="linea();"><img src="../imagenes/linea.png" width="30" height="30" /></button>
                                          <br>
                                            <button type="button"  onclick="fuentes();"><img src="../imagenes/arial.png" width="30" height="30" /></button>
                                         
                                            <button type="button" id="close" data-toggle='modal' data-target='#fotito'><img src="../imagenes/images.png" width="30" height="30" /></button>
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
                               
                                            <input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
                   <input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />
                   <input name="id_archivo" type="hidden" value="<?php echo $id_archivo; ?>" />
                   <input name="id_usuario" type="hidden" value="<?php echo $user; ?>" />
                   <input name="usuario_logeado" type="hidden" value="<?php echo $id_usuario; ?>" />
                   <input name="id_rep" type="hidden" value="<?php echo $id_rep; ?>" />

                           
   
</div>

</div>

</div>

</div>

</div>

                     
                                        
                                <div class="container">
                                        <body>
                                            <div class="modal fade" tabindex="-1" id="fotito" >
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
                                                                <input class="file-upload-input" type='file'  name="imagen" onchange="readURL(this);" accept="image/*" />
                                                                  <div class="drag-text">
                                                                      <b>Imagen actual a modificar</b>
                                                                  <td><img  id="mediana" style="max-width:30%;width:auto;height:auto;" src="data:image/jpg;base64,<?php echo base64_encode($img);?>"/>

                                                                    <h4>Seleccione una imagen</h4>
                                                                  </div>
                                                                </div>
                                                                <div class="file-upload-content">
                                                                <img width="100%" height="100%" class="file-upload-image" src="#" alt="your image" />                                                                  <div class="image-title-wrap">

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
</body>
<form action="regresar_det.php" method="post">
<input name="codigos" type="hidden" value="<?php echo $id_usuario; ?>" />
<input name="id_tarea" type="hidden" value="<?php echo $idTarea; ?>" />
<input name="id_cola" type="hidden" value="<?php echo $id_cola; ?>" />

<button  id="close"><img src="http://lh3.ggpht.com/-ZA23nk4NLcM/UXdct4jwarI/AAAAAAAACnc/0g-Y5mW7qjA/Gifs-animados-flechas-se%2525C3%2525B1alizadores%252520%25252819%252529_thumb.gif?imgmax=800" width="70" height="70" />Regresar </button>

</form>

</html>
