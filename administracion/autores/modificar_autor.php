<?php
    $basededatos='2021Equipo5';
    $usuario='2021Equipo5';
    $server='datos.somorrostro.com';
    $contrasena='manolcabron' ;
    $conectar=mysqli_connect($server,$usuario,$contrasena,$basededatos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUCCITECA</title>
    <meta name="author" content="Arkaitz Arias, Ruben Moreno, Imanol Nanclares, Iker Sañudo">
    <link rel="stylesheet" href="modificaciones.css">
    <link rel="icon" href="../../imagenes/favicon.png" type="image/png" />
</head>
<body>
    <header>
        <h1>
            <a href="https://gucciteca.000webhostapp.com">MENU-GUCCITECA</a>
            <img src="../../imagenes/logotipo.jpg" alt="Logo-empresa">
        </h1>
    </header>
    <section id="modificar_autor">
        <p>Seleccionar el autor:  
            <select name="autor" id="autor">
                <?php
                    $sql = "SELECT * FROM AUTORES";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_AUTOR']?>, <?php echo $mostrar['NOMBRE_AUTOR']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="anadir_autores.php" method="post">
            <p>Nombre autor: <input type="text" name="nombre_autor" required></p>
            <p>Nacionalidad del autor: <input type="text" name="nacionalidad" required></p>
            <p>Fecha de nacimiento: <input type="date" name="fecha_nac" required></p>
            <div id="botones">
                <input type="submit" value="Insertar">
                <input type="reset" value="Borrar">
            </div>
        </form>
    </section>
</body>
</html>