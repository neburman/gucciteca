<?php
    session_start();
    if(!$_SESSION['logueado']) {
        header("location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUCCITECA</title>
    <meta name="author" content="Arkaitz Arias, Ruben Moreno, Imanol Nanclares, Iker Sañudo">
    <link rel="stylesheet" href="menus.css">
    <link rel="icon" href="../imagenes/favicon.png" type="image/png" />
</head>
<body>
    <header>
        <h1>
            <a href="https://gucciteca.000webhostapp.com">MENU-GUCCITECA</a>
            <img src="../imagenes/logotipo.jpg" alt="Logo-empresa">
        </h1>
    </header>
    <section id="menu" class="menus">
        <h2 id="cabecera">MENU-PRINCIPAL</h2>
        <section class="filas">
            <div class="opciones">
                <a href="autores/autores.php" target="_blank" class="boton">
                    <h2>AUTORES</h2>
                    <img src="imagenes/autor.png" alt="AUTOR">
                </a>
            </div>
            <div class="opciones">
                <a href="libros/libros.php" target="_blank" class="boton">
                    <h2>LIBROS</h2>
                    <img src="imagenes/libro.png" alt="LIBRO">
                </a>
            </div>
        </section>
        <section class="filas">
            <div class="opciones">
                <a href="alquileres/alquileres.php" target="_blank" class="boton">
                    <h2>ALQUILER</h2>
                    <img src="imagenes/alquiler.png" alt="ALQUILER">
                </a>
            </div>
            <div class="opciones">
                <a href="clientes/clientes.php" target="_blank" class="boton">
                    <h2>CLIENTES</h2>
                    <img src="imagenes/clientes.png" alt="CLIENTES">
                </a>
            </div>
        </section>
        <section class="filas">
            <div class="opciones">
                <a href="xml/xml.php" target="_blank" class="boton">
                    <h2>XML</h2>
                    <img src="imagenes/xml.png" alt="XML">
                </a>
            </div>
            <div class="opciones">
                <a href="logout.php" class="boton">
                    <h2>SALIR</h2>
                    <img src="imagenes/salida.png" alt="SALIR">
                </a>
            </div>
        </section>
    </section>
</body>
</html>