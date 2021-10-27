<?php


$codigo=$_POST['codigos'];

$id_tarea=$_POST['id_tarea'];

$integer = (int)$codigo;

echo "<script> 
    window.location.href='detalles_tareas.php?cod=$integer&detalles=$id_tarea'; 
    </script>"; 