<?php
    require '../conexion.php';
    $dni_cliente = $_POST['dni_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $fecha_nac = $_POST['fecha_nac'];
    $sql = "SELECT * FROM CLIENTES WHERE DNI = '$dni_cliente'";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas != 1) {
        $sql = "INSERT INTO CLIENTES(DNI, NOMBRE, FECHA_NAC) VALUES ('$dni_cliente', '$nombre_cliente', '$fecha_nac')";
        if($query = mysqli_query($conectar,$sql)) {
            echo'<script type="text/javascript">alert("El cliente se ha introducido de manera exitosa");window.location.href="clientes.php";</script>';
        }
        else {
            echo'<script type="text/javascript">alert("Ha sucedido un error al introducir el cliente");window.location.href="clientes.php";</script>';
        }
    }
    else {
        echo'<script type="text/javascript">alert("El cliente introducido ya esta en la base de datos");window.location.href="clientes.php";</script>';
    }
    mysqli_close($conectar);
?>