<?php
    require '../conexion.php';
    $cod_alquiler = $_POST['codigo_alquiler'];
    $dias_multa = $_POST['dias_multa_copia'];
    $cod_copia = $_POST['codigo_copia'];
    $dni_cliente = $_POST['dni_cliente_copia'];
    $hoy = getdate();
    $fecha_actual = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];
    $sql = "UPDATE ALQUILERES SET FECHA_DEVOLUCION = '$fecha_actual' WHERE COD_ALQUILER=$cod_alquiler";
    if($query = mysqli_query($conectar,$sql)){
        $sql = "UPDATE COPIAS SET DISPONIBLE = 1 WHERE IDENTIFICADOR = '$cod_copia'";
        mysqli_query($conectar, $sql);
        if($dias_multa > 0) {
            $sql = "UPDATE CLIENTES SET MULTA = 1, FIN_MULTA = '$dias_multa' WHERE DNI = '$dni_cliente'";
            mysqli_query($conectar, $sql);
        }
        echo'<script type="text/javascript">alert("El alquiler se ha finalizado de manera exitosa");window.location.href="alquileres.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("El alquiler no se ha podido finalizar");window.location.href="alquileres.php";</script>';
    }
    mysqli_close($conectar);
?>