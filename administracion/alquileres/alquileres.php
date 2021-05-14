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
    <link rel="stylesheet" href="alquileres.css">
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
        <h2 class="secciones">ALQUILERES</h2>
        <table>
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>INICIO</th>
                    <th>FIN</th>
                    <th>DEVUELTO</th>
                    <th>ID_COPIA</th>
                    <th>CLIENTE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM ALQUILERES ORDER BY FECHA_DEVOLUCION";
                $consulta = mysqli_query($conectar, $sql);
                while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['COD_ALQUILER']?></td>
                    <td><?php echo $mostrar['FECHA_INICIO']?></td>
                    <td><?php echo $mostrar['FECHA_FIN']?></td>
                    <td><?php echo ($mostrar['FECHA_DEVOLUCION'] == NULL? 'NO DEVUELTO' : $mostrar['FECHA_DEVOLUCION'])?></td>
                    <td><?php echo $mostrar['ID_COPIA']?></td>
                    <td><?php echo $mostrar['DNI_CLIENTE']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section id="consulta">
        <h2 class="secciones">AÑADIR UN NUEVO ALQUILER</h2>
        <form action="insertar_alquiler.php" method="post" id="insert">
            <p>Fecha inicio: <input type="date" name="fecha_inicio" id="fecha_inicio" readonly></p>
            <p>Fecha fin: <input type="date" name="fecha_fin" id="fecha_fin" readonly></p>
            <p>Codigo del libro: 
                <select name="codigo_libro" id="select_codigolibro_insert" required>
                    <option>--Seleccione un libro--</option>
                    <?php
                        $sql = "SELECT * FROM COPIAS WHERE DISPONIBLE = 1";
                        $consulta = mysqli_query($conectar, $sql);
                        while ($mostrar = mysqli_fetch_array($consulta)) {
                    ?>
                    <option><?php echo $mostrar['IDENTIFICADOR']?></option>
                    <?php
                        }
                    ?>
                </select>
            </p>
            <p>Dni del cliente: 
                <select name="dni_cliente" id="select_dnicliente_insert" required>
                    <option>--Seleccione un cliente--</option>
                    <?php
                        $sql = "SELECT * FROM CLIENTES WHERE MULTA = 0";
                        $consulta = mysqli_query($conectar, $sql);
                        $valor = 1;
                        while ($mostrar = mysqli_fetch_array($consulta)) {
                    ?>
                    <option><?php echo $mostrar['DNI']?>, <?php echo $mostrar['NOMBRE']?></option>
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
    <section id="finalizar_alquiler">
        <h2 class="secciones">FINALIZAR UN ALQUILER</h2>
        <p>Seleccionar el alquiler:  
            <select name="alquiler" id="select_update">
                <option value="0">--Seleccione un alquiler--</option>
                <?php
                    $sql = "SELECT * FROM ALQUILERES WHERE FECHA_DEVOLUCION IS NULL";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_ALQUILER']?>, <?php echo $mostrar['FECHA_INICIO']?>, <?php echo $mostrar['FECHA_FIN']?>, <?php echo $mostrar['ID_COPIA']?>, <?php echo $mostrar['DNI_CLIENTE']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="finalizar_alquiler.php" method="post" id="update">
            <p>Codigo de alquiler: <input type="text" name="codigo_alquiler" id="codigo_alquiler_update" required></p>
            <p>Codigo de copia: <input type="text" name="codigo_copia" id="codigo_copia_update" required></p>
            <p>Dni cliente: <input type="text" name="dni_cliente_copia" id="dni_cliente_update" required></p>
            <p>Multado hasta: <input type="date" name="dias_multa_copia" id="dias_multa_update" required></p>
            <div id="botones">
                <input type="submit" value="Modificar" id="boton_update">
                <input type="reset" value="Borrar" id="borrar_update">
            </div>
        </form>
        <button onclick="finalizarAlquiler()">FINALIZAR ALQUILER</button>
    </section>

    <section id="borrar_alquiler">
        <h2 class="secciones">ELIMINAR UN ALQUILER</h2>
        <p>Seleccionar el alquiler:  
            <select name="alquiler" id="select_delete">
                <option value="0">--Seleccione un alquiler--</option>
                <?php
                    $sql = "SELECT * FROM ALQUILERES";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['COD_ALQUILER']?>, <?php echo $mostrar['FECHA_INICIO']?>, <?php echo $mostrar['FECHA_FIN']?>, <?php echo $mostrar['FECHA_DEVOLUCION']?>, <?php echo $mostrar['ID_COPIA']?>, <?php echo $mostrar['DNI_CLIENTE']?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="delete_alquiler.php" method="post" id="delete">
            <p>Codigo del alquiler: <input type="text" name="cod_alquiler" id="cod_alquiler_delete" readonly></p>
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
    <script>alquiler(30)</script>
</body>
</html>