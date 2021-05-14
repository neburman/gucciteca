<?php
    require '../conexion.php';
    $contador = 0;
    $directorio = 'archivos/';
    $archivo = $directorio.basename($_FILES['autores_xml']['name']);//El nombre original del fichero en la máquina del cliente.
    if (move_uploaded_file($_FILES['autores_xml']['tmp_name'], $archivo)) {//El nombre temporal del fichero en el cual se almacena el fichero subido en el servidor.
        $xml = simplexml_load_file("$archivo") or die ("NO SE HA PODIDO CREAR LA VARIABLE");
        foreach ($xml->children() as $fila) {
            $cod_autor = $fila->cod_autor;
            $nombre = $fila->nombre_autor;
            $nacionalidad = $fila->nacionalidad;
            $fecha_nac = $fila->fecha_nac;
            $sql = "INSERT INTO AUTORES(COD_AUTOR, NOMBRE_AUTOR, NACIONALIDAD, FECHA_NAC) VALUES ('" . $cod_autor . "','" . $nombre . "','" . $nacionalidad . "','" . $fecha_nac. "')";
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