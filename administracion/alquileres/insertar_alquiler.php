<?php
    require '../conexion.php';
    $cod_libro = $_POST['codigo_libro'];
    $dni_cliente = explode(", ", $_POST['dni_cliente']);
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $sql = "INSERT INTO ALQUILERES(FECHA_INICIO, FECHA_FIN, ID_COPIA, DNI_CLIENTE) VALUES ('$fecha_inicio', '$fecha_fin', '$cod_libro', '$dni_cliente[0]')";
    if($query = mysqli_query($conectar,$sql)) {
        $sql = "UPDATE COPIAS SET DISPONIBLE = 0 WHERE IDENTIFICADOR = '$cod_libro'";
        mysqli_query($conectar, $sql);
        echo'<script type="text/javascript">alert("El alquiler se ha creado de manera exitosa");window.location.href="alquileres.php";</script>';
    }
    else {
        echo'<script type="text/javascript">alert("Ha sucedido un error al crear el alquiler");";</script>';
    }
    mysqli_close($conectar);
?>