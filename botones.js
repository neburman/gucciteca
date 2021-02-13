var cont=0;
var imgs = document.getElementById("img");
var body = document.getElementById("body");
function imagenes(){
    if(cont==0){
        document.getElementById("img").src="imagenes/imagen1.jpg";
        cont++;
    }
    else if(cont==1){
            document.getElementById("img").src="imagenes/imagen2.jpg";
            cont++;
        }
        else if(cont==2){
                document.getElementById("img").src="imagenes/imagen3.jpg";
                cont=0;
            }
    imgs.style.animationName = "none";
    imgs.style.animationName = "carrusel";
    setTimeout(imagenes, 5000);
}

var emergente = document.getElementById("miemergente");
var boton = document.getElementById("login_registro");
var cerrar = document.getElementsByClassName("cerrar")[0];

boton.onclick = function() {
  emergente.style.display = "block";
  body.style.overflow = "hidden";

}

cerrar.onclick = function() {
  emergente.style.display = "none";
  body.style.overflow = "auto";
}

window.onclick = function(event) {
  if (event.target == emergente) {
    emergente.style.display = "none";
  }
}

function hacer_cambios(ocultar_inicio){
  var intro=document.getElementById("inicio_sesion");
  intro.style.display=ocultar_inicio ? "none" : "block";
  var intro=document.getElementById("registro");
  intro.style.display=ocultar_inicio ? "block" : "none";

}
function registro(){
  hacer_cambios(true);
}

function iniciar_sesion(){
  hacer_cambios(false);
}
