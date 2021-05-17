function finalizarAlquiler() {
    let datos_option = document.getElementById("select_update").options[document.getElementById("select_update").selectedIndex].text;
    if(document.getElementById("select_update").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("codigo_alquiler_update").value = adatos_option[0];
        let fecha_fin = new Date(adatos_option[2]);
        let fecha_actual = new Date();
        if(fecha_actual.getTime() > fecha_fin.getTime()) {
            let milisegundos_retraso = fecha_actual - fecha_fin;
            let dias_multa = Math.floor(milisegundos_retraso / (1000 * 60 * 60 * 24))*2;
            document.getElementById("dias_multa_update").value = sumarDias(dias_multa);
        }
        else {
            document.getElementById("dias_multa_update").value = null;
        }
        document.getElementById("codigo_copia_update").value = adatos_option[3];
        document.getElementById("dni_cliente_update").value = adatos_option[4];
        if(confirm("Esta accion finalizara al alquiler"+adatos_option[0]+"\nDeseas continuar?")){
            document.getElementById("update").style.display="block";
            document.getElementById("boton_update").click();
            document.getElementById("update").style.display="none";
        }
    }
    else{
        document.getElementById("borrar_update").click();
    }
}
function eliminar(){
    let datos_option = document.getElementById("select_delete").options[document.getElementById("select_delete").selectedIndex].text;
    if(document.getElementById("select_delete").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("cod_alquiler_delete").value = adatos_option[0];
        document.getElementById("cod_copia_delete").value = adatos_option[4];
        if(confirm("Esta accion eliminara el alquiler "+adatos_option[0]+"\nDeseas continuar?")){
            document.getElementById("delete").style.display="block";
            document.getElementById("boton_eliminar").click();
            document.getElementById("delete").style.display="none";
        }
    }
    else{
        document.getElementById("borrar_delete").click();
    }
}

function sumarDias(dias) {
    let fecha = new Date();
    let año_fin = fecha.getFullYear();
    let mes_fin = fecha.getMonth()+1;
    let dias_fin = fecha.getDate();
    let dMax=[31,28,31,30,31,30,31,31,30,31,30,31];
    if((año_fin%4==0) && ((año_fin % 100 != 0) || (año_fin % 400 == 0))){
        dMax[1] = 29;
    }
    for(let i = 0; i < dias; i++) {
        dias_fin++;
        if(dias_fin > dMax[mes_fin-1]) {
            dias_fin = 1;
            mes_fin ++;
            if(mes_fin > 12) {
                mes_fin = 1;
                año_fin++;
                if((año_fin%4==0) && ((año_fin % 100 != 0) || (año_fin % 400 == 0))){
                    dMax[1] = 29;
                }
                else {
                    dMax[1] = 29;
                }
            }
        }
    }
    let fecha_fin = año_fin+"-"+dosCifras(mes_fin)+"-"+dosCifras(dias_fin);
    return fecha_fin;
}

function alquiler(dias) {
    let fecha = new Date();
    let fecha_inicio = fecha.getFullYear()+"-"+dosCifras(fecha.getMonth()+1)+"-"+dosCifras(fecha.getDate());
    let fecha_fin = sumarDias(dias);
    document.getElementById("fecha_inicio").value = fecha_inicio;
    document.getElementById("fecha_fin").value = fecha_fin;
}

function dosCifras(fecha) {
    let fechaDosCifras = "";
    if (fecha<10) {
        fechaDosCifras += "0"+fecha;
    }
    else{
        fechaDosCifras += fecha;
    }
    return fechaDosCifras;
}