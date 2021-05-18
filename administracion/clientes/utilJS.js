function pasarInformacion() {
    let datos_option = document.getElementById("select_update").options[document.getElementById("select_update").selectedIndex].text;
    if(document.getElementById("select_update").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("dni_cliente_update").value = adatos_option[0];
        document.getElementById("nombre_cliente").value = adatos_option[1];
        document.getElementById("fecha_nac").value = adatos_option[2];
        document.getElementById("multa").value = adatos_option[3];
        document.getElementById("fin_multa").value = adatos_option[4];
    }
    else{
        document.getElementById("borrar").click();
    }
}
function eliminar(){
    let datos_option = document.getElementById("select_delete").options[document.getElementById("select_delete").selectedIndex].text;
    if(document.getElementById("select_delete").selectedIndex != 0){
        let adatos_option = datos_option.split(", ");
        document.getElementById("dni_cliente_delete").value = adatos_option[0];
        if(confirm("Esta accion eliminara al cliente "+adatos_option[0]+" "+adatos_option[1]+" y todos los datos y alquileres relacionados con el.\nDeseas continuar?")){
            document.getElementById("delete").style.display="block";
            document.getElementById("boton_eliminar").click();
            document.getElementById("delete").style.display="none";
        }
    }
    else{
        document.getElementById("borrar_delete").click();
    }
}

function comprobarDNI(){
    let letras=['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
    let dni = document.getElementById("dni_cliente").value;
    if(dni.length == 9) {
        let numerodni = dni.substring(0,8);
        let letradni = dni.substring(8);
        let posicion = parseInt(numerodni)%23;
        letras[posicion] == letradni? document.getElementById("insertar_cliente").click() : alert("El DNI introducido es incorrecto");
    }
    else{
        alert("El dni introducido es demasiado corto");
    }        
}
function borrar() {
    document.getElementById("borrar_formulario").click();
}