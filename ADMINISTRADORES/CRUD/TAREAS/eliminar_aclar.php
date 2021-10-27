<?php
$detalles_ce=$_POST["detalles_ce"];
include("../conexion_ticket.php");
$resp="DELETE FROM aclaraciones WHERE id_aclaracion='$detalles_ce'";
$hilorep=$conexion->query($resp);
echo "Respuesta borrada";