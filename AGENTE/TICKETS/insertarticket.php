<?php
include ('conexion.php');
$id = $_GET["id"];
$Correo2 = $_POST["correo"];
$Correo = $_POST["8"];
$Llave = $_POST["7"];
$Id_Agente = $_POST["Id_Agente"];
$Remitente = $_POST["nombre"];
$Id_status = 1;
$Id_Tema = $_POST["id_tema"];
$Asunto = $_POST["asunto"];
$Nota = $_POST["Nota"];
$nombre=$_FILES['Archivo']['name'];
$guardado=$_FILES['Archivo']['tmp_name'];
$route = "Public/img/".$nombre;
	
move_uploaded_file($guardado,$route);

$insertar = "INSERT INTO Ticket(Remitente,Id_Agente,Id_status,Id_Tema,Asunto,Nota_Inter,Archivo) VALUES ('$Remitente','$Id_Agente','$Id_status','$Id_Tema','$Asunto','$Nota','$nombre')";


//terminar snetencia sql 
$resultado = mysqli_query($conexion,$insertar);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <br> <br>
    <center>
        <div class="container" >
            <div class="col-md-12">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-black">
                        <i class="fa fa-bicycle"></i>
                    </span>
                    <div class="text-box">
                                <p class="main-text">! Tu Ticket Fue Entrego ¡</p>
                                <p>Gracias por su paciencia </p>
                                <p>Tiempo de respuesta : 48 hrs.</p>
                        <hr />
                        <p>
                            <span class=" color-bottom-txt"><i class="fa fa-edit"></i>
                               Te recordamos estar atento a tus proximos correos si no resives
                               una retroalimentacion via email, recuerda que puedes observar los tickets
                               realizados con tu cuenta.  vista --> <a href=""> Mis Tickets </a>
                    
                            </span>


                        </p>
                        <hr />
                        Si se presenta alguna pregunta te recomendamos visita --> <a href=""> FQA </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <form action="enviarmeiler.php?id=<?php echo $id?>" method="post">
            <input type="hidden" value="<?php echo $Remitente ?>" name="nombre"type="text">
            <input type="hidden" value="<?php echo $Asunto ?>" name="asunto"type="text">

            <input type="hidden" value="<?php echo $Nota ?>" name="mensaje"type="text">

            <input type="hidden" value="<?php echo $Correo ?>" name="8"type="text">
            <input type="hidden" value="<?php echo $Correo2 ?>" name="correo"type="text">
            <label>Para confirmar la notificacion de tu ticket ingresa tu contraseña de tu cuenta: </label>
            <input style="width: 50%   "type="password" class="form-control" name="7" placeholder="Password">
            <br>
            <button class="btn btn-success">confirmar</button>

    </form>
    </center>

    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>


