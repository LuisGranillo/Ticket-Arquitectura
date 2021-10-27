<?php

require ('conexion.php');

$id = $_POST["id"];

$id_u = $_POST["id_u"];

$status = $_POST["status"];

//terminar variables...

$actualizar = "UPDATE Ticket set Id_status='$status', Fecha_Update= CURRENT_TIMESTAMP where Id_Ticket = '$id'";
$resultado = mysqli_query($conexion,$actualizar);

//terminar snetencia sql 

echo "<script> window.location=' ./tickets_mios.php?id=$id_u'</script>";

?>