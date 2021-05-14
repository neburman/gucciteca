<?php
    require '../conexion.php';
    $cod_libro = $_POST['cod_libro_delete'];
    $sql = "DELETE FROM LIBROS WHERE COD_LIBRO='$cod_libro'";
    if($query = mysqli_query($conectar,$sql)){
        echo'<script type="text/javascript">alert("El libro se ha eliminado de manera exitosa");window.location.href="libros.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("No ha sido posible eliminar el libro");window.location.href="libros.php";</script>';
    }
    mysqli_close($conectar);
?>