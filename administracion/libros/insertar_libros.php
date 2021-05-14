<?php
    require '../conexion.php';
    $titulo = $_POST['titulo_libro'];
    $fecha_publi = $_POST['fecha_publicacion'];
    $tipo = $_POST['tipo_libro'];
    $editorial = $_POST['editorial_libro'];
    $cod_autor = explode(", ", $_POST['codigo_autor']);
    $sql = "SELECT * FROM LIBROS WHERE NOMBRE = '$titulo'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas != 1) {
        $sql = "INSERT INTO LIBROS(NOMBRE, FECHA_PUBLICACION, TIPO, EDITORIAL, COD_AUTOR) VALUES ('$titulo', '$fecha_publi', '$tipo', '$editorial', '$cod_autor[0]')";
        if($query = mysqli_query($conectar,$sql)) {
            echo'<script type="text/javascript">alert("El libro se ha introducido de manera exitosa");window.location.href="libros.php";</script>';
        }
        else {
            echo'<script type="text/javascript">alert("Ha sucedido un error al introducir el libro");window.location.href="libros.php";</script>';
        }
    }
    else {
        echo'<script type="text/javascript">alert("El libro introducido ya esta en la base de datos");window.location.href="libros.php";</script>';
    }
    mysqli_close($conectar);
?>