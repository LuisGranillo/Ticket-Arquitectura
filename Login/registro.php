
<?php
	@session_start();
	include ("Clase_BD.php");
	$DB=new	DB();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Login/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="../Login/js/animacion.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



    <title>Formulario</title>
</head>
<body>
<form class="form" method="post"  action="./guardar.php" enctype="multipart/form-data">
        <section class="formulario">
            <h4>Registro</h4>
            <center>
                <img width="40%" height="25%" style="border-radius: 10em; text-shadow: 0 0 30px rgb(48, 26, 241); box-shadow: 0 0 20px rgb(19, 70, 238);" class="sombra" id="output"/>
            </center>        
                     <br>
                   <center>
                   <label for="imageUpload"  class="btn btn-primary btn-block btn-outlined"style="text-shadow: 0 0 30px rgb(48, 26, 241); box-shadow: 0 0 20px rgb(19, 70, 238);">Suba una imagen de perfil si lo desea</label>  
                        <input type="file"  name="imagen" accept="image/*" id="imageUpload"  style="display: none" style="text-shadow: 0 0 30px rgb(48, 26, 241); box-shadow: 0 0 20px rgb(19, 70, 238);" onchange="loadFile(event)">
            
                   </center>
           
         
            <br>
            <input REQUIRED type="text" name="nom" class="inputs" placeholder="Nombre">
            <input REQUIRED type="text" class="inputs" name="apellid" placeholder="Apellidos">
            <input REQUIRED minlength="12"type="email" class="inputs" name="mail" placeholder="Correo electronico">
            <input REQUIRED type="password" class="inputs" minlength="3" name="contr" placeholder="Contrase??a">
            <input REQUIRED type="password" class="inputs" minlength="3" name="contr2" placeholder="Repite la contrase??a">
            <div >
            <input style="float:left;" REQUIRED type="checkbox" name="terminos"><p style="float:right; color:white;">Aceptar los  terminos y condiciones          </p>
            </div>
            <br>
            <br>
            <div style="justify-content:'center'; align-items:'center'; margin:0">
            <p style="color:white;">Al dar click en registrarse est??s aceptando nuestros
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
              terminos y condiciones 
            </button></p>
            </div>
           

            <input class="formulario" type="submit" value="Registrarse">
            <a  class="a" href="index.php"> Iniciar sesi??n </a> 
            
         


            <style>
                .a:visited{
 
/*  color:black;*/
  text-decoration: none;
}
.a:hover{

text-decoration: none;
/* font-size: 50px;*/
box-shadow: 0px 3px 0px #1d64ad;
background:#3BA7E1;
color: white;
}
.a{
color:#fff;
font-size: 20px;
background: #1d64ad;
 color:white;
 box-shadow: 0px 5px 0px #000;
 display: inline-block;
text-decoration: none;
padding: 5px 10px 5px;
margin-right: 30%;
margin-left: 30%;
text-align:center;
margin-top:5%;
}
img {
    filter: drop-shadow(10px 10px 20px #444);
}
            </style>
        </section>
    </form>


    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align:center; color:white; background:blue;">
        <h5 class="modal-title" id="exampleModalLongTitle">T??RMINOS DE USO, DESLINDE DE RESPONSABILIDADES 
Y DERECHOS DE PROPIEDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p style="text-align:justify;">
      A continuaci??n, se describen los t??rminos bajo los cuales puedes acceder y utilizar el 
sitio web de Universidad Tecnol??gica de Puebla Osticket. Ubicado en 
http://evirtual.utpuebla.edu.mx/tickets/index.php, as?? como tambi??n el uso de 
cualquier informaci??n publicada en el sitio web de Osticket. Al acceder a la aplicaci??n 
web, aceptas estar sujeto a los t??rminos de este Acuerdo. De no aceptar los t??rminos 
y condiciones establecidos en este Acuerdo, no podr??s acceder ni hacer uso de la 
aplicaci??n web de Osticket ni de la informaci??n contenida en el mismo.
<br>
<br>
Los t??rminos y condiciones establecidos en este Acuerdo pueden cambiar sin previo 
aviso. Es tu responsabilidad verificar semejantes cambios. Si no est??s de acuerdo 
con alguna enmienda, puedes abandonar o dejar de usar y acceder a la aplicaci??n.
<br>
<br>
<strong>Usando OSTICKET</strong>
<br>
<br>
Qui??n puede usar nuestros servicios
<br>
<br>
Puedes usar el servicio del sistema ??nicamente si eres miembro de la Universidad 
tecnol??gica de Puebla y con arreglo a los t??rminos y a todas las leyes aplicables. 
Cuando te registres en el sistema o accedas como usuario invitado debes 
proporcionar informaci??n precisa y completa adem??s de usar el correo institucional 
(correos personales ser??n rechazados) y est??s de acuerdo con actualizar tu 
informaci??n para que siga siendo precisa y completa.
<br>
<br>
El acceso y uso del sitio por parte del Usuario tiene car??cter gratuito. La Universidad 
tecnol??gica de Puebla se reserva el derecho de hacer necesario el registro al sistema 
por parte del Usuario para poder hacer uso y acceder al sitio, en caso de que sea 
necesario.
<br>
<br>
<strong>Obligaci??n de hacer uso correcto del SITIO y de los 
CONTENIDOS</strong>
<br>
<br>

El USUARIO se obliga a utilizar el SITIO y los CONTENIDOS conforme a las leyes 
aplicables y lo dispuesto en estos T??RMINOS DE USO. El USUARIO se obliga a 
utilizar el SITIO y cualquiera de los CONTENIDOS, de tal forma que no lesione 
derechos o intereses de la Universidad Tecnol??gica de Puebla o de terceros. 
Comprometi??ndose el USUARIO en forma particular a abstenerse de:
  <br><br>


<strong>a)</strong> Utilizar el SITIO y los CONTENIDOS de forma, con fines o efectos contrarios a la 
ley y a lo establecido en los presentes T??RMINOS DE USO :
<br><br>
<strong>b)</strong> copiar, difundir, modificar, reproducir, distribuir o utilizar de cualquier forma con 
fines de lucro el SITIO y/o los CONTENIDOS, salvo que se cuente con la autorizaci??n 
expresa y por escrito de la Universidad Tecnol??gica de Puebla;
<br><br>
<strong>c)</strong>modificar o manipular las marcas, logotipos, avisos comerciales, nombres 
comerciales y signos distintivos en general que formen parte del SITIO o los 
CONTENIDOS, lo anterior sin importar qui??n sea el titular de los derechos sobre los 
mismos, con la salvedad de que se cuente con la autorizaci??n por escrito de la 
Universidad Tecnol??gica de Puebla;

