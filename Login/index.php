<?php
	@session_start();
	include ("Clase_BD.php");
	$DB=new	DB();

	 
     header( "refresh:3;url=inicio.php" );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Login/css/estilos.css">
</head>
<body>
    <div class="container" id="container">
        <div class="preloader" >
            <p>Cargando</p>
        </div>
    </div>
    <script src="../Login/js/animacion.js"></script>
</body>
</html>