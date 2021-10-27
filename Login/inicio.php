
<html>
<head>
<title> Sistema Universitario</title>
<!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div class="modal-dialog text-center">
     <div class="col-sm-8 main-section">
            <div class="modal-content">
         <div class="col-12 user-img">
                 <img src="img/logo.png"/>
            </div>
           <form class="col-12" action="logeo.php" method="post">
          <div class="form-group" id="user-group">
        <input required type="text" class="form-control" name="correo" placeholder="Correo electronico"/>
            </div>
      <div class="form-group" id="contrasena-group">
        <input required minlength="8" type="password" class="form-control" name="contra" placeholder="Contraseña">
            </div>
          <button type="submit" class="btn btn-primary"> <i class="fas fa-sign-in-alt"></i>  Ingresar</button>
          <button type="submit" class="btn btn-secondary"> <i class="fas fa-sign-in-alt"></i>  <a href="registro.php"> Registrarte </a> </button>
     </form>
      <div class="col-12 forgot">
           <a href="#">Recordar contrasena<a>
     </div>
</div>
</body>
</html>
