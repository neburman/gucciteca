<?php
    //conectamos con el servidor
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron' ;
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);

    session_start();

    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contrasena'];

    $sql = "SELECT * FROM LOGIN WHERE USUARIO = '$usuario' AND CONTRASENA = '$contrasena'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas == 1) {
        $_SESSION['logueado'] = true;
        header("Location: administracion/menu.php");
    }
    else {
        echo'<script type="text/javascript">alert("Contraseña introducida erronea");window.location.href="index.html";</script>';
    }
    mysqli_close($conectar);
?>