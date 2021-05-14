<?php
    require '../conexion.php';
    $dni_cliente = $_POST['dni_cliente'];
    $sql = "DELETE FROM CLIENTES WHERE DNI='$dni_cliente'";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El cliente se ha eliminado de manera exitosa");window.location.href="clientes.php";</script>';
    }else{
        //echo'<script type="text/javascript">alert("No ha sido posible eliminar al cliente");window.location.href="clientes.php";</script>';
        echo $dni_cliente;
    }
    mysqli_close($conectar);
?>