<?php
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
    <link rel="stylesheet" href="xml.css">
    <link rel="icon" href="../../imagenes/favicon.png" type="image/png" />
</head>
<body>
    <header>
        <h1>
            <a href="https://gucciteca.000webhostapp.com">MENU-GUCCITECA</a>
            <img src="../../imagenes/logotipo.jpg" alt="Logo-empresa">
        </h1>
    </header>
    <section class="insertar_xml">
        <h2 class="secciones">INSERTAR XML AUTORES</h2>
        <form enctype="multipart/form-data" action="insertar_autores.php" method="POST">
            <input type="file" name="autores_xml" accept=".xml"> <br>
            <div id="botones">
                <input type="submit" value="Insertar">
                <input type="reset" value="Borrar">
            </div>
        </form>
    </section>
    <section class="insertar_xml">
        <h2 class="secciones">INSERTAR XML LIBROS</h2>
        <form enctype="multipart/form-data" action="insertar_libros.php" method="POST">
            <input type="file" name="libros_xml" accept=".xml"> <br>
            <div id="botones">
                <input type="submit" value="Insertar">
                <input type="reset" value="Borrar">
            </div>
        </form>
    </section>
</body>
</html>