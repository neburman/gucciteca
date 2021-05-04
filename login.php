<?php
    //conectamos con el servidor
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron' ;
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);

    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contrasena'];

    $sql = "SELECT * FROM LOGIN WHERE USUARIO = '$usuario' AND CONTRASENA = '$contrasena'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas == 1) {
        header("Location: administracion/menu.html");
    }
    else {
        echo'alert("Contraseña introducida erronea")';
        header("Location: index.html");
    }
    mysqli_close($conectar);
?>