<style type="text/css">
    html, body, div, iframe { margin:0; padding:0; height:100%; }
    iframe { display:block; width:100%; border:none; }
</style>
<?php
include("conexion1.php");
$ver_pdf="SELECT*FROM archivo WHERE id_archivo=".$_GET['id_archivo'];
$si2=mysqli_query($conexion,$ver_pdf);
$fin=mysqli_fetch_array($si2);

    if($fin["nombre_archivo"]==""){

    
    ?>
    <p>No hay archivos</p>
    <?php
   }else{?>
   <iframe src="subir_archivos/<?php echo $fin["nombre_archivo"];?>">
</iframe>
     <?php
      }

?>