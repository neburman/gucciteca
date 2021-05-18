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
    <link rel="stylesheet" href="clientes.css">
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
        <h2 class="secciones">CLIENTES DISPONIBLES</h2>
        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>FECHA_NAC</th>
                    <th>MULTA</th>
                    <th>FIN MULTA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM CLIENTES WHERE FIN_MULTA IS NOT NULL";
                $consulta = mysqli_query($conectar, $sql);
                while ($mostrar = mysqli_fetch_array($consulta)) {
                    if(strtotime($mostrar['FIN_MULTA']) < strtotime(date("Y-m-d",time()))){
                        $cliente = $mostrar['DNI'];
                        $sql = "UPDATE CLIENTES SET MULTA = 0, FIN_MULTA = NULL WHERE DNI = '$cliente'";
                        mysqli_query($conectar, $sql);
                    }
                }
                $sql = "SELECT * FROM CLIENTES";
                $consulta = mysqli_query($conectar, $sql);
                while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['DNI']?></td>
                    <td><?php echo $mostrar['NOMBRE']?></td>
                    <td><?php echo $mostrar['FECHA_NAC']?></td>
                    <td><?php echo ($mostrar['MULTA']!=0? 'SI' : 'NO')?></td>
                    <td><?php echo ($mostrar['FIN_MULTA'] == NULL? '--' : $mostrar['FIN_MULTA'])?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="anadir_cliente">
        <h2 class="secciones">AÑADIR UN NUEVO CLIENTE</h2>
        <div id="formulario">
            <form action="insertar_clientes.php" method="post" id="insert">
                <p>DNI Cliente: <input type="text" name="dni_cliente" id="dni_cliente" maxlength="9" placeholder="22222222A" required></p>
                <p>Nombre y primer apellido: <input type="text" name="nombre_cliente" required></p>
                <p>Fecha de nacimiento: <input type="date" name="fecha_nac" required></p>
                <div id="botones">
                    <input type="submit" value="Insertar" id="insertar_cliente">
                    <input type="reset" value="Borrar" id="borrar_formulario">
                </div>
            </form>
            <div id="cliente_boton">
                <button onclick="comprobarDNI()">Insertar</button>
                <button onclick="borrar()">Borrar</button>
            </div>
        </div>
    </section>

    <section id="modificar_cliente">
        <h2 class="secciones">MODIFICAR UN CLIENTE</h2>
        <p>Seleccionar el CLIENTE:  
            <select name="cliente" id="select_update" onchange="pasarInformacion()">
                <option value="0">--Seleccione un cliente--</option>
                <?php
                    $sql = "SELECT * FROM CLIENTES";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['DNI']?>, <?php echo $mostrar['NOMBRE']?>, <?php echo $mostrar['FECHA_NAC']?>, <?php echo ($mostrar['MULTA'] == 1? 'SI' : 'NO')?>, <?php echo ($mostrar['FIN_MULTA'] == NULL? '--' : $mostrar['FIN_MULTA'])?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="update_cliente.php" method="post" id="update">
            <p>DNI del cliente: <input type="text" name="dni_cliente" id="dni_cliente_update" readonly></p>
            <p>Nombre del cliente: <input type="text" name="nombre_cliente" id="nombre_cliente" required></p>
            <p>Fecha de nacimiento:  <input type="date" name="fecha_nac" id="fecha_nac" required></p>
            <p>Multa: <input type="text" name="multa" placeholder="SI/NO" id="multa" required></p>
            <p>Fecha fin multa: <input type="date" name="fin_multa" id="fin_multa"></p>
            <div id="botones">
                <input type="submit" value="Modificar">
                <input type="reset" value="Borrar" id="borrar">
            </div>
        </form>
    </section>

    <section id="borrar_cliente">
        <h2 class="secciones">ELIMINAR UN CLIENTE</h2>
        <p>Seleccionar el CLIENTE:  
            <select name="cliente" id="select_delete">
                <option value="0">--Seleccione un cliente--</option>
                <?php
                    $sql = "SELECT * FROM CLIENTES";
                    $consulta = mysqli_query($conectar, $sql);
                    $valor = 1;
                    while ($mostrar = mysqli_fetch_array($consulta)) {
                ?>
                <option value="<?php echo $valor?>"><?php echo $mostrar['DNI']?>, <?php echo $mostrar['NOMBRE']?>, <?php echo $mostrar['FECHA_NAC']?>, <?php echo ($mostrar['MULTA'] == 1? 'SI' : 'NO')?>, <?php echo ($mostrar['FIN_MULTA'] == NULL? '--' : $mostrar['FIN_MULTA'])?></option>
                <?php
                    $valor = $valor + 1;
                    }
                ?>
            </select>
        </p>
        <form action="delete_cliente.php" method="post" id="delete">
            <p>Dni del cliente: <input type="text" name="dni_cliente" id="dni_cliente_delete" readonly></p>
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