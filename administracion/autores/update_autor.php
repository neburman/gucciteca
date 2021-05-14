<?php
    require '../conexion.php';
    $cod_autor = $_POST['cod_autor'];
    $nombre_aut = $_POST['nombre_autor'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha_nac = $_POST['fecha_nac'];
    $sql = "UPDATE AUTORES SET NOMBRE_AUTOR='$nombre_aut', NACIONALIDAD='$nacionalidad', FECHA_NAC='$fecha_nac' WHERE COD_AUTOR='$cod_autor'";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El autor se ha modificado de manera exitosa");window.location.href="autores.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("El autor no se ha modificado de manera exitosa");window.location.href="autores.php";</script>';
    }
    mysqli_close($conectar);
?>