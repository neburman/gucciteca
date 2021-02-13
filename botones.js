var cont=0;
var imgs = document.getElementById("img");
var body = document.getElementById("body");
function imagenes(){//Funcion para cambiar de imagen
    if(cont==0){
        document.getElementById("img").src="imagenes/imagen1.jpg";//Cambiamos de imagen a la imagen1
        cont++;
    }
    else if(cont==1){
            document.getElementById("img").src="imagenes/imagen2.jpg";//Cambiamos de imagen a la imagen2
            cont++;
        }
        else if(cont==2){
                document.getElementById("img").src="imagenes/imagen3.jpg";//Cambiamos de imagen a la imagen3
                cont=0;
            }
    imgs.style.animationName = "none";//Quitamos la animacion
    imgs.style.animationName = "carrusel";//La volvemos a poner para que vaya en conjunto junto con el cambio de imagenes
    setTimeout(imagenes, 5000);//Seteamos la repeticion de la funcion cada 5000ms = 5segundos
}

var emergente = document.getElementById("miemergente");//Cogemos la id de mi emergente que es la encargada de mostrar el formulario
var boton = document.getElementById("login_registro");//Cogemos la id del boton que vamos usar para hacer que la emergente aparezca
var cerrar = document.getElementsByClassName("cerrar")[0];//Si pulsamos la X que aparece en la esquina superior izquierda del emergente entonces se cerrara

boton.onclick = function() {
  emergente.style.display = "block";//Displayeamos la ventana emergente
  body.style.overflow = "hidden";//Quitamos el scroll de la pagina principal para que no haya interferencias

}

cerrar.onclick = function() {
  emergente.style.display = "none";//Hacemos que desaparezca la ventana emergente
  body.style.overflow = "auto";//Volvemos a hacer que aparezca el scroll de la pagina principal
}

window.onclick = function(event) {//Esto sirve para cuando clicamos fuera de la ventana emergente para asi hacer que se cierre
  if (event.target == emergente) {
    emergente.style.display = "none";//Hacemos que desaparezca la ventana emergente
    body.style.overflow = "auto";//Volvemos a hacer que aparezca el scroll de la pagina principal
  }
}

function hacer_cambios(ocultar_inicio){//Creamos una funcion que funciona a partir de un valor introducido 
  // La ? ejecuta lo siguiente true ? 1 : 2; sale 1 y si fuera false saldria el 2
  var intro=document.getElementById("inicio_sesion");
  intro.style.display=ocultar_inicio ? "none" : "block";//Si es true sale none y si es false block
  var intro=document.getElementById("registro");
  intro.style.display=ocultar_inicio ? "block" : "none";//Si es true sale block y si es false none

}
function registro(){
  hacer_cambios(true);
}

function iniciar_sesion(){
  hacer_cambios(false);
}
