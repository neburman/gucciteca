<?php
    require '../conexion.php';
    $cod_alquiler = $_POST['cod_alquiler'];
    $cod_copia = $_POST['cod_copia'];
    $sql = "DELETE FROM ALQUILERES WHERE COD_ALQUILER=$cod_alquiler";
    if($query = mysqli_query($conectar,$sql)){
        $sql = "UPDATE COPIAS SET DISPONIBLE = 1 WHERE IDENTIFICADOR = '$cod_copia'";
        mysqli_query($conectar, $sql);
        echo'<script type="text/javascript">alert("El alquiler se ha eliminado de manera exitosa");window.location.href="alquileres.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("No ha sido posible eliminar el alquiler");window.location.href="alquileres.php";</script>';
    }
    mysqli_close($conectar);
?>