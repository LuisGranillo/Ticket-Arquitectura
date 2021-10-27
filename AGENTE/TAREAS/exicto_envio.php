
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tarea creada exictosamente</title>

   <!-- GOOGLE FONTS-->
   <link rel="stylesheet" href="../CSSAGENTE/moda_correo.css">
</head>
<style>
    
   
</style>
<input type="checkbox" id="cerrar">
		<div class="modal">
			<div class="contenido">
				<h2>La tarea se creo exictosamente</h2>
                <b>Se le avisara por correo electronico al usuario asignado a la tarea</b>
                <br>
                <form action="regreso_correo.php"  method="post" enctype="multipart/form-data"><b></b>
<button style="color:black; height:60px; width:300px; font-size:16px; backghround-color:red; font-family:verdana;" ><img src="../imagenes/ex-.jpg" style="border:  5px; border-radius: 50%;" width="40" height="40" /><b>Aceptar para continuar</b></button>
<input name="codigo" type="hidden" value="<?php 
    $id_usuario=$_GET['codigos'];

echo $id_usuario; ?>" />
  
</form>
                <img src="https://i.pinimg.com/originals/d8/71/43/d8714380c3ae0e0c7f916b8a1848faff.gif" style="border:  5px; border-radius: 50%;" width="200" height="200"> 
                <br>

            </div>
		</div>
		