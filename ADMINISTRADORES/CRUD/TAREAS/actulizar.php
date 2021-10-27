<?php
//************ conexion a BD ***************
$id_tar="";
if(@$_POST["id_tarea"]!=null){
    $id_tar=$_POST["id_tarea"];
    $integer = (int)$id_tar;
}
if(@$_POST["id_tarea"]==null){
    $id_tar="";

    echo "No hay nada en la variable";

}

$titulo="";
if(@$_POST["titulo"]!=null){
    $titulo=$_POST["titulo"];
}
if(@$_POST["titulo"]==null){
    $titulo="";

    echo "No hay nada en la variable";

}
$DESCRIPCION="";
if(@$_POST["DESCRIPCION"]!=null){
    $DESCRIPCION=$_POST["DESCRIPCION"];
}
if(@$_POST["DESCRIPCION"]==null){
    $DESCRIPCION="";

    echo "No hay nada en la variable";

}
$DESCRIPCION="";
if(@$_POST["DESCRIPCION"]!=null){
    $DESCRIPCION=$_POST["DESCRIPCION"];
}
if(@$_POST["DESCRIPCION"]==null){
    $DESCRIPCION="";

    echo "No hay nada en la variable";

}
$hora="";
if(@$_POST["hora"]!=null){
    $hora=$_POST["hora"];
}
if(@$_POST["hora"]==null){
    $hora="";

    echo "No hay nada en la variable";

}
$dateofbirth="";
if(@$_POST["dateofbirth"]!=null){
    $dateofbirth=$_POST["dateofbirth"];
}
if(@$_POST["dateofbirth"]==null){
    $dateofbirth="";

    echo "No hay nada en la variable";

}
$Procurador="";
if(@$_POST["procurador"]!=null){
    $Procurador=$_POST["procurador"];
}
if(@$_POST["procurador"]==null){
    $Procurador="";

    echo "No hay nada en la variable";

}
$departamentos="";
if(@$_POST["departamentos"]!=null){
    $departamentos=$_POST["departamentos"];
}
if(@$_POST["departamentos"]==null){
    $departamentos="";

    echo "No hay nada en la variable";

}

$id_proc = intval(preg_replace("/[^0-9]+/", "", $Procurador), 10);

include("../conexion.php");

$procuradores="SELECT*FROM usuario WHERE id_usuario ='$id_proc'";
$destinatario=$conexion->query($procuradores);
                                             if($destinatario){ 
                                               while ($dir=$destinatario->fetch_assoc()) {
                                                 // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                 $usrw=''.$dir['nombre'].'\n'.$dir['apellidos'].'';
                                                 
                                                 }
                                               }
                                               include("../conexion_ticket.php");

 $tareas="UPDATE tarea SET Titulo='$titulo',Vencimiento='$dateofbirth',procurador='$usrw',Descripcion='$DESCRIPCION',hora='$hora',Departamento='$departamentos',pr='$id_proc' WHERE idTarea='$integer'";
 $tareas_pr=$conexion->query($tareas);
 echo "Se actualizo la tarea correctamente";
