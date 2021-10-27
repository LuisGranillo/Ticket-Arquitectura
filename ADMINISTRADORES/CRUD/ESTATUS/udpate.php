<?php
 include("../conexion.php");
 $id=$_POST['id'];
 $Nombre=$_POST['t'];
  
 
 $Update= "UPDATE estatus set tipo = '$Nombre'   WHERE idEstatus = $id";
 $Ud2= mysqli_query($conexion,$Update);
 if($Ud2)
 {
     ?>
  <script>
     alert("Nombre actualizado");
    window.history.go(-1);

  </script>
  <?php
 }
 else
 {?>
   <script>
   alert("Algo falló, intentalo otra vez");
   window.history.go(-1);
  

</script>
<?php
 }
  ?>



