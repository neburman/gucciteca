<?php
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron' ;
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);
    $nombre_aut = $_POST['nombre_autor'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha_nac = $_POST['fecha_nac'];
    $sql = "SELECT * FROM AUTORES WHERE NOMBRE_AUTOR = $nombre_aut";
    $query = mysqli_query($conectar,$sql);
    $numero_filas = mysqli_num_rows($query);
    if($numero_filas == 1) {
        echo'<script type="text/javascript">alert("El autor introducido ya esta en la base de datos");</script>';
    }
    else {
        $sql = "INSERT INTO AUTORES(NOMBRE_AUTOR, NACIONALIDAD, FECHA_NAC) VALUES ($nombre_aut, $nacionalidad, $fecha_nac)";
        if($query = mysqli_query($conectar,$sql)) {
            echo'<script type="text/javascript">alert("El autor introducido ya esta en la base de datos");</script>';
        }
        else {
            echo'<script type="text/javascript">alert("Ha sucedido un error al introducir al usuario");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUCCITECA</title>
    <meta name="author" content="Arkaitz Arias, Ruben Moreno, Imanol Nanclares, Iker Sañudo">
    <link rel="stylesheet" href="inserts.css">
    <link rel="icon" href="../../imagenes/favicon.png" type="image/png" />
</head>
<body>
    <header>
        <h1>
            <a href="https://gucciteca.000webhostapp.com">MENU-GUCCITECA</a>
            <img src="../../imagenes/logotipo.jpg" alt="Logo-empresa">
        </h1>
    </header>
    <form action="anadir_autores.php" method="post">
        <p>Nombre autor: <input type="text" name="nombre_autor" required></p>
        <p>Nacionalidad del autor: <input type="text" name="nacionalidad" required></p>
        <p>Fecha de nacimiento: <input type="date" name="fecha_nac" required></p>
        <div id="botones">
            <input type="submit" value="Insertar">
            <input type="reset" value="Borrar">
        </div>
    </form>
</body>
</html>