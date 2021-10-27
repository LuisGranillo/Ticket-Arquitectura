<?php
 include("../conexion.php");
 $id=$_POST['matricula'];
 $Nombre=$_POST['nombre'];
 $Lider='';
 
 $Descripcion=$_POST['descripcion'];
  
  

    if(@$_POST['lider']!=null)
    {
        $Lider=$_POST['lider'];

    }
    else {
        $Z=mysqli_query($conexion,"SELECT * FROM equipo where idEquipo= $id");
        if($Z)
        {
            $Extraccion=mysqli_fetch_assoc($Z);
            $Lider=$Extraccion['idUsuario'];
        }
        

    }
 
 $Update= "UPDATE equipo set nombre = '$Nombre' , idUsuario= $Lider, Descripcion='$Descripcion'   WHERE idEquipo = $id";
 $Ud2= mysqli_query($conexion,$Update);
 if($Ud2)
 {
     ?>
  <script>
     alert("Información actualizada");
    window.history.go(-1);

  </script>
  <?php
 }
 else
 {?>
   <script>
   alert("Algo fallo intentalo otra vez");
   window.history.go(-1);
  

</script>
<?php
 }
  ?>



