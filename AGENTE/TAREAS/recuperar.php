
<?php
$codigo=$_GET['cod'];



if($codigo!=null){
  echo "se inserto correctamente";
  header("Location:/UTP/AGENTE/TAREAS/variables.php?codigo=$codigo");


}
if($codigo==null){

  echo "fallas al isertar";

  header("Location:/UTP/Login/registro.php?");
     }