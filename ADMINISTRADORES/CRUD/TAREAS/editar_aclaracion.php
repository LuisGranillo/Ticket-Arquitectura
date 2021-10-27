<?php
$id_aclaracion=$_POST["motivo_act"];
$motv=$_POST["motv"];
include("../conexion_ticket.php");
$resp="UPDATE aclaraciones SET Motivo='$motv' WHERE id_aclaracion='$id_aclaracion'";
$hilorep=$conexion->query($resp);
echo "Se actualizo correctamente";