<?php
 include("../conexion.php");
 
 $Nombre=0;
 $Equipo=0;
 $Id=$_POST['Mi'];
 
  
  

    if(@$_POST['Mn']!=null)
    {
        $Nombre=$_POST['Mn'];

    }

    else if(@$_POST['Mn']==null){
      $Z=mysqli_query($conexion,"SELECT * FROM trabaja where id_trabaja= $Id");
      if($Z)
      {
          $Extraccion=mysqli_fetch_assoc($Z);
          $Nombre=$Extraccion['id_usuario'];
      }
      
  }
    

    if(@$_POST['Me']!=null)
    {
        $Equipo=$_POST['Me'];

    }

    else  if(@$_POST['Me']==null) {
      $Y=mysqli_query($conexion,"SELECT * FROM trabaja where id_trabaja= $Id");
      if($Y)
      {
          $Extraccion=mysqli_fetch_assoc($Y);
          $Equipo=$Extraccion['idEquipo'];
      }
      
  }



  
 
 $Update= "UPDATE trabaja set id_usuario = $Nombre , idEquipo= $Equipo   WHERE id_trabaja = $Id";
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



