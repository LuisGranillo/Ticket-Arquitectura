   <?php


$codigo=$_POST['codigos'];



$integer = (int)$codigo;

echo "<script> 
    window.location.href='/UTP/AGENTE/TAREAS/tareas.php?codigo=$integer'; 
    </script>"; 