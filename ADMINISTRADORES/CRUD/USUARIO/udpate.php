<?php
 include("../conexion.php");
 $id=$_POST['matricula'];
 $Estatus=0;
 $Rol=0;
 $Departamento=0;
  

    if(@$_POST['e1']!=null)
    {
        $Estatus=$_POST['e1'];

    }
    else {
        $E2=mysqli_query($conexion,"SELECT id_estatus FROM usuario where id_usuario= $id");
        $E3=mysqli_fetch_assoc($E2);
        $Estatus=$E3['id_estatus'];

    }

    
    if(@$_POST['r1']!=null)
    {
        $Rol=$_POST['r1'];

    }
    else {
        $R2=mysqli_query($conexion,"SELECT id_rol FROM usuario where id_usuario= $id");
        $R3=mysqli_fetch_assoc($R2);
        $Rol= $R3['id_rol'];  

    }  

    if(@$_POST['d1']!=null)
    {
        $Departamento=$_POST['d1'];

    }
    else {
        $D2=mysqli_query($conexion,"SELECT id_departamento FROM usuario where id_usuario= $id");
        $D3=mysqli_fetch_assoc($D2);
        $Departamento= $D3['id_departamento'];

    }


    
 $Update= "UPDATE usuario set id_rol = $Rol , id_estatus= $Estatus, id_departamento=$Departamento   WHERE id_usuario = $id";
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



