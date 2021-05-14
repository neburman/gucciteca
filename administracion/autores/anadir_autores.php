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
    <form action="insertar_autores.php" method="post">
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