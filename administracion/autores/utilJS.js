function pasarInformacion() {
    let datos_option = document.getElementById("select").options[document.getElementById("select").selectedIndex].text;
    if(document.getElementById("select").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("cod_autor").value = adatos_option[0];
        document.getElementById("nombre_autor").value = adatos_option[1];
        document.getElementById("nacionalidad").value = adatos_option[2];
        document.getElementById("fecha_nac").value = adatos_option[3];
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
        document.getElementById("cod_autor_delete").value = adatos_option[0];
        if(confirm("Esta accion eliminara al autor"+adatos_option[1]+" y todos los libros relacionados con el\nDeseas continuar?")){
            document.getElementById("delete").style.display="block";
            document.getElementById("boton_eliminar").click();
            document.getElementById("delete").style.display="none";
        }
    }
    else{
        document.getElementById("borrar_delete").click();
    }
    window.location.href="";
}