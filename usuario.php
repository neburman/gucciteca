<?php
    //conectamos con el servidor
    $db='id16128363_gucciteca';
    $user='id16128363_neburman';
    $server='localhost';
    $pass='SomorrostroDam1#' ;
    
    $conecta=mysqli_connect($server,$user,$pass,$db);
    //recuperamos las variables
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
    //realizamos la sentencia sql
    $sql = "INSERT INTO usuario(nombre,apellidos,usuario,correo,contraseña) VALUES('$nombre','$apellidos','$usuario','$correo_electronico','$contrasena')";
    //ejecutamos la sentencia sql
    $ejecutar = mysqli_query($conecta,$sql);
    if(!$ejecutar){
        echo "Ha sucedido un error en la insercion";
    }
    //cerramos la conexion
    mysqli_close($conecta);
?>