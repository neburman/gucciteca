<?php
    require '../conexion.php';
    session_start();
    if(!$_SESSION['logueado']) {
        header("location: ../../index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUCCITECA</title>
    <meta name="author" content="Arkaitz Arias, Ruben Moreno, Imanol Nanclares, Iker Sañudo">
    <link rel="stylesheet" href="autores.css">
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
        <h2 class="secciones">AUTORES DISPONIBLES</h2>
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
                ?>
            </tbody>
        </table>
    </section>
    <section id="consulta">
        <h2 class="secciones">AÑADIR UN NUEVO AUTOR</h2>
        <form action="insertar_autores.php" method="post" id="insert">
            <p>Nombre autor: <input type="text" name="nombre_autor" required></p>
            <p>Nacionalidad del autor: <input type="text" name="nacionalidad" required></p>
            <p>Fecha de nacimiento: <input type="date" name="fecha_nac" required></p>
            <div id="botones">
                <input type="submit" value="Insertar">
                <input type="reset" value="Borrar">
            </div>
        </form>
    </section>
    <section id="modificar_autor">
        <h2 class="secciones">MODIFICAR UN AUTOR</h2>
        <p>Seleccionar el autor:  
            <select name="autor" id="select" onchange="pasarInformacion()">
                <option value="0">--Seleccione un autor--</option>
                <?php
                    $sql = "SELECT * FROM AUTORES";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_AUTOR']?>, <?php echo $mostrar['NOMBRE_AUTOR']?>, <?php echo $mostrar['NACIONALIDAD']?>, <?php echo $mostrar['FECHA_NAC']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="update_autor.php" method="post" id="update">
            <p>Codigo del autor: <input type="text" name="cod_autor" id="cod_autor" readonly></p>
            <p>Nombre autor: <input type="text" name="nombre_autor" id="nombre_autor" required></p>
            <p>Nacionalidad del autor: <input type="text" name="nacionalidad" id="nacionalidad" required></p>
            <p>Fecha de nacimiento: <input type="date" name="fecha_nac" id="fecha_nac" required></p>
            <div id="botones">
                <input type="submit" value="Modificar">
                <input type="reset" value="Borrar" id="borrar">
            </div>
        </form>
    </section>
    <section id="borrar_autor">
        <h2 class="secciones">ELIMINAR UN AUTOR</h2>
        <p>Seleccionar el autor:  
            <select name="autor" id="select_delete">
                <option value="0">--Seleccione un autor--</option>
                <?php
                    $sql = "SELECT * FROM AUTORES";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_AUTOR']?>, <?php echo $mostrar['NOMBRE_AUTOR']?>, <?php echo $mostrar['NACIONALIDAD']?>, <?php echo $mostrar['FECHA_NAC']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="delete_autor.php" method="post" id="delete">
            <p>Codigo del autor: <input type="text" name="cod_autor" id="cod_autor_delete" readonly></p>
            <div id="botones">
                <input type="submit" value="Eliminar" id="boton_eliminar">
                <input type="reset" value="Borrar" id="borrar_delete">
            </div>
        </form>
        <button onclick="eliminar()">Eliminar</button>
    </section>
    <?php
        mysqli_close($conectar);
    ?>
    <script src="utilJS.js"></script>
</body>
</html>