<br><br>
<strong>d)</strong> suprimir o modificar, de manera parcial o total el SITIO o los CONTENIDOS, as?? 
como los dispositivos t??cnicos de protecci??n, o cualquier mecanismo o procedimiento 
establecido en el SITIO,

<br><br>
<strong>e)</strong>todo acto o intento para extraer a trav??s del SITIO o de sus CONTENIDOS 
informaci??n, materiales o c??digos no dispuestos para su uso como parte del SITIO, 
todo acto o intento por introducir, sin la autorizaci??n correspondiente, informaci??n, 
materiales o c??digos ajenos al SITIO o a los CONTENIDOS, as?? como a sistemas 
inform??ticos de terceros.

<br><br>

<strong>Informaci??n de car??cter personal o confidencial</strong>

<br><br>
El USUARIO autoriza expresamente a la Universidad Tecnol??gica de Puebla a utilizar, 
procesar, administrar e investigar para los fines para los que fue proporcionada, toda 
la informaci??n (incluyendo la de car??cter personal o confidencial) que ??ste le 
proporcione a la Universidad Tecnol??gica de Puebla a trav??s del SITIO (en adelante 
INFORMACI??N PERSONAL).
<br><br>
El USUARIO se obliga a proporcionar INFORMACI??N PERSONAL verdadera y 
fidedigna. 
<br><br>
Universidad Tecnol??gica de Puebla, <strong>NO</strong> podr?? compartir con terceros INFORMACI??N 
PERSONAL, salvo que ??sta sea requerida por autoridad judicial o administrativa 
competente, o sea necesario para prestar un servicio o un producto requerido por el 
USUARIO, lo cual queda expresamente autorizado por el USUARIO.
<br><br>
<strong>Responsabilidad</strong>
<br><br>

La Universidad Tecnol??gica de Puebla no garantiza que su Osticket o CONTENIDOS 
est??n exentos de elementos que pudieran producir alteraciones o da??ar el sistema 
inform??tico (software y/o hardware) del USUARIO o la informaci??n almacenada en 
dicho sistema. Por lo cual la Universidad Tecnol??gica de Puebla no es responsable
en forma alguna por los da??os y perjuicios que pudiera sufrir el USUARIO, producto 
del acceso y/o uso del SITIO o los CONTENIDOS.
<br><br>
El USUARIO reconoce y acepta ser el ??nico responsable por el acceso y/o uso del 
SITIO y los CONTENIDOS, liberando de esta forma el USUARIO de cualquier 
responsabilidad, a la Universidad Tecnol??gica de Puebla.
<br><br>
El USUARIO es responsable de cualquier da??o y/o perjuicio que ocasionase a la 
Universidad Tecnol??gica de Puebla por el acceso y/o uso del sistema y/o de los 
CONTENIDOS. Lo anterior con independencia de la obligaci??n del USUARIO de 
pagar y resarcir los da??os y perjuicios que le ocasione a la Universidad Tecnol??gica 
de Puebla. 

<br><br> 
</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
    
      </div>
    </div>
  </div>
</div>


    
</body> 
</html>
