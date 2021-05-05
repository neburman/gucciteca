<?php
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron';
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);
    $nombre_aut = $_POST['nombre_autor'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha_nac = $_POST['fecha_nac'];
    $sql = "SELECT * FROM AUTORES WHERE NOMBRE_AUTOR = '$nombre_aut'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas != 1) {
        $sql = "INSERT INTO AUTORES(NOMBRE_AUTOR, NACIONALIDAD, FECHA_NAC) VALUES ('$nombre_aut', '$nacionalidad', '$fecha_nac')";
        if($query = mysqli_query($conectar,$sql)) {
            echo'<script type="text/javascript">alert("El autor se ha introducido de manera exitosa");</script>';
        }
        else {
            echo'<script type="text/javascript">alert("Ha sucedido un error al introducir al usuario");</script>';
        }
    }
    else {
        echo'<script type="text/javascript">alert("El autor introducido ya esta en la base de datos");</script>';
    }
    header("Location: anadir_autores.php");
    mysqli_close($conectar);
?>