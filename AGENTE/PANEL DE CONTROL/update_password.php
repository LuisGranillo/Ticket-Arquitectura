
<?php
  include("../conexion.php");
    $n=$_POST['Usuario'];
    $antigua=$_POST['antiguo'];
    $nueva=$_POST['nueva'];
    $nueva2=$_POST['nueva2'];
          
        $consulta= "SELECT * FROM usuario where id_usuario=$n";
        $c2= mysqli_query($conexion,$consulta);
        if ($c2) {
            $c3=mysqli_fetch_array($c2);

            $m=$c3['contraseña'];
    
            if ("$m"==MD5("$antigua")) {
                if ("$nueva"=="$nueva2") {
                    $update="UPDATE usuario set contraseña=MD5('$nueva2') WHERE id_usuario=$n";
                    mysqli_query($conexion, $update);

                    if ($update) {
                        echo "<script> 
                                    alert('Contraseña actualizada de forma correcta');
                                    window.history.go(-1);
                                </script>";
                    }
                } else {
                    ?>
                            <script>    
                                alert("Vuelve a intentarlo, los campos no coinciden");
                                window.history.go(-1);
                            </script>
                    <?php
                }
            } else {
                echo "<script>alert('Tu contraseña actual está incorrecta');
                window.history.go(-1);
                </script>";
            }
        }
?>