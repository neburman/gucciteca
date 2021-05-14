<?php
    require '../conexion.php';
    $dni_cliente = $_POST['dni_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $fecha_nac = $_POST['fecha_nac'];
    $multa = ($_POST['multa'] == "SI"? 1 : 0);
    $fin_multa = $_POST['fin_multa'];
    if(empty($fin_multa)) {
        $sql = "UPDATE CLIENTES SET NOMBRE = '$nombre_cliente', FECHA_NAC = '$fecha_nac', MULTA = '$multa', FIN_MULTA = NULL WHERE DNI = '$dni_cliente'";
    }
    else{
        $sql = "UPDATE CLIENTES SET NOMBRE = '$nombre_cliente', FECHA_NAC = '$fecha_nac', MULTA = '$multa', FIN_MULTA = '$fin_multa' WHERE DNI = '$dni_cliente'";
    }
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El cliente se ha modificado de manera exitosa");window.location.href="clientes.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("El cliente no se ha modificado de manera exitosa");window.location.href="clientes.php";</script>';
    }
    mysqli_close($conectar);
?>