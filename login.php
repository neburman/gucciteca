<?php
    //conectamos con el servidor
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron' ;
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);

<<<<<<< HEAD
    session_start();

=======
>>>>>>> 84e6ea16ede3b00afc473b49f9b6437594db1d37
    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contrasena'];

    $sql = "SELECT * FROM LOGIN WHERE USUARIO = '$usuario' AND CONTRASENA = '$contrasena'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas == 1) {
<<<<<<< HEAD
        $_SESSION['logueado'] = true;
        header("Location: administracion/menu.php");
=======
        header("Location: administracion/menu.html");
>>>>>>> 84e6ea16ede3b00afc473b49f9b6437594db1d37
    }
    else {
        echo'alert("Contraseña introducida erronea")';
        header("Location: index.html");
    }
    mysqli_close($conectar);
?>