<?php include "conexion_2.php";
$depa=$_POST['continente'];

	$sql="SELECT id_usuario,nombre,id_departamento FROM usuario WHERE id_departamento = '$depa'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<br>
			<select id='lista2' name='agente_depa' class='btn btn-success'  style='width:150px;' ";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>