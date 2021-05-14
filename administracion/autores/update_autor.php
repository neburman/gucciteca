<?php
<<<<<<< HEAD
    require '../conexion.php';
=======
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron';
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);
>>>>>>> 84e6ea16ede3b00afc473b49f9b6437594db1d37
    $cod_autor = $_POST['cod_autor'];
    $nombre_aut = $_POST['nombre_autor'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha_nac = $_POST['fecha_nac'];
<<<<<<< HEAD
    $sql = "UPDATE AUTORES SET NOMBRE_AUTOR='$nombre_aut', NACIONALIDAD='$nacionalidad', FECHA_NAC='$fecha_nac' WHERE COD_AUTOR='$cod_autor'";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El autor se ha modificado de manera exitosa");window.location.href="autores.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("El autor no se ha modificado de manera exitosa");window.location.href="autores.php";</script>';
    }
=======
    $sql = "UPDATE AUTORES SET NOMBRE_AUTOR='$nombre_aut', NACIONALIDAD='$nacionalidad', FECHA_NAC='$fecha_nac' WHERE COD_AUTOR=$cod_autor";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El autor se ha modificado de manera exitosa");</script>';
    }else{
        echo'<script type="text/javascript">alert("El autor no se ha modificado de manera exitosa");</script>';
    }
    header("Location: modificar_autor.php");
>>>>>>> 84e6ea16ede3b00afc473b49f9b6437594db1d37
    mysqli_close($conectar);
?>