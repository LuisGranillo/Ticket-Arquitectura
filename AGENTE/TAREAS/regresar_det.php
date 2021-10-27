<?php


$codigo=$_POST['codigos'];
$id_tarea=$_POST['id_tarea'];

$id_cola=$_POST['id_cola'];

$integer = (int)$codigo;

echo "<script> 
    window.location.href='/UTP/AGENTE/TAREAS/detalles2.php?codigo=$integer&idTarea=$id_tarea&id_cola=$id_cola&usur=$integer'; 
    </script>"; 