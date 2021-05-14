<?php
    require '../conexion.php';
    $cod_libro = $_POST['codigo_libro'];
    $nombre_libro = $_POST['nombre_libro'];
    $fecha_publi = $_POST['fecha_publicacion'];
    $tipo_libro = $_POST['tipo_libro'];
    $editorial = $_POST['editorial'];
    $sql = "UPDATE LIBROS SET NOMBRE='$nombre_libro', FECHA_PUBLICACION='$fecha_publi', TIPO='$tipo_libro', EDITORIAL='$editorial' WHERE COD_LIBRO='$cod_libro'";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El libro se ha modificado de manera exitosa");window.location.href="libros.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("El libro no se ha modificado de manera exitosa");window.location.href="libros.php";</script>';
    }
    mysqli_close($conectar);
?>