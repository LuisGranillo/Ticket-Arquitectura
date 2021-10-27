<?php
 include("../conexion.php");
 
$imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
$id=$_POST['id'];
 $Update= "UPDATE usuario set foto='$imagen' where id_usuario = $id";
 $Ud2= mysqli_query($conexion,$Update);
  
  if($Ud2){
  ?>
  <script>
     alert("Foto actualizada");
     window.history.go(-1);

  </script>
 <?php }
  else
  {
 echo "  <script>
 alert('Algo falló, intentalo otra vez');
 window.history.go(-1);

</script>";

  }
   
?>