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
    <link rel="stylesheet" href="consultas.css">
    <link rel="icon" href="../../imagenes/favicon.png" type="image/png" />
</head>
<body>
    <header>
        <h1>
            <a href="https://gucciteca.000webhostapp.com">MENU-GUCCITECA</a>
            <img src="../../imagenes/logotipo.jpg" alt="Logo-empresa">
        </h1>
    </header>
    <section id="consulta">
        <table>
            <thead>
                <tr>
                    <th>COD_AUTOR</th>
                    <th>NOMBRE_AUTOR</th>
                    <th>NACIONALIDAD</th>
                    <th>FECHA_NAC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM AUTORES";
                $consulta = mysqli_query($conectar, $sql);
                while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['COD_AUTOR']?></td>
                    <td><?php echo $mostrar['NOMBRE_AUTOR']?></td>
                    <td><?php echo $mostrar['NACIONALIDAD']?></td>
                    <td><?php echo $mostrar['FECHA_NAC']?></td>
                </tr>
                <?php
                    }
                    mysqli_close($conectar);
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>