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
    <link rel="stylesheet" href="libros.css">
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
        <h2 class="secciones">LIBROS DISPONIBLES</h2>
        <table>
            <thead>
                <tr>
                    <th>LIBRO</th>
                    <th>TITULO</th>
                    <th>PUBLICADO</th>
                    <th>TIPO</th>
                    <th>EDITORIAL</th>
                    <th>AUTOR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM LIBROS";
                $consulta = mysqli_query($conectar, $sql);
                while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['COD_LIBRO']?></td>
                    <td><?php echo $mostrar['NOMBRE']?></td>
                    <td><?php echo $mostrar['FECHA_PUBLICACION']?></td>
                    <td><?php echo $mostrar['TIPO']?></td>
                    <td><?php echo $mostrar['EDITORIAL']?></td>
                    <td><?php echo $mostrar['COD_AUTOR']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section id="consulta">
        <h2 class="secciones">AÑADIR UN NUEVO LIBRO</h2>
        <form action="insertar_libros.php" method="post" id="insert">
            <p>Titulo: <input type="text" name="titulo_libro" required></p>
            <p>Fecha de publicacion: <input type="date" name="fecha_publicacion" required></p>
            <p>Tipo: <input type="text" name="tipo_libro" required></p>
            <p>Editorial: <input type="text" name="editorial_libro" required></p>
            <p>Codigo del autor: 
                <select name="codigo_autor" id="select_codigoautor_insert" required>
                    <option>--Seleccione un autor--</option>
                    <?php
                        $sql = "SELECT * FROM AUTORES";
                        $consulta = mysqli_query($conectar, $sql);
                        while ($mostrar = mysqli_fetch_array($consulta)) {
                    ?>
                    <option><?php echo $mostrar['COD_AUTOR']?>, <?php echo $mostrar['NOMBRE_AUTOR']?></option>
                    <?php
                        }
                    ?>
                </select>
            </p>
            <div id="botones">
                <input type="submit" value="Insertar">
                <input type="reset" value="Borrar">
            </div>
        </form>
    </section>
    <section id="modificar_libro">
        <h2 class="secciones">MODIFICAR UN LIBRO</h2>
        <p>Seleccionar el libro:  
            <select name="libro" id="select" onchange="pasarInformacion()">
                <option value="0">--Seleccione un libro--</option>
                <?php
                    $sql = "SELECT * FROM LIBROS";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_LIBRO']?>, <?php echo $mostrar['NOMBRE']?>, <?php echo $mostrar['FECHA_PUBLICACION']?>, <?php echo $mostrar['TIPO']?>, <?php echo $mostrar['EDITORIAL']?>, <?php echo $mostrar['COD_AUTOR']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="update_libro.php" method="post" id="update">
            <p>Codigo del libro: <input type="text" name="codigo_libro" id="codigo_libro" readonly></p>
            <p>Titulo del libro: <input type="text" name="nombre_libro" id="nombre_libro" required></p>
            <p>Fecha de publicacion: <input type="date" name="fecha_publicacion" id="fecha_publicacion" required></p>
            <p>Tipo de libro: <input type="text" name="tipo_libro" id="tipo_libro" required></p>
            <p>Editorial: <input type="text" name="editorial" id="editorial" required></p>
            <p>Codigo del autor: <input type="text" name="codigo_autor" id="codigo_autor" readonly></p>
            <div id="botones">
                <input type="submit" value="Modificar">
                <input type="reset" value="Borrar" id="borrar">
            </div>
        </form>
    </section>
    <section id="borrar_libro">
        <h2 class="secciones">ELIMINAR UN LIBRO</h2>
        <p>Seleccionar el libro:  
            <select name="libro" id="select_delete">
                <option value="0">--Seleccione un libro--</option>
                <?php
                    $sql = "SELECT * FROM LIBROS";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_LIBRO']?>, <?php echo $mostrar['NOMBRE']?>, <?php echo $mostrar['FECHA_PUBLICACION']?>, <?php echo $mostrar['TIPO']?>, <?php echo $mostrar['EDITORIAL']?>, <?php echo $mostrar['COD_AUTOR']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="delete_libro.php" method="post" id="delete">
            <p>Codigo del libro: <input type="text" name="cod_libro_delete" id="cod_libro_delete" readonly></p>
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