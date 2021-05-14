function pasarInformacion() {
    let datos_option = document.getElementById("select").options[document.getElementById("select").selectedIndex].text;
    if(document.getElementById("select").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("codigo_libro").value = adatos_option[0];
        document.getElementById("nombre_libro").value = adatos_option[1];
        document.getElementById("fecha_publicacion").value = adatos_option[2];
        document.getElementById("tipo_libro").value = adatos_option[3];
        document.getElementById("editorial").value = adatos_option[4];
        document.getElementById("codigo_autor").value = adatos_option[5];
    }
    else{
        document.getElementById("borrar").click();
    }
}
function visualizar() {
    let datos = document.getElementById("cod_autor_delete").value+" "+document.getElementById("nombre_autor_delete").value+" "+document.getElementById("nacionalidad_delete").value+" "+document.getElementById("fecha_nac_delete").value+"";
    alert(datos);
}
function eliminar(){
    let datos_option = document.getElementById("select_delete").options[document.getElementById("select_delete").selectedIndex].text;
    if(document.getElementById("select_delete").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("cod_libro_delete").value = adatos_option[0];
        if(confirm("Esta accion eliminara el libro "+adatos_option[1]+" y todas las copias y alquileres relacionados con las mismas\nDeseas continuar?")){
            document.getElementById("delete").style.display="block";
            document.getElementById("boton_eliminar").click();
            document.getElementById("delete").style.display="none";
        }
    }
    else{
        document.getElementById("borrar_delete").click();
    }
}