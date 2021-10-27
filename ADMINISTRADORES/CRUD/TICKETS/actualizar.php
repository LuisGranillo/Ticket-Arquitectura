<?php
include ('../conexion_ticket.php');
$cod = $_POST['cod'];
$id_ticket = $_POST["id"];
$id_status = $_POST["estado"];
$campo = $_POST["campo"];
$id_asignado = $_POST["asignado"];
$conexion2 = new mysqli('localhost', 'root', 'toor2019.', 'sistema_de_competencia');
$q3 = "SELECT usuario.id_usuario, departamento.idDepartamento FROM usuario INNER JOIN departamento ON usuario.id_departamento = departamento.idDepartamento";
$respuesta3 = mysqli_query($conexion2, $q3);
while($row3=mysqli_fetch_row($respuesta3)) {
    if  ($row3[0] == $id_asignado) {
        $actualizar = "UPDATE Ticket SET Id_status = '$id_status', $campo = '$id_asignado', Id_Departamento = '$row3[1]' WHERE Id_Ticket = '$id_ticket'";
    }
    else {
        $actualizar = "UPDATE Ticket SET Id_status = '$id_status', $campo = '$id_asignado' WHERE Id_Ticket = '$id_ticket'";
    }
$resultado = mysqli_query($conexion,$actualizar);
} mysqli_free_result($respuesta3);
echo "<script> window.location=' ./Tickets.php?cod=$cod'</script>";
?>