<?php
    require '../conexion.php';
    $nombre_aut = $_POST['nombre_autor'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha_nac = $_POST['fecha_nac'];
    $sql = "SELECT * FROM AUTORES WHERE NOMBRE_AUTOR = '$nombre_aut'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas != 1) {
        $sql = "INSERT INTO AUTORES(NOMBRE_AUTOR, NACIONALIDAD, FECHA_NAC) VALUES ('$nombre_aut', '$nacionalidad', '$fecha_nac')";
        if($query = mysqli_query($conectar,$sql)) {
            echo'<script type="text/javascript">alert("El autor se ha introducido de manera exitosa");window.location.href="autores.php";</script>';
        }
        else {
            echo'<script type="text/javascript">alert("Ha sucedido un error al introducir al usuario");window.location.href="autores.php";</script>';
        }
    }
    else {
        echo'<script type="text/javascript">alert("El autor introducido ya esta en la base de datos");window.location.href="autores.php";</script>';
    }
    mysqli_close($conectar);
?>