<?php
    require '../conexion.php';
    $cod_autor = $_POST['cod_autor_delete'];
    $sql = "DELETE FROM AUTORES WHERE COD_AUTOR='$cod_autor'";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El autor se ha eliminado de manera exitosa");window.location.href="autores.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("No ha sido posible eliminar al autor");window.location.href="autores.php";</script>';
    }
    mysqli_close($conectar);
?>