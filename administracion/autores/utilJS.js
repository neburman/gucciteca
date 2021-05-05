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
    let datos = document.getElementById("cod_autor").value+" "+document.getElementById("nombre_autor").value+" "+document.getElementById("nacionalidad").value+" "+document.getElementById("fecha_nac").value+"";
    alert(datos);
}