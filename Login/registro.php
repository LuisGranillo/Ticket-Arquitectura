
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
    <script type="text/javascript" src="../Login/js/animacion.js"></script>

    <title>Formulario</title>
</head>
<body>
<form class="form" method="post"  action="guardar.php" enctype="multipart/form-data">
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
            <input REQUIRED type="password" class="inputs" minlength="8" name="contr" placeholder="Contraseña">
            <input REQUIRED type="password" class="inputs" minlength="8" name="contr2" placeholder="Repite la contraseña">
            <input class="formulario" type="submit" value="Registrarse">
            <a href="index.php"> Iniciar sesión </a> 
            <style>
                a:visited{
 
/*  color:black;*/
  text-decoration: none;
}
a:hover{

text-decoration: none;
/* font-size: 50px;*/
box-shadow: 0px 3px 0px #1d64ad;
background:#3BA7E1;
color: white;
}
a{
color:#fff;
font-size: 20px;
background: #1d64ad;
 color:white;
 box-shadow: 0px 5px 0px #000;
 display: inline-block;
text-decoration: none;
padding: 5px 10px 5px;
margin-right: 40%;
margin-left: 40%;
text-align:center;

margin-top:5%;
}
img {
    filter: drop-shadow(10px 10px 20px #444);
}

  
            </style>
        </section>
    </form>
</body>
</html>