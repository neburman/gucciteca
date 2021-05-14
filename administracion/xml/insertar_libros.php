<?php
    require '../conexion.php';
    $contador = 0;
    $directorio = 'archivos/';
    $archivo = $directorio.basename($_FILES['libros_xml']['name']);//El nombre original del fichero en la máquina del cliente.
    if (move_uploaded_file($_FILES['libros_xml']['tmp_name'], $archivo)) {//El nombre temporal del fichero en el cual se almacena el fichero subido en el servidor.
        $xml = simplexml_load_file("$archivo") or die ("NO SE HA PODIDO CREAR LA VARIABLE");
        foreach ($xml->children() as $fila) {
            $nombre = $fila->nombre;
            $fecha_publi = $fila->fecha_publicacion;
            $tipo = $fila->tipo;
            $editorial = $fila->editorial;
            $cod_autor = $fila->cod_autor;
            $sql = "INSERT INTO LIBROS(NOMBRE, FECHA_PUBLICACION, TIPO, EDITORIAL, COD_AUTOR) VALUES ('" . $nombre . "','" . $fecha_publi . "','" . $tipo. "','" . $editorial. "','" . $cod_autor. "')";
            $result = mysqli_query($conectar, $sql);
            if(!empty($result)) $contador++;
        }
        if ($contador != 0) {
            if(unlink("$archivo")){
                echo'<script type="text/javascript">alert("El archivo xml se ha subido correctamente");</script>';
            }
        }
    }   
    else {
        echo "La subida del archivo a fallado";
    }
    mysqli_close($conectar);
?>