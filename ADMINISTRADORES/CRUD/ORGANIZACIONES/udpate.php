<?php
 include("../conexion.php");
 $Depa=$_POST['depa'];
 $Nombre=$_POST['n'];
 $Correo=$_POST['c'];
 $Estatus=0;
 $Descripcion=$_POST['d'];
 $Lider=0;  
    if(@$_POST['e']!=null)
    {
        $Estatus=$_POST['e'];

    }
    else {
        $E2=mysqli_query($conexion,"SELECT idEstatu FROM departamento where idDepartamento= $Depa");
        $E3=mysqli_fetch_assoc($E2);
        $Estatus=$E3['idEstatu'];
    }
    if(@$_POST['l']!=null)
    {
        $Lider=$_POST['l'];

    }
    else {
        $D2=mysqli_query($conexion,"SELECT idusuLider FROM departamento where idDepartamento= $Depa");
        $D3=mysqli_fetch_assoc($D2);
        $Lider= $D3['idusuLider'];
    }

  
 $Update= "UPDATE departamento set idEstatu = $Estatus , idusuLider= $Lider, idDepartamento=$Depa , nombre='$Nombre', correo='$Correo', descripcion='$Descripcion'  WHERE idDepartamento = $Depa";
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